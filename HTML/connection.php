<!-- <?php
    // $server="localhost";
    // $username="root";
    // $password="";
    // $con = mysqli_connect($server,$username,$password);
    // if(!$con){
    //     die("Connection to this database failed due to".
        // mysqli_connect_error());
    // }
?> -->
<?php
//database connection

ob_start();

try {
    $con = new PDO("mysql:dbname=project;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $th) {
    exit("failed connection with database:" . $th->getMessage());
}
