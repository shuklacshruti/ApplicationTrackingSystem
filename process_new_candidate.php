<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidateid = $_POST['candidateid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $resume = $_POST['resume'];
    $notes = $_POST['notes'];
    $status = $_POST['status'];
    $tffc = $_POST['tffc'];

    $sql = "INSERT INTO Candidates (CandidateID, Name, Email, Phone, Resume, Notes, Status, TFFC) 
            VALUES ($candidateid, '$name', '$email', '$phone', '$resume', '$notes', '$status', '$tffc')";

if ($conn->query($sql) === TRUE) {
    header("Location: success_page.php");
    
    exit;
} else {
    header("Location: error_page.php?msg=" . urlencode("Error: " . $sql . "<br>" . $conn->error));
    exit;
}

    $conn->close();
}
?>
