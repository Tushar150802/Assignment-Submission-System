<?php
session_start();
require('connection.php');
require('auth.php');
  if (isset($_POST["submit"]))
 {
    $describes=$_POST['describe'];
    $comments=$_POST['comments'];
    
     
    #file name with a random number so that similar dont get replaced
    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
    #upload directory path
    $uploads_dir = 'files';
    
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $proj_id=User::query_project_id($con,$_SESSION['usn']);
    
    $sql = "INSERT into `fileup` (`describes`,`comments`,`project_id`,`image`) VALUES('$describes','$comments','$proj_id','$pname')";
 
    $query=$con->prepare($sql);
    // $query->execute();

    if($query->execute())
    {
    header('Location: end.php');
    // var_dump($_FILES['file']['name']);
    }
    else{
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/comments.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Assignment Submission Website</title>
</head>

<body>
    <div class="page">
        <a href="https://www.bmsce.ac.in/"><img src="../images/logo.png"></a>
        <h2 class="heading">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Submission
            System
        </h2>
    </div>
    <section class="header">
        <form method="post" enctype="multipart/form-data">
            <div class="comment-box">
                <h1>Project Description:</h1><br>
                <textarea name="describe" placeholder="Describe your project briefly" rows="6"></textarea>
                <label for="files"><h3>Select files:</h3></label>
                <input class="file" type="File" id="file" name="file">
                <br><br>
                <h2>Comments Section:</h2>
                <textarea name="comments" placeholder="Any other comments that you'd like to add?"></textarea>
                <div class="btn-holder">
                    <input class="simple-btn" type="submit" name="submit" />
                    <!--<a href="sem.php" class="simple-btn1">Back</a>-->
                </div>
                <font face="Comic Sans" color="#28282B" size="3" align="right"><br><br>
                    <h2 class="last">&copy; Made in 2022</h2>
                </font>
            </div>
        </form>

    </section>
</body>

</html>