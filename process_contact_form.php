<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Full paths to PHPMailer files
require 'C:/xampp/htdocs/simple php system/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/simple php system/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/simple php system/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate form data (you may add more validation as needed)

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'albert.tapangjr-21@gmail.com'; // Your Gmail email address
        $mail->Password = 'angelika2024'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('alberttapang165@gmail.com'); // Replace with your email address

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";

        // Send email
        if ($mail->send()) {
            // Display thank you message and redirect
            echo "Thank you for contacting us! We will get back to you soon.";
            header("refresh:3;url=home.php"); // Redirect to home.php after 3 seconds
            exit();
        } else {
            // Display error message if email sending fails
            echo "Error sending the message. Please try again later. Error: {$mail->ErrorInfo}";
        }
    } catch (Exception $e) {
        // Display error message if an exception occurs
        echo "Error sending the message. Please try again later. Error: {$e->getMessage()}";
    }
} else {
    // Redirect if accessed directly
    header("Location: contact_us.php");
    exit();
}
?>
