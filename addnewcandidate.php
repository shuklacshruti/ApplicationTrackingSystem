<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Candidate</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add New Candidate</h1>
        <form action="process_new_candidate.php" method="post">
            
            <label for="candidateid">Candidate ID:</label>
            <input type="text" name="candidateid" id="candidateid" required><br>
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>
            
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" required><br>
            
            <label for="resume">Resume:</label>
            <textarea name="resume" id="resume" required></textarea><br>
            
            <label for="notes">Notes:</label>
            <textarea name="notes" id="notes"></textarea><br>
            
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" required><br>
            
            <label for="tffc">TFFC:</label>
            <input type="text" name="tffc" id="tffc" required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
