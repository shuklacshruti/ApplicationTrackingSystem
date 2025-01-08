<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db.php'; // Adjust the path as necessary

    // Retrieve form data
    $jobID = $_POST['JobID'];
    $jobTitle = $_POST['jobTitle'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $datePosted = $_POST['datePosted'];
    $dueDate = $_POST['dueDate'];
    $jobStatus = $_POST['jobStatus'];

    $sql = "INSERT INTO JobPostings (JobID, JobTitle, Description, requirements, DatePosted, DueDate, JobStatus) 
            VALUES ($jobID,'$jobTitle', '$description', '$requirements', '$datePosted', '$dueDate', '$jobStatus')";

    if ($conn->query($sql) === TRUE) {
        header("Location: success_page.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: addnewjob.php"); 
    exit;
}
?>
