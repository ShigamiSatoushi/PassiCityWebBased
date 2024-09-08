<?php
session_start();
include("php/config.php");

// Check if the user is logged in
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
}

// Process the form to add a new event
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
    // Extract form data
    $event_name = mysqli_real_escape_string($con, $_POST['event_name']);
    $event_date = mysqli_real_escape_string($con, $_POST['event_date']);
    $event_description = mysqli_real_escape_string($con, $_POST['event_description']);

    // File upload handling
    $uploadDir = "uploads/";
    $event_photo = '';

    if (!empty($_FILES['event_photo']['name'])) {
        $fileName = basename($_FILES['event_photo']['name']);
        $targetPath = $uploadDir . $fileName;
        $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg');

        if (in_array($fileType, $allowTypes)) {
            // Upload file to the server
            if (move_uploaded_file($_FILES['event_photo']['tmp_name'], $targetPath)) {
                $event_photo = $fileName;
            } else {
                echo "Error uploading photo.";
                exit();
            }
        } else {
            echo "Invalid photo format. Allowed formats are jpg, png, and jpeg.";
            exit();
        }
    }

    // SQL query to insert data into the database
    $insert_query = "INSERT INTO userbase.currentevents (event_name, event_date, event_description, event_photo) VALUES ('$event_name', '$event_date', '$event_description', '$event_photo')";

    if (mysqli_query($con, $insert_query)) {
        // Event added successfully
        header("Location: events.php"); // Refresh the page to show the new event
        exit();
    } else {
        echo "Error adding event: " . mysqli_error($con);
    }
}

// Fetch all events from the database
$events_query = mysqli_query($con, "SELECT * FROM userbase.currentevents");
$events = mysqli_fetch_all($events_query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <style>
        /* Add your specific styles for the events page */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            width: 200px;
            height: auto;
        }

        .right-links {
            display: flex;
            align-items: center;
        }

        .right-links a {
            margin-right: 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        /* Style for the event section */
        .event-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
        }

        .add-event-form {
            margin: 20px;
            padding: 20px;
            background-color: #e0e0e0;
            border-radius: 10px;
        }

        .add-event-form h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .add-event-form label {
            display: block;
            margin-bottom: 10px;
        }

        .add-event-form input,
        .add-event-form textarea,
        .add-event-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .add-event-form button {
            background-color: #A020F0;
            color: white;
            border: none;
            cursor: pointer;
        }

        .add-event-form button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Events</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <img src="assets\Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>

        <!-- Links on the right side of the navbar -->
        <div class="right-links">
            <?php
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
                $res_Role = isset($result['isAdmin']) ? $result['isAdmin'] : 0; // Default to 0 if 'isAdmin' key doesn't exist
            }

            // Check if the 'isAdmin' key exists in the result array
            $res_Role = isset($res_Role) ? $res_Role : 0;

            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            echo "<p>Role: " . ($res_Role == 1 ? 'Admin' : 'Member') . "</p>"; // Display 'Admin' for 1 and 'Member' for 0
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>

        <!-- Additional navbar links -->
        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="showannouncement.php">Announcements</a>
            <a href="events.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
        </div>
    </div>
    <main>
        <!-- Add event form accessible to all users -->
        <div class="add-event-form">
            <h2>Add Event</h2>
            <form method="post" action="events.php" enctype="multipart/form-data">
                <label for="event_name">Event Name:</label>
                <input type="text" id="event_name" name="event_name" required>

                <label for="event_date">Event Date:</label>
                <input type="date" id="event_date" name="event_date" required>

                <label for="event_description">Event Description:</label>
                <textarea id="event_description" name="event_description" required></textarea>

                <label for="event_photo">Event Photo:</label>
                <input type="file" id="event_photo" name="event_photo">

                <button type="submit" name="add_event">Add Event</button>
            </form>
        </div>

        <?php foreach ($events as $event) : ?>
            <div class="event-container">
                <div class="event-name">
                    <?php echo $event['event_name']; ?>
                </div>
                <div class="event-date">
                    <?php echo $event['event_date']; ?>
                </div>
                <div class="event-description">
                    <?php echo $event['event_description']; ?>
                </div>
                <?php if (!empty($event['event_photo'])) : ?>
                    <div class="event-photo">
                        <img src="uploads/<?php echo $event['event_photo']; ?>" alt="Event Photo">
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>
