<?php
require("connection.php");

class User
{
    // function for checking the credential of the student
    public static function login($con,  $username, $password)
    {
        // sql statement for retrieving data of the student
        $sql = "SELECT * 
        FROM login 
        WHERE `username`=:username";

        // prepare the sql statement
        $query = $con->prepare($sql);
        
        // binds the value of usn 
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        
        // it tells php to return the data as an object of class user
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');
        
        // this statement return a boolean value
        $query->execute();
        
        // if the returned value is true i.e; there exist a row which has usn same as the usn entered by the user  
        if ($user = $query->fetch()) {
            
            // check the returned value from the database with the entered value
            if ($user->username == $username &&  $user->password==$password) {
                // if the user is authenticated then return true
                return true;
            }
        }
        
        // return false if any of the condition above fails to satisfy
        return false;
    }
    
    public static function add_sem_proj_from_sem_page($con,$project_id,$sem,$proj_name,$type){
        $sql = "INSERT INTO `sem_project` (`project_id`, `project_name`, `sem`,`type`) VALUES ('$project_id', '$proj_name', '$sem', '$type')";
        $query = $con->prepare($sql);
        $query->execute();
        return true;
    }

    public static function add_research($con,$project_id,$guideid,$guidename,$field){
        $sql = "INSERT INTO `research` (`project_id`, `guide_id`,`guide_name`,`field`) VALUES ('$project_id', '$guideid', '$guidename', '$field')";
        $query = $con->prepare($sql);
        $query->execute();
        return true;
    }
    
    public static function add_industry($con,$project_id,$field,$company,$manager){
        $sql = "INSERT INTO `industry` (`project_id`, `field`, `company`, `manager`) VALUES ('$project_id','$field','$company','$manager')";
        $query = $con->prepare($sql);
        $query->execute();
        return true;
    }

    public static function add_stud_project($con,$usn,$project_id){
        $sql = "INSERT INTO `stud_project` (`usn`, `proj_id`) VALUES ('$usn', '$project_id')";
        $query = $con->prepare($sql);
        $query->execute();
        return true;
    }

    public static function query_project_id($con,$usn){
        $sql = "select `proj_id` from `stud_project` where usn='$usn'";
        $query = $con->prepare($sql);
        $query->execute();
        $res=$query->fetch();
        return $res[0];
    }
    
    #function to get id values into stud_rewards table
    public static function get_id($con,$name){
        $sql = "select `id` from `perks` where name='$name'";
        $query = $con->prepare($sql);
        $query->execute();
        $res=$query->fetch();
        return $res[0];
    }
    #function to get type values into stud_rewards table
    public static function get_type($con,$name){
        $sql = "select `type` from `perks` where name='$name'";
        $query = $con->prepare($sql);
        $query->execute();
        $res=$query->fetch();
        return $res[0];
    }
}

