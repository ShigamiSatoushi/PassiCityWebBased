<?php
include("php/config.php");

// Check if the user is logged in
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Fetch user details from the database
$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

while ($result = mysqli_fetch_assoc($query)) {
    $res_Role = isset($result['isAdmin']) ? $result['isAdmin'] : 0;
}

// Set the role in the session
$_SESSION['role'] = $res_Role;

// Process the form to approve or disapprove proposals
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted for approval or disapproval
    if (isset($_POST['approve']) && $_SESSION['role'] == 1) {
        $proposalId = mysqli_real_escape_string($con, $_POST['proposal_id']);
        $sql = "UPDATE proposals SET status='approved' WHERE id=$proposalId";
        mysqli_query($con, $sql);
    } elseif (isset($_POST['disapprove']) && $_SESSION['role'] == 1) {
        $proposalId = mysqli_real_escape_string($con, $_POST['proposal_id']);
        $sql = "UPDATE proposals SET status='disapproved' WHERE id=$proposalId";
        mysqli_query($con, $sql);
    }
}

// Fetch proposals from the database
$sql = "SELECT * FROM proposals";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Proposals</title>
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
            margin-top: 80px;
        }

        .proposal-container {
            max-width: 800px;
            margin: 20px auto;
        }

        .proposal {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px;
            border-radius: 5px;
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
            <a href="tourism.php">Payments</a>
            <a href="submit_proposal.php">Event Management</a>
        </div>
    </div>

    <h1>View Proposals</h1>

    <div class="proposal-container">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='proposal'>";
            echo "<p style='font-weight: bold; color: green;'>Event Name: " . $row['event_name'] . "</p>";
            echo "<p><b>Description:</b> " . $row['event_description'] . "</p>";
            echo "<p><b>Status:</b> " . ucfirst($row['status']) . "</p>";

            // Display approval/disapproval buttons only for admin and pending proposals
            if ($_SESSION['role'] == 1 && $row['status'] == 'pending') {
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='proposal_id' value='" . $row['id'] . "'>";
                echo "<input type='submit' name='approve' value='Approve'>";
                echo "<input type='submit' name='disapprove' value='Disapprove'>";
                echo "</form>";
            }

            echo "</div>";
        }
        ?>
    </div>

    <a href="submit_proposal.php">Submit a Proposal</a>
</body>

</html>
