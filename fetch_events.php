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

// Fetch events from database
$sql = "SELECT * FROM events ORDER BY event_date DESC";
$result = mysqli_query($conn, $sql);

$events = array();

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $events[] = array(
            'title' => $row['event_title'],
            'date' => $row['event_date'],
            'description' => $row['event_description'],
            'image' => $row['event_image']
        );
    }
}

mysqli_close($conn);

// Output events as JSON
header('Content-Type: application/json');
echo json_encode($events);
?>
