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
    /* Common styles */
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

    body {
        background-image: url('https://bbpintadosqueen.files.wordpress.com/2020/02/59975612_2342040909221413_8974904794346946560_o.jpg?w=768');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        backdrop-filter: blur(35px);
        /* Adjust the blur intensity as needed */
    }

    /* Navigation bar styles */
    .nav {
        display: flex;
        flex-wrap: wrap; /* Allow items to wrap to the next line */
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        padding: 10px 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Add any additional styles as needed */
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
    <title>Home</title>
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

            <a href="php/logout.php" class="button-logout">Log Out</a>
        </div>

        <!-- Additional navbar links -->
        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="showannouncement.php">Announcements</a>
            <a href="events.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
            <a href="reviewpage.php">Ratings</a>
            <a href="eventmanage.php">Manage event</a>
            <a href="Gallery.php">Gallery</a>
            <?php if ($res_Role == 1) : ?>
                <a href="announcements.php">Add Announcements</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Photo Slideshow Container -->
    <div class="slideshow-container">
    <div class="mySlides active">
        <img src="https://i.ytimg.com/vi/mkPRrJNUHZ4/maxresdefault.jpg" alt="Slide 1">
    </div>

    <div class="mySlides">
        <img src="https://passicity.gov.ph/wp-content/uploads/2021/04/slide-new2.png" alt="Slide 2">
    </div>
    <div class="mySlides">
        <img src="https://i.ytimg.com/vi/LIYzmeifODQ/maxresdefault.jpg" alt="Slide 3">
    </div>
    <div class="mySlides">
        <img src="https://passicity.gov.ph/wp-content/uploads/2020/12/slide2.png" alt="Slide 4">
    </div>
    <div class="mySlides">
        <img src="https://passicity.gov.ph/wp-content/uploads/2021/04/slide3.png" alt="Slide 5">
    </div>
    <div class="mySlides">
        <img src="https://fastbreak.com.ph/wp-content/uploads/2023/01/Fastbreak-Passi-City-finally-hosting-PBA-All-Star-Game-after-being-postponed-due-to-Covid-19.jpg" alt="Slide 6">
    </div>
    

    <!-- Navigation buttons for the slideshow -->
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
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
                echo "<div class='box' style='text-align: justify;'>
                    <h1>WELCOME</h1>
                    <h4>Warm Welcome to the Admins of Passi City Tourism Online Portal<br><br>
                        Dear Passi City Tourism Online Portal Admin Team,<br>
                        Greetings and a hearty welcome to each of you! It brings us immense joy to have such a dedicated and skilled group of individuals steering the ship of the Passi City Online Portal.<br>
                        Your commitment to enhancing the online experience for our community is truly commendable.
                        <br>
                        <br>
                        As administrators, you play a crucial role in ensuring that our portal remains a reliable and user-friendly platform for residents and visitors alike. Your efforts contribute significantly to fostering connectivity, efficiency, and convenience in our community. We believe that your expertise and enthusiasm will lead to continuous improvements, making the portal an even more valuable resource for everyone.
                        <br>
                        <br>
                        We are confident that, with your leadership, the Passi City Tourism Online Portal will continue to evolve into a hub of information, services, and engagement. Your collaborative spirit and dedication to innovation will undoubtedly pave the way for a more connected and empowered community.
                        <br>
                        Once again, welcome aboard! We are excited about the journey ahead and look forward to achieving new milestones together..<br>
                        <br>
                        <br><h2>Mayor of Passi City</h2></h4>
                    </div>";

                // Section to display posts made by the admin
                $admin_id = $_SESSION['id'];
                $posts_query = mysqli_query($con, "SELECT * FROM posts WHERE user_id='$admin_id'");

                if (mysqli_num_rows($posts_query) > 0) {
                    echo "<div class='box posting-section'>";
                    echo "<h2>Posts by Admin</h2>";

                    while ($post = mysqli_fetch_assoc($posts_query)) {
                        echo "<p>{$post['content']}</p>";
                    }

                    echo "</div>";
                } else {
                    echo "<div class='box posting-section'>";
                    echo "<p>No posts yet.</p>";
                    echo "</div>";
                }
            }

            if ($res_Role == 0) {
                // Display member-specific content
                echo "<div class='box' style='text-align: justify;'>
                    <h1>WELCOME</h1>
                    <h4>Warm Welcome to the Members of Passi City Online Portal<br><br>
                        Dear Passi City Tourism Online Portal Member,<br>
                        Greetings and a warm welcome to you! We are delighted to have you as a member of the Passi City Tourism Online Portal. This portal is designed to cater to the diverse needs of our community members, and your participation is integral to its success.
                        <br>
                        <br>
                        As a member, you contribute to the vibrancy of our online community. Your engagement, insights, and interactions with fellow members are what make this portal a dynamic and valuable platform. Explore the various features, connect with others, and make the most of the resources available to you.
                        <br>
                        <br>
                        Whether you're here for information, services, or community engagement, the Passi City Tourism Online Portal is here to serve you. If you have any questions or suggestions, feel free to reach out to our support team. Your feedback is essential as we continually strive to enhance your online experience.
                        <br>
                        <br>
                        Thank you for being part of the Passi City Tourism Online Portal community. We look forward to building a stronger, more connected community together.
                        <br>
                        <br><h2>Mayor of Passi City</h2></h4>
                    </div>";

                // Section to display posts made by the member
                $member_id = $_SESSION['id'];
                $posts_query = mysqli_query($con, "SELECT * FROM posts WHERE user_id='$member_id'");

                if (mysqli_num_rows($posts_query) > 0) {
                    echo "<div class='box posting-section'>";
                    echo "<h2>Posts by Member</h2>";

                    while ($post = mysqli_fetch_assoc($posts_query)) {
                        echo "<p>{$post['content']}</p>";
                    }

                    echo "</div>";
                } else {
                    echo "<div class='box posting-section'>";
                    echo "<p>No posts yet.</p>";
                    echo "</div>";
                }
            }
            ?>

            <div id="liveTimeAndDate" style="font-size: 18px; margin-top: 10px;"></div>
        </div>
    </main>

    <!-- ... (unchanged script for time and date) -->

    <!-- Add the following script for the photo slideshow -->
    <script>
        var slideIndex = 0;

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.opacity = 0;
                slides[i].style.display = "none";
            }

            slideIndex++;

            if (slideIndex > slides.length) {
                slideIndex = 1;
            }

            slides[slideIndex - 1].style.display = "block";
            fadeIn(slides[slideIndex - 1], 2000); // Change slide every 2 seconds
        }

        function fadeIn(element, duration) {
            var interval = 100; // 16ms per frame
            var targetOpacity = 1;
            var currentOpacity = 0;

            var step = (interval / duration);

            function updateOpacity() {
                currentOpacity += step;
                element.style.opacity = currentOpacity;

                if (currentOpacity < targetOpacity) {
                    requestAnimationFrame(updateOpacity);
                }
            }

            updateOpacity();
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Call the function to start the photo slideshow
        setInterval(showSlides, 5000); // Change slide every 2 seconds
    </script>


</body>

</html>
