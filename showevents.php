<?php
session_start();
include("php/config.php");

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
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://bbpintadosqueen.files.wordpress.com/2020/02/59975612_2342040909221413_8974904794346946560_o.jpg?w=768');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 20px 100px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .logo img {
            width: 200px;
            height: auto;
        }

        .right-links {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .right-links a {
            margin-right: 15px;
            margin-bottom: 10px;
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
                margin-bottom: 10px;
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

        .container {
            width: 90%; /* Adjust width as needed */
            max-width: 1200px; /* Maximum width for the container */
            margin: 20px auto; /* Adjusted margin for spacing */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .event-photo img {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px; /* Adjusted margin for better spacing */
        }

        .events-header {
            text-align: center;
            margin-top: 50px; /* Adjusted margin for spacing */
            margin-bottom: 20px; /* Adjusted margin for spacing */
        }
    </style>
    <title>Events</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <img src="assets/Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>

        <!-- Additional navbar links -->
        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="showannouncement.php">Announcements</a>
            <a href="showevents.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
            <a href="eventmanage.php">Manage Event</a>
            <a href="Gallery.php">Gallery</a>
        </div>
    </div>

    <div class="events-header">
        <h1>Upcoming Events in Passi City</h1>
    </div>
    <div class="container">
    <h1>Upcoming Events in Passi City</h1>
    <table>
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($event['event_name']); ?></td>
                    <td><?php echo htmlspecialchars($event['event_date']); ?></td>
                    <td><?php echo htmlspecialchars($event['event_description']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>
