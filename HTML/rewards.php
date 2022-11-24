<?php
session_start();
require('connection.php');
require('auth.php');

if (isset($_POST['rewards'])) {
    if ($_POST['rewards']=='Varsity Jacket') {
        $username=$_SESSION['usn'];
        $name='Varsity Jacket';
        $id=User::get_id($con,$name);
        $type=User::get_type($con,$name);
        $sql="INSERT INTO `stud_rewards` (`username`,`id`,`name`,`type`) values ('$username','$id','$name','$type')";
        $query=$con->prepare($sql);
        $query->execute();
    }
    if (($_POST['rewards']=='Etherium Tee')) {
        $username=$_SESSION['usn'];
        $name='Ethereum Tee';
        $id=User::get_id($con,$name);
        $type=User::get_type($con,$name);
        $sql="INSERT INTO `stud_rewards` (`username`,`id`,`name`,`type`) values ('$username','$id','$name','$type')";
        $query=$con->prepare($sql);
        $query->execute();
    }
    if (($_POST['rewards']=='attendence')) {
        $username=$_SESSION['usn'];
        $name='Attendence pass';
        $id=User::get_id($con,$name);
        $type=User::get_type($con,$name);
        $sql="INSERT INTO `stud_rewards` (`username`,`id`,`name`,`type`) values ('$username','$id','$name','$type')";
        $query=$con->prepare($sql);
        $query->execute();
    }
    header('Location: end1.php');
}
?>
<!DOCTYPE html>
<html>
    <head><title>Assignment Submission Website</title></head>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
            <link rel="stylesheet" href="../CSS/rewards.css">
        </head>
    <body bgcolor="#1ca73c">
        <header>
            <a href="https://www.bmsce.ac.in/"><img src="../pics/bms2.png" class="logo"></a>
            <nav>
                <ul class="nav-area">
                        <b><li><a href="../HTML/main.php"><i class="fa fa-home"></i>&nbsp;HOME</a></li>
                        <li><a href="../HTML/perks.php"><i class="fa fa-medal"></i>&nbsp;PERKS</a></li>
                        <li><a href="../HTML/developers.php"><i class="fa fa-user"></i>DEVELOPERS</a></li></b>
                </ul>
            </nav>
            <a href="../HTML/login.php" class="btn-area">Login</a>
        </header>
        <br>
        <h2 align="center"> Claim your rewards&nbsp;<i class="fa fa-trophy"></i>&nbsp;<i class="fa fa-money-bill"></i></h2>
        <font> 
        </font>
        <br>
        <form method='post'>
            <section class="subjects">
            <div class="container">
                <div class="grid">
                    <div class="grid-item featured-subjects">
                        <img src="../pics/reward1.jpg" alt="Varsity Jacket image purple" class="subject-image">
                        <h5 class="subject-name">Varsity Jacket</h5>
                        <span class="subject-price"></span>
                        <div class="subject-rating">
                            <i class="fas fa-star rating"></i>
                            <i class="fas fa-star rating"></i>
                            <i class="fas fa-star rating"></i>
                            <i class="fas fa-star rating"></i>
                            <i class="fas fa-star-half rating"></i>
                        </div>
                        <!-- <a href="varsity_jacket" class="butn butn-gradient" name="varsity_jacket">Claim  
                            </a> -->
                            
                            <input type="submit" class="butn butn-gradient" name="rewards" value="Varsity Jacket">
                    </div>
    
                    <div class="grid-item featured-subjects">
                      <img src="../pics/reward2.jpg" alt="Ethereum T-shirt" class="subject-image">
                      <h5 class="subject-name">Ethereum Tee</h5>
                      <span class="subject-price"></span>
                      <div class="subject-rating">
                          <i class="fas fa-star rating"></i>
                          <i class="fas fa-star rating"></i>
                          <i class="fas fa-star rating"></i>
                          <i class="fas fa-star rating"></i>
                          <i class="fas fa-star rating"></i>
                      </div>
                      <!-- <a href="eth_tee" class="butn butn-gradient" name="eth_tee">Claim
                          </a> -->
                        
                          <input type="submit" class="butn butn-gradient" name="rewards" value="Etherium Tee">
                  </div>
    
                  <div class="grid-item featured-subjects">
                      <img src="../pics/reward3.jpg" alt="Attendence ticket" class="subject-image">
                      <h5 class="subject-name">Attendence pass</h5>
                      <span class="subject-price"></span>
                      <div class="subject-rating">
                          <i class="fas fa-star rating"></i>
                          <i class="fas fa-star rating"></i>
                          <i class="fas fa-star rating"></i>
                          <i class="fas fa-star-half rating"></i>
                      </div>
                      <!-- <a href="attendence" class="butn butn-gradient" name="attendence">Claim
                      </a> -->
                     
                      <input type="submit" class="butn butn-gradient" name="rewards" value="attendence">
                  </div>
              </div>
           </div>
      </section>
        </form>
      <br><br>
      <font face="Comic Sans" color="#000005" size="3" align="right"><h2>&copy; Made in 2022</h2></font>

    </body>
</html>