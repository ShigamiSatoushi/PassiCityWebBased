<?php
session_start();
include("php/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // ... (unchanged)
}

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_post']) && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    // ... (unchanged)
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
            color: #fff;
        }

        /* Add any additional global styles as needed */
    </style>
    <title>Event Management</title>
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

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>

        <!-- Additional navbar links -->
        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="announcements.php">Announcements</a>
            <a href="events.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
            <a href="submit_proposal.php">Event Management</a> <!-- Add this line with a link to propose_event.php -->
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_Email ?></b>.</p>
                </div>
            </div>

            <div>
                <br>
            </div>

            <?php
            if ($res_Role == 1) {
                // Display admin-specific content
                echo "<div class='box posting-section'>";
                echo "<h2><a href='submit_proposal.php'>Event Management</a></h2>";

                // Add your event management code here
                echo "<p>Admin can manage events here.</p>";

                echo "</div>";
            }

            if ($res_Role == 0) {
                // Display member-specific content
                echo "<div class='box posting-section'>";
                echo "<h2><a href='submit_proposal.php'>Event Management</a></h2>";

                // Add your event management code here
                echo "<p>Members can propose events here.</p>";

                echo "</div>";
            }
            echo "<div class='box posting-section'>";
            echo "<h2><a href='scheduling.php'>Event Schedules</a></h2>";

            // Add your event management code here
            echo "<p>See and add events for your calendar</p>";

            echo "</div>";
            ?>
            <div id="liveTimeAndDate" style="font-size: 18px; margin-top: 10px;"></div>
        </div>
    </main>

    <!-- Move the script to the end of the body -->
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
