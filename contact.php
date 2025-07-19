<?php
// Database connection settings
$host = "localhost";
$user = "root";
$password = "";
$dbname = "portfolio";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data and sanitize
$name = $conn->real_escape_string($_POST['name'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$message = $conn->real_escape_string($_POST['message'] ?? '');

if ($name && $email && $message) {
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Please fill all fields.'); window.location.href='index.html';</script>";
}

$conn->close();
?>