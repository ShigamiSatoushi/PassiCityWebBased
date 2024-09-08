<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reviews</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="number"],
        form textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="file"] {
            margin-bottom: 10px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .review {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        .review img {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }

        .review p {
            margin: 5px 0;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        .see-reviews {
            text-align: center;
            margin-top: 20px;
        }

        .see-reviews button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .see-reviews button:hover {
            background-color: #45a049;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .review {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .review img {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }

        .review p {
            margin: 5px 0;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ccc;
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
    z-index: 1000; /* Ensure the navigation bar stays above other elements */
    /* Add any additional styles as needed */
}

body {
    background-image: url('https://bbpintadosqueen.files.wordpress.com/2020/02/59975612_2342040909221413_8974904794346946560_o.jpg?w=768');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    backdrop-filter: blur(35px); /* Adjust the blur intensity as needed */
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
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

    /* Add this CSS for center alignment of slideshow */
    .slideshow-container {
        max-width: 100%;
        margin: 0 auto; /* Center align */
        text-align: center; /* Center align */
    }
    </style>
</head>
<body>
<div class="nav">
        <div class="logo">
            <img src="assets\Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>


        <!-- Additional navbar links -->
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
        </div>
    </div>
    <div class="container">
        <h1>User Reviews</h1>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "userbase";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve data from the database
        $sql = "SELECT user_name, rating, review_text, photo_path FROM place_reviews";
        $result = $conn->query($sql);

        // Display data
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='review'>";
                echo "<p><strong>User:</strong> " . $row["user_name"] . "</p>";
                echo "<p><strong>Rating:</strong> " . $row["rating"] . "</p>";
                echo "<p><strong>Review:</strong> " . $row["review_text"] . "</p>";
                if (!empty($row["photo_path"])) {
                    echo '<img src="' . $row["photo_path"] . '" width="200" height="150">';
                }
                echo "</div><hr>";
            }
        } else {
            echo "No reviews found.";
        }
        $conn->close();
        ?>
        <div class="Back to Submit review">
            <button onclick="window.location.href='reviewpage.php'">See Reviews</button>
        </div>
</body>
</html>
