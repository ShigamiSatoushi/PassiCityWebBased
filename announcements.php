<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "userbase");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_announcement'])) {
    $announcement_title = mysqli_real_escape_string($con, $_POST['announcement_title']);
    $announcement_content = mysqli_real_escape_string($con, $_POST['announcement_content']);

    // Use prepared statements to prevent SQL injection
    $insert_query = "INSERT INTO announcements (title, content) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $insert_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $announcement_title, $announcement_content);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: announcements.php");
        exit();
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }
}

// Retrieve announcements from the database
$announcements_query = mysqli_query($con, "SELECT * FROM announcements");
$announcements = mysqli_fetch_all($announcements_query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <style>
        .btn{
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

        /* Style for the posting section */
        .posting-section {
            margin-top: 20px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
        }
    </style>
    <title>Announcements</title>
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
        <div class="posting-section">
            <h2>Add Announcement</h2>
            <form method="post" action="announcements.php">
                <label for="announcement_title">Title:</label>
                <input type="text" id="announcement_title" name="announcement_title" required>

                <label for="announcement_content">Content:</label>
                <textarea id="announcement_content" name="announcement_content" required></textarea>

                <button type="submit" name="add_announcement">Add Announcement</button>
            </form>
        </div>

        <?php foreach ($announcements as $announcement) : ?>
            <div class="announcement-container">
                <div class="announcement-title">
                    <?php echo isset($announcement['title']) ? $announcement['title'] : ''; ?>
                </div>
                <div class="announcement-content">
                    <?php echo isset($announcement['content']) ? $announcement['content'] : ''; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>
