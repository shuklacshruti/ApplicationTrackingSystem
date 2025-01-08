<!-- header.php -->

<?php
    session_start();
?>

<div class="header">
    <h1>Welcome to the Job Portal</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION['logged_in'])) : ?>
                <li><a href="AddNewCandidate.php">Add New Candidate</a></li>
                <li><a href="AddNewJob.php">Add New Job</a></li>
                <li><a href="AddAssessments.php">Add Assessments</a></li>
                <li><a href="Logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
