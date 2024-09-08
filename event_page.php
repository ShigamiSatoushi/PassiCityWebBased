<?php
session_start();
include("php/config.php");

// Check if the user is not logged in
if (!isset($_SESSION['valid'])) {
    header("Location: index.php"); // Redirect to the login page
    exit();
}

// Check if the form for adding a post is submitted and the user is an admin
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_post']) && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    // Handle adding post logic here
}

// Define initial variables
$title = $date = $description = "";
$title_err = $date_err = $description_err = "";

// Check if the form for adding an event is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title.";
    } else {
        $title = trim($_POST["title"]);
    }

    // Validate date
    if (empty(trim($_POST["date"]))) {
        $date_err = "Please enter a date.";
    } else {
        $date = trim($_POST["date"]);
    }

    // Validate description
    if (empty(trim($_POST["description"]))) {
        $description_err = "Please enter a description.";
    } else {
        $description = trim($_POST["description"]);
    }

    // Check input errors before inserting in database
    if (empty($title_err) && empty($date_err) && empty($description_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO events (event_title, event_date, event_description, event_image) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_title, $param_date, $param_description, $param_image);

            // Set parameters
            $param_title = $title;
            $param_date = $date;
            $param_description = $description;
            $param_image = basename($_FILES["image"]["name"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to the event page after adding event
                header("location: event_page.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Page</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        /* Additional CSS styles for the integrated navigation bar */
        /* Common styles */
        .btn {
            height: 35px;
            background: rgba(54, 224, 48, 0.808);
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
        }

        body {
            background-image: url('https://bbpintadosqueen.files.wordpress.com/2020/02/59975612_2342040909221413_8974904794346946560_o.jpg?w=768');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(35px);
            /* Adjust the blur intensity as needed */
        }

        /* Navigation bar styles */
        .nav {
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap to the next line */
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Add any additional styles as needed */
        }

        .logo img {
            width: 200px;
            height: auto;
        }

        .right-links {
            display: flex;
            align-items: center;
            flex-wrap: wrap; /* Allow items to wrap to the next line */
        }

        .right-links a {
            margin-right: 15px;
            margin-bottom: 10px; /* Add margin bottom to create space between items */
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .right-links a.button-logout {
            background-color: green;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
        }

        /* Dropdown menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Media query for responsive navigation */
        @media screen and (max-width: 600px) {
            .nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .right-links {
                margin-top: 10px;
                margin-bottom: 10px; /* Add margin bottom to create space between items */
            }

            .dropdown {
                display: block;
                text-align: center;
            }

            .dropdown-content {
                position: static;
                display: none;
                text-align: left;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <img src="assets\Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>

        <div class="right-links">
            <?php
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
                $res_Role = isset($result['isAdmin']) ? $result['isAdmin'] : 0;
            }

            $res_Role = isset($res_Role) ? $res_Role : 0;

            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            echo "<p>Role: " . ($res_Role == 1 ? 'Admin' : 'Member') . "</p>";
            ?>

            <a href="php/logout.php" class="button-logout">Log Out</a>
        </div>

        <!-- Additional navbar links -->
        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="showannouncement.php">Announcements</a>
            <a href="events.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
            <a href="payments.php">Payments</a>
            <a href="eventmanage.php">Manage event</a>
            <a href="gallery.php">Gallery</a>
            <?php if ($res_Role == 1) : ?>
                <a href="announcements.php">Add Announcements</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Form for adding events -->
    <div class="container">
        <h1>Add Event</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                <span class="help-block"><?php echo $title_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                <span class="help-block"><?php echo $date_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                <label>Description</label>
                <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                <span class="help-block"><?php echo $description_err; ?></span>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Event">
            </div>
        </form>
    </div>
    <!-- End of form -->

    <!-- Rest of the HTML content -->
</body>

</html>
