<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Job Posting</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add New Job Posting</h1>
        <form action="process_new_job.php" method="post">

            <label for="JobID">Job ID:</label>
            <input type="text" name="JobID" id="JobID" required><br>

            <label for="jobTitle">Job Title:</label>
            <input type="text" name="jobTitle" id="jobTitle" required><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required></textarea><br>

            <label for="requirements">Requirements:</label>
            <textarea name="requirements" id="requirements" rows="4" required></textarea><br>

            <label for="datePosted">Date Posted:</label>
            <input type="date" name="datePosted" id="datePosted" required><br>

            <label for="dueDate">Due Date:</label>
            <input type="date" name="dueDate" id="dueDate" required><br>

            <label for="jobStatus">Job Status:</label>
            <select name="jobStatus" id="jobStatus" required>
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
                <option value="Filled">Filled</option>

            </select><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
