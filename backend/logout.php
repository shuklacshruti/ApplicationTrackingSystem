<?php
// Start session if not already started
session_start();

// Unset all session variables
unset($_SESSION['logout']);

// Destroy the session
session_destroy();

// Redirect to login page or any other page
header("Location: index.html");
exit;
?>
