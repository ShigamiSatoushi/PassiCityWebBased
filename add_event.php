<?php
session_start();
include("php/config.php");

// Check if the user is logged in
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
}

// Process the form to add a new event (only for admins)
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
        $event_name = mysqli_real_escape_string($con, $_POST['event_name']);
        $event_date = mysqli_real_escape_string($con, $_POST['event_date']);
        $event_description = mysqli_real_escape_string($con, $_POST['event_description']);
        
        $insert_query = "INSERT INTO currentevents (event_name, event_date, event_description) VALUES ('$event_name', '$event_date', '$event_description')";
        
        if (mysqli_query($con, $insert_query)) {
            // Event added successfully
            header("Location: events.php"); // Refresh the page to show the new event
            exit();
        } else {
            echo "Error adding event: " . mysqli_error($con);
        }
    }
}
?>
