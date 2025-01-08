<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecruitEase Dashboard</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="dashboard-styles.css"> 
</head>
<body>
     
    <div class="dashboard-container">
        <h1>Welcome to RecruitEase Dashboard</h1>
        <ul class="dashboard-menu">
            <li><a href="addnewcandidate.php">Add New Candidate</a></li>
            <li><a href="addnewjob.php">Add New Job</a></li>
            <li><a href="addassessments.php">Add Assessments</a></li>
        </ul>
        <ul>
            <?php
            include 'db.php';
            
            $sql = "SELECT * FROM `jobpostings`";  //select all from jobposings table
            $result = mysqli_query($conn, $sql);   //execute the query
            
            //fetch data from database and store it 
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <table border=3>
                        <tr>
                            <td>
                                <?php echo "JobID :  " . $row['JobID'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "JobTitle:  " . $row['JobTitle'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "Description:  " . $row['Description'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "requirements:  " . $row['requirements'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "JobStatus:  " . $row['JobStatus'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "DatePosted:  " . $row['DatePosted'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "DueDate:  " . $row['DueDate'] . "<br>"; ?>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
            }
            
            $sql = "SELECT * FROM `candidates`";  //select all from jobposings table
            $result = mysqli_query($conn, $sql);   //execute the query
            
            //fetch data from database and store it 
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <table border=3>
                        <tr>
                            <td>
                                <?php echo "CandidateID :  " . $row['CandidateID'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "Name:  " . $row['Name'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "Email:  " . $row['Email'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "Phone:  " . $row['Phone'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "Resume:  " . $row['Resume'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "Notes:  " . $row['Notes'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "Status:  " . $row['Status'] . "<br>"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "TFFC:  " . $row['TFFC'] . "<br>"; ?>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
            }
            
            $sql = "SELECT * FROM `candidatesassesments`";
            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <table border=3>
                        <tr>
                            <td><?php echo "AssesmentID :  " . $row['AssesmentID'] . "<br>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "CandidateID:  " . $row['CandidateID'] . "<br>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "AssesmentDate:  " . $row['AssesmentDate'] . "<br>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "Score:  " . $row['Score'] . "<br>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "Comments:  " . $row['Comments'] . "<br>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "notes:  " . $row['notes'] . "<br>"; ?></td>
                        </tr>
                    </table>
                    <?php
                }
            }
            
            mysqli_close($conn);
            ?> </ul>
        <p><a href="logout.php" class="logout">Logout</a></p>
    </div>
    <script src="script.js"></script>
</body>
</html>
