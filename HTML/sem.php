<?php
session_start();
require('connection.php');
require('auth.php');
if(isset($_POST['submit']))
{
    $sem=$_POST['Semester'];
    $proj_id=$_POST['ID'];
    $project_name=$_POST['Project'];
    $type=$_POST['submit'];
    if (User::add_sem_proj_from_sem_page($con,$proj_id,$sem,$project_name,$type) && User::add_stud_project($con,$_SESSION['usn'],$proj_id)) {
        if ($_POST['submit']=='Research') {
            header('Location: research.php');
        }
        if ($_POST['submit']=='Industry') {
            header('Location: industry.php');
        }
    }
    else{
        echo "<script>alert('Check Again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/sem.css">
    <title>Assignment Submission Website</title>
</head>
<body>
    <section class="header">
        <div class="page">
            <a href="https://www.bmsce.ac.in/"><img src="../images/logo.png"></a>
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Submission System</h1>               
        </div>
        <form method='post'>
        <div class="container">
    <div class="custom-select">
        <h2>Project-id:</h2>
        <input class="text" type="text" name="ID" id="ID" placeholder="Format:CSE-XXX" pattern="[A-Z]{3}[-]{1}[0-9]{3}" size="15" required><br>
        <h2>Semester:</h2>
         <select name="Semester" id="Semester">
             <option value="1st Semester">1st Semester</option>
             <option value="2nd Semester">2nd Semester</option>
             <option value="3rd Semester">3rd Semester</option>
             <option value="4th Semester">4th Semester</option>
             <option value="5th Semester">5th Semester</option>
             <option value="6th Semester">6th Semester</option>
             <option value="7th Semester">7th Semester</option>
             <option value="8th Semester">8th Semester</option>     
        </select>
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </h1>
           
            

        <h2>Project Name:</h2>
        <select name="Project" id="Project" >
            <option value="Online Shopping System">Online Shopping System</option>
            <option value="Library Management System">Library Management System</option>
            <option value="Banking Application">Banking Application</option>
            <option value="Event Management">Event Management</option>
            <option value="Online Food Delivery">Online Food Delivery</option>
            <option value="Gym Management">Gym Management</option>
            <option value="Pharmacy Management System">Pharmacy Management System</option>
            <option value="Railway reservation">Railway reservation</option>
            <option value="Placement Management System">Placement Management System</option>
            <option value="Assignment Submission System">Assignment Submission System</option>
        </select>
        <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
           
        
        <h2>Project Type:</h2>
    </div>
    </div>
    <div class="btn-holder">
        <input class="simple-btn" type="submit" name="submit" value='Research'>
        <input class="simple-btn" type="submit" name="submit" value='Industry'>
        <br><br><br>
        <!--<a href="login.php" class="simple-btn1">Back</a>-->
        <!-- <a href="login.php"> <button class="glow-on-hover" type="button">BACK</button></a>-->
        <div class="wrapper">
         <a class="link" href="login.php"><span>BACK</span></a>
        </div>
    </div>
    </form>
</section>
</body>
</html>