<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidateID = $_POST['CandidateID'];
    $assesmentID = $_POST['assesmentID'];
    $assessmentDate = $_POST['assessmentDate'];
    $score = $_POST['score'];
    $comments = $_POST['comments'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO CandidatesAssesments (CandidateID, AssesmentID, AssesmentDate, Score, Comments, notes) 
    VALUES (3, $assesmentID, '$assessmentDate', $score, '$comments', '$notes')";

    if ($conn->query($sql) === TRUE) {
        header("Location: success_page.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
