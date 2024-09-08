<?php
include("php/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and save proposal details
    $eventName = mysqli_real_escape_string($con, $_POST['event_name']);
    $eventDescription = mysqli_real_escape_string($con, $_POST['event_description']);

    // Save the proposal details to the database
    $sql = "INSERT INTO proposals (event_name, event_description, status) VALUES ('$eventName', '$eventDescription', 'pending')";
    mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Proposal</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff; /* Updated to white background */
            color: #333; /* Updated to dark text color */
            padding: 10px 20px;
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

        h1 {
            color: #333;
            text-align: center;
            margin-top: 50px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        a:hover {
            color: #4caf50;
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <img src="assets\Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>

        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="announcements.php">Announcements</a>
            <a href="events.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
            <a href="submit_proposal.php">Event Management</a>
        </div>
    </div>

    <h1>Submit Proposal</h1>

    <form method="POST" action="">
        <label for="event_name">Event Name:</label>
        <input type="text" name="event_name" required><br>

        <label for="event_description">Event Description:</label>
        <textarea name="event_description" required></textarea><br>

        <input type="submit" value="Submit Proposal">
    </form>

    <a href="view_proposals.php">See Current Proposals</a>
</body>

</html>
