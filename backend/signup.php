<?php
// Include database connection (replace with your credentials)
require 'db.php';
/*SQL injection (sanitize inputs)/*data) {
    //global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}*

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];*/

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();

?>
