<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://bbpintadosqueen.files.wordpress.com/2020/02/59975612_2342040909221413_8974904794346946560_o.jpg?w=768');
            backdrop-filter: blur(35px);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo img {
            width: 150px;
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
            transition: color 0.3s;
        }

        .right-links a:hover {
            color: #007bff;
        }

        .right-links a.button-logout {
            background-color: green;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .right-links a.button-logout:hover {
            background-color: #005f2d;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 200px;
            background-color: rgba(0, 0, 0, 0.6); /* Transparent background */
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            margin-bottom: 10px;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Highlight effect */
            transform: scale(1.05); /* Slight scaling effect */
        }

        .gallery {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
        }

        .fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fullscreen img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <div class="nav">
        <div class="logo">
            <img src="assets\Flag_of_Passi,_Iloilo.png" alt="Logo">
        </div>
        <!-- Links on the right side of the navbar -->
        <div class="right-links">
            <a href="home.php">Home</a>
            <a href="showannouncement.php">Announcements</a>
            <a href="events.php">Events</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="locations.php">Locations</a>
            <a href="tourism.php">Tourism</a>
            <a href="eventmanage.php">Manage event</a>
            <a href="Gallery.php">Gallery</a>
            <a href="#" class="button-logout">Log Out</a>
        </div>
    </div>

    <div class="container">
        <!-- Sidebar for subcategories -->
        <div class="sidebar">
            <a onclick="filterGallery('all')">All</a>
            <a onclick="filterGallery('old-passi')">Old Passi</a>
            <a onclick="filterGallery('new-passi')">New Passi</a>
            <a onclick="filterGallery('barangays')">Barangays</a>
        </div>

        <!-- Gallery section -->
        <div class="gallery">
            <img src="assets/passi1.jpg" alt="Photo 1" class="old-passi" onclick="toggleFullscreen(this)">
            <img src="assets/passi2.jpg" alt="Photo 2" class="new-passi" onclick="toggleFullscreen(this)">
            <img src="assets/1.jpg" alt="Photo 3" class="barangays" onclick="toggleFullscreen(this)">
            <img src="assets/2.jpg" alt="Photo 4" class="old-passi" onclick="toggleFullscreen(this)">
            <img src="assets/3.jpg" alt="Photo 5" class="new-passi" onclick="toggleFullscreen(this)">
            <img src="assets/4.jpg" alt="Photo 6" class="barangays" onclick="toggleFullscreen(this)">
            <!-- Add more images with respective categories -->
        </div>
    </div>

    <!-- JavaScript to handle fullscreen and filtering -->
    <script>
        function toggleFullscreen(elem) {
            if (!document.fullscreenElement) {
                elem.requestFullscreen().catch(err => {
                    console.error(`Error attempting to enable full-screen mode: ${err.message}`);
                });
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        }

        document.addEventListener('fullscreenchange', () => {
            const fullscreenElement = document.fullscreenElement;
            if (!fullscreenElement) {
                document.querySelectorAll('.gallery img').forEach(img => {
                    img.classList.remove('fullscreen');
                });
            } else {
                fullscreenElement.classList.add('fullscreen');
            }
        });

        function filterGallery(category) {
            const images = document.querySelectorAll('.gallery img');
            images.forEach(img => {
                if (category === 'all' || img.classList.contains(category)) {
                    img.style.display = '';
                } else {
                    img.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
