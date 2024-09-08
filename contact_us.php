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
        /* Add your specific styles for the contact us page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://bbpintadosqueen.files.wordpress.com/2020/02/59975612_2342040909221413_8974904794346946560_o.jpg?w=768');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            /* Adjust the blur intensity as needed */
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        .contact-content {
            display: flex;
            justify-content: center; /* Center content horizontally */
            max-width: 1200px;
            margin: 20px auto; /* Center content vertically and add margin */
        }

        .contact-form {
            flex: 1;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            margin-right: 20px;
        }

        .contact-form h1 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .contact-form label {
            display: block;
            margin-bottom: 10px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .contact-form button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #45a049;
        }

        /* Styles for the aside container */
        aside {
            flex: 0 0 300px;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
        }

        aside h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        aside p {
            line-height: 1.6;
        }
    </style>
    <title>Contact Us</title>
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

    <div class="contact-content">
        <!-- Contact Form -->
        <div class="contact-form">
            <h1>Contact Us</h1>
            <form action="process_contact_form.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>

        <!-- Aside container -->
        <aside>
            <h2>Contact List for Emergency</h2>
            <p><b>Telephone<b></b><br>
+63 33 311 5087<br>
+63 33 311 5947<br>
+63 33 311 6260</p>
        </aside>
    </div>

</body>

</html>
