<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database configuration
$servername = "sql303.infinityfree.com";
$username = "if0_39624139";
$password = "tcONVHswjqznBO6";
$dbname = "if0_39624139_portfolio";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    // Save to Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo "<script>alert('Database Connection Failed.'); window.history.back();</script>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Send Email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ianmutwiri37@gmail.com';
            $mail->Password   = 'kdgd pfnd sbcb zfxr';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('ianmutwiri37@gmail.com', 'Portfolio Website');
            $mail->addAddress('ianmutwiri37@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = "New Message from $name";
            $mail->Body    = "<h3>New Contact Form Submission</h3>
                              <p><strong>Name:</strong> $name</p>
                              <p><strong>Email:</strong> $email</p>
                              <p><strong>Message:</strong><br>$message</p>";

            $mail->send();
            echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message saved, but email failed: {$mail->ErrorInfo}'); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('Failed to save message.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href='index.html';</script>";
}
?>