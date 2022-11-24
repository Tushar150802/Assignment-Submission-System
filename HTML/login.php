<?php

session_start();

require('auth.php');
require('connection.php');

if(isset($_POST['submit'])){ 
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(User::login($con, $username, $password))
    {
        $_SESSION['usn']=$username;
     
        // directing to next page
        header('Location: sem.php');
    }
    else{
        echo "<script>alert('Wrong Credentials');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script src="validate.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Assignment Submission Website</title>
</head>

<body>
    <section>
        <div class="form-container">
            <h1>LOGIN</h1>
            <form method="POST" onsubmit="return validateForm()">
                <div class="control">
                    <label for="name">USN:</label>
                    <input type="text" name="username" id="username" placeholder="Format:(1BM00XX001):" required pattern="[0-9]{1}[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}" autofocus >
                </div>
                <div class="control">
                    <label for="psw">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Enter password:" required >
                </div>
                <span class="remember_me"><input  type="checkbox"> Remember me</span>
                <br><br>
                <input class="buttn-area" type="submit" name="submit">
                <script src=""></script>
            </form>
            <br>
            <div class="link">
                <a href="#">Forgot Password?</a>
            </div>
        </div>
    </section>
</body>

</html>

