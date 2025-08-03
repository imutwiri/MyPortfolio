<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        echo "All fields are required.";
        exit;
    }

    // Save to Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Database Connection Failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Send Email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ianmutwiri37@gmail.com';
            $mail->Password   = 'kdgd pfnd sbcb zfxr';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('ianmutwiri37@gmail.com', 'Portfolio Website');  // Sender
            $mail->addAddress('ianmutwiri37@gmail.com');

            // Content
            $mail->isHTML(true);
            $mail->Subject = "New Message from $name";
            $mail->Body    = "<h3>New Contact Form Submission</h3>
                              <p><strong>Name:</strong> $name</p>
                              <p><strong>Email:</strong> $email</p>
                              <p><strong>Message:</strong><br>$message</p>";

            $mail->send();
            echo "Message sent successfully!";
        } catch (Exception $e) {
            echo "Message saved, but email failed: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to save message.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
