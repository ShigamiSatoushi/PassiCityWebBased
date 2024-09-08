<?php
session_start();
include("php/config.php");

// Check if $_SESSION is set
if (!isset($_SESSION)) {
    $_SESSION = array(); // Initialize $_SESSION as an empty array
}

// Check if $_SESSION['valid'] is not set or null
if (!isset($_SESSION['valid']) || $_SESSION['valid'] === null) {
    header("Location: index.php");
    exit();
}

// Check if $con is set and not null
if(isset($con) && $con !== null) {
    // Retrieve announcements from the "announcements" table
    $announcements_query = mysqli_query($con, "SELECT * FROM announcements");
    $announcements = mysqli_fetch_all($announcements_query, MYSQLI_ASSOC);
} else {
    // Handle the case where $con is not properly initialized
    $announcements = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <style>
        /* Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f5f5f5;
            padding: 10px 20px;
            border-bottom: 2px solid #ddd;
        }

        .navbar-logo img {
            width: 150px;
            height: auto;
        }

        .navbar-links {
            display: flex;
            align-items: center;
        }

        .navbar-links a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            margin-right: 20px;
        }

        .navbar-links a:last-child {
            margin-right: 0;
        }

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

        /* Announcement styles */
        .main-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .announcement-container {
            width: calc(33.33% - 20px); /* Adjust width for equal columns */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 20px;
            transition: transform 0.3s ease; /* Add transition for hover effect */
        }

        .announcement-container:hover {
            transform: translateY(-5px); /* Add a subtle hover effect */
        }

        .announcement-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .announcement-content {
            color: #666;
            line-height: 1.6;
        }

        /* Added margin to the body */
        body {
            margin: 20px;
        }
    </style>
    <title>Announcements</title>
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="assets\Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>

        <div class="navbar-links">
            <a href="home.php">Home</a>
            <a href="showannouncement.php">Announcements</a>
            <a href="showevents.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
        </div>

        <div class="navbar-links">
            <?php
            // Check if $con is set and not null before querying the database
            if (isset($con) && $con !== null) {
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
            }
            ?>

            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <main class="main-container">
        <?php foreach ($announcements as $announcement) : ?>
            <div class="announcement-container">
                <div class="announcement-title">
                    <?php echo isset($announcement['title']) ? $announcement['title'] : ''; ?>
                </div>
                <div class="announcement-content">
                    <?php echo isset($announcement['content']) ? nl2br($announcement['content']) : ''; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>
