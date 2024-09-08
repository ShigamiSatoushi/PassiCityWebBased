<?php
session_start();
include("php/config.php");

// Redirect to the login page if the user is not authenticated
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
}

// Process any form submissions or other actions as needed
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    
    <style>
   .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        

        .posting-section {
            margin-top: 20px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            /* Add any additional styles as needed */
        }
        .right-links a.button-logout {
        background-color: green;
        color: #fff;}

        /* Add any additional global styles as needed */
    </style>
    <title>Home</title>
</head>

<body>

    <div class="nav">
        <div class="logo">
            <img src="assets\Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>

        <div class="right-links">
            <?php
            // Fetch user details from the database
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_id = $result['Id'];
                $res_Role = isset($result['isAdmin']) ? $result['isAdmin'] : 0;
            }

            $res_Role = isset($res_Role) ? $res_Role : 0;

            // Display user-related links
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            echo "<p>Role: " . ($res_Role == 1 ? 'Admin' : 'Member') . "</p>";
            ?>

            <!-- Logout button -->
            <a href="php/logout.php" class="button-logout">Log Out</a>
        </div>

        <!-- Additional navbar links -->
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
        <div class="main-box top">
            <?php
            // Display user information based on your existing logic
            ?>

            <!-- Replace the content inside this div with the iframe for the hotel booking site -->
            <div id="hotelBookingIframeContainer">
                <iframe src="https://www.tripadvisor.com.ph/Hotels-g3418756-c2-Passi_City_Iloilo_Province_Panay_Island_Visayas-Hotels.html" width="100%" height="1000px" frameborder="0" scrolling="auto"></iframe>
            </div>

            <!-- Display time and date -->
            <div id="liveTimeAndDate" style="font-size: 18px; margin-top: 10px;"></div>
        </div>
    </main>

    <!-- Script for updating time and date -->
    <script>
        // Function to update time and date
        function updateTimeAndDate() {
            var currentDate = new Date();
            var hours = currentDate.getHours();
            var minutes = currentDate.getMinutes();
            var seconds = currentDate.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';

            // Convert to 12-hour format
            hours = hours % 12;
            hours = hours ? hours : 12; // The hour '0' should be '12'

            // Add leading zero if needed
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var formattedTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            var formattedDate = currentDate.toDateString();

            // Display time and date in the element with id "liveTimeAndDate"
            document.getElementById('liveTimeAndDate').innerHTML = formattedTime + ' | ' + formattedDate;

            // Update every second
            setTimeout(updateTimeAndDate, 1000);
        }

        // Call the function to start updating time and date
        updateTimeAndDate();
    </script>

</body>

</html>
