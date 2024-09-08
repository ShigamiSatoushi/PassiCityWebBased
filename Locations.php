<?php
session_start();
include("php/config.php");

// Check if the user is logged in
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
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
        /* Add your specific styles for the announcement page */
        body {
    background-image: url('https://bbpintadosqueen.files.wordpress.com/2020/02/59975612_2342040909221413_8974904794346946560_o.jpg?w=768');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    backdrop-filter: blur(35px); /* Adjust the blur intensity as needed */
}
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

        .map-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            text-align: center; /* Center text within the map container */
        }

        .locations-list {
            list-style-type: none;
            padding: 0;
        }

        .locations-list li {
            margin-bottom: 10px;
        }
    </style>
    <title>Locations</title>
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
                $res_Role = isset($result['isAdmin']) ? $result['isAdmin'] : 0; // Default to 0 if 'isAdmin' key doesn't exist
            }

            // Check if the 'isAdmin' key exists in the result array
            $res_Role = isset($res_Role) ? $res_Role : 0;

            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            echo "<p>Role: " . ($res_Role == 1 ? 'Admin' : 'Member') . "</p>"; // Display 'Admin' for 1 and 'Member' for 0
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>

        <div class="right-links">
        <a href="home.php">Home</a>
            <a href="announcements.php">Announcements</a>
            <a href="events.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
        </div>
    </div>
    <main>
        <!-- Map container -->
        <div class="map-container">
            <h1>LOCATIONS IN PASSI</h1>
            <!-- Google Maps iframe (replace with your actual Google Maps link) -->
            <iframe src="https://www.google.com/maps/d/embed?mid=1IAquCMqaejrqKemwBf5266ajrHhAAAE&ehbc=2E312F&noprof=1"
                width="1500" height="800" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>
</body>

</html>
