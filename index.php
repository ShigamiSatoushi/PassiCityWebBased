<?php 
   session_start();
   include("php/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('assets/background.png'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .welcome-container {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the background color and opacity as needed */
            border-radius: 10px;
        }

        .container {
            background: transparent; /* Set the background of the container to transparent */
            backdrop-filter: blur(1px); /* Apply the blur effect to the container background */
        }

        .box.form-box {
            background: rgba(255, 255, 255, 0.8); /* Adjust the background color and opacity as needed */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add box shadow for a better visual effect */
            background-color: rgba(152,251,152, 0.8);
        }
        .field input[type="submit"] {
            background-color: green;
            color: #fff;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to Passi City Tourism Online Portal</h1>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con,$_POST['email']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);

                    $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['age'] = $row['Age'];
                        $_SESSION['id'] = $row['Id'];
                    }else{
                        echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                        </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button>";
                    }
                    if(isset($_SESSION['valid'])){
                        header("Location: home.php");
                    }
                }else{
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
