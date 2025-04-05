<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assessments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add Assessments</h1>
        <form action="process_new_assessment.php" method="post">
            <label for="candidate">Select Candidate:</label>
            <input type="text" name="candidateID" id="candidate" required>
            <!--
                
                <option value="1">Candidate 1</option>
                <option value="2">Candidate 2</option>
-->
            </input><br>

            <label for="assesmentID">Assessment ID:</label>
            <input type="text" name="assesmentID" id="assesmentID" required><br>


            <label for="assessmentDate">Assessment Date:</label>
            <input type="date" name="assessmentDate" id="assessmentDate" required><br>

            <label for="score">Score:</label>
            <input type="text" name="score" id="score" required><br>

            <label for="comments">Comments:</label>
            <textarea name="comments" id="comments" rows="4" required></textarea><br>

            <label for="notes">Notes:</label>
            <textarea name="notes" id="notes" rows="4"></textarea><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
