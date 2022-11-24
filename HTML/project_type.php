<?php
session_start();
require('connection.php');
require('auth.php');
if(isset($_POST['submit'])){
   
    
    $type=$_POST['Type'];
    $guide=$_POST['Guide'];
    $field=$_POST['Field'];

    if (User::add_sem_proj_from_project_type_page($con,$_SESSION['usn'],$type,$guide,$field)) {
        header('Location: comments.php');
    }
    else{
        echo "<script>alert('Check Again INSERTION FAILED!!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/project_type.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Assignment Submission Website</title>
</head>

<body>
    <div class="page">
        <a href="https://www.bmsce.ac.in/"><img src="../images/logo.png"></a>
        <h2 class="heading">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Submission
            System</h2>
    </div>
    
    <section class="header">
        <div class="comment-box"> 
            <form method="post">
                <div class="container">
                    <div class="custom-select">
                        <h2>Project Type:</h2>
                        <select name="Type" id="Type">
                            <option value="Industry Oriented">Industry Oriented</option>
                            <option value="Research Based">Research Based</option>   
                            <option value="Internship">Internship</option>
                        </select>
                        <h2>Project Details:</h2>
                        <input class="text" type="text" name="Guide" id="Guide" placeholder="Enter the name of your project guide:" size="30"><br>
                        <input class="text" type="text" name="Field" id="Field" placeholder="Enter your project field:" size="30">
                     </div>
                 </div>
                    <div class="btn-holder">
                        <input class="simple-btn" type="submit" name="submit">
                        <a href="sem.php" class="simple-btn1">Back</a>
                    </div>
            </form>
         </div>
    </section>
 </body>
 </html>
                        