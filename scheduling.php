<?php
// Function to retrieve events for a specific date
function getEvents($date, $conn) {
    $sql = "SELECT * FROM schedule WHERE event_date = '$date'";
    $result = $conn->query($sql);

    $events = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $events[] = $row['event_name'];
        }
    }
    return $events;
}

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userbase"; // Changed to userbase

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS userbase";
$conn->query($sql_create_db);

// Switch to the userbase database
$conn->select_db($dbname);

// Rename table from events to schedule if it exists
$sql_rename_table = "RENAME TABLE IF EXISTS events TO schedule";
$conn->query($sql_rename_table);

// Create table for schedule if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL
)";
$conn->query($sql_create_table);

// Handling form submission for adding events
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_name']) && isset($_POST['event_date'])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];

    // Insert into database
    $sql = "INSERT INTO schedule (event_name, event_date) VALUES ('$event_name', '$event_date')";

    if ($conn->query($sql) === TRUE) {
        // echo "Event added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Scheduler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://bbpintadosqueen.files.wordpress.com/2020/02/59975612_2342040909221413_8974904794346946560_o.jpg?w=768');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(35px);
            /* Adjust the blur intensity as needed */
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            /* Background color for the navbar */
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
        }

        .right-links a {
            margin-right: 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .right-links a.button-logout {
            background-color: green;
            color: #fff;
            padding: 8px 12px;
            /* Adjusted padding for the logout button */
            border-radius: 5px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            position: relative; /* Added for positioning popup */
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .popup {
            position: absolute;
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1;
        }

        td:hover .popup {
            display: block;
        }
    </style>

    <!-- Navigation bar -->
</head>
<body>
    <div class="nav">
        <div class="logo">
            <img src="assets\Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>

        <!-- Links on the right side of the navbar -->
        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="showannouncement.php">Announcements</a>
            <a href="events.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
            <a href="tourism.php">Payments</a>
            <a href="eventmanage.php">Manage event</a>
            <a href="Gallery.php">Gallery</a>
            <a href="#" class="button-logout">Log Out</a>
        </div>
    </div>
    <h2>Event Scheduler</h2>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="event_name">Event Name:</label><br>
            <input type="text" id="event_name" name="event_name" required><br>
            <label for="event_date">Event Date:</label><br>
            <input type="date" id="event_date" name="event_date" required><br>
            <input type="submit" value="Add Event">
        </form>
        
        <table>
            <caption>Calendar for <?php echo date("F Y"); ?></caption>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            <?php
            // Display calendar
            $today = date("Y-m-d");
            $month = date("m");
            $year = date("Y");
            
            $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            
            $current_date = 1;
            $start_day = date("w", mktime(0, 0, 0, $month, 1, $year));
            
            echo "<tr>";
            for ($i = 0; $i < $start_day; $i++) {
                echo "<td></td>";
            }
            
            while ($current_date <= $days_in_month) {
                for ($i = $start_day; $i < 7 && $current_date <= $days_in_month; $i++) {
                    $date = "$year-$month-" . str_pad($current_date, 2, '0', STR_PAD_LEFT);
                    $events = getEvents($date, $conn);
                    
                    echo "<td>$current_date<br>";
                    foreach ($events as $event) {
                        echo "- <span class='popup'>$event</span><br>";
                    }
                    echo "</td>";
                    
                    $current_date++;
                }
                echo "</tr>";
                $start_day = 0;
            }
            ?>
        </table>
    </div>

    <?php
    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
