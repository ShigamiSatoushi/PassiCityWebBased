<?php
// Connect to your database
$db_host = 'localhost'; // Your host
$db_username = 'username'; // Your database username
$db_password = 'password'; // Your database password
$db_name = 'database'; // Your database name

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission and insert event into database
$title = $_POST['title'];
$date = $_POST['date'];
$description = $_POST['description'];

// Handle file upload if image is provided
$imagePath = '';
if ($_FILES['image']['name']) {
    $imagePath = 'images/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
}

$sql = "INSERT INTO events (event_title, event_date, event_description, event_image) VALUES ('$title', '$date', '$description', '$imagePath')";

if (mysqli_query($conn, $sql)) {
    $response = array('success' => true);
} else {
    $response = array('success' => false);
}

mysqli_close($conn);

// Output response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
