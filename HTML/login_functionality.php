<?php
require("configuration/config.php");

class User
{

    // function for checking the credential of the uer
    public static function login($con,  $usn, $email, $password)
    {
        // sql statement for retrieving data of the student
        $sql = "SELECT * 
        FROM student 
        WHERE usn=:usn";

        // prepare the sql statement
        $query = $con->prepare($sql);

        // binds the value of usn 
        $query->bindValue(':usn', $usn, PDO::PARAM_STR);

        // it tells php to return the data as an object of class user
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');

        // this statement return a boolean value
        $query->execute();

        // if the returned value is true i.e; there exist a row which has usn same as the usn entered by the user  
        if ($user = $query->fetch()) {

            // check the returned value from the database with the entered value
            if ($user->usn == $usn && $user->student_email == $email && $user->password == $password) {
                // if the user is authenticated then return true
                return true;
            }
        }

        // return false if any of the condition above fails to satisfy
        return false;
    }


    // function to retrieve all the info about
    public static function query_all($con, $usn)
    {
        if ($con) {
            $sql = "SELECT * FROM `student` WHERE usn=:usn";
            $query = $con->prepare($sql);
            $query->bindValue(':usn', $usn, PDO::PARAM_STR);
            $query->setFetchMode(PDO::FETCH_CLASS, 'User');
            $query->execute();
        }
        if ($usr = $query->fetch()) {
            return $usr;
        }
    }


    // function to retrieve all the course codes registered by the student
    public static function query_all_registrd_courses($con, $usn, $sem)
    {
        if ($con) {
            $sql = " 
            SELECT DISTINCT r.course_id,c.course_name,c.credit,r.cie,r.see,r.total_marks,r.sem
            FROM enrolled e,course c,result r
            WHERE e.usn='$usn' AND
            r.usn='$usn' AND
            e.course_id=c.course_id AND
            r.course_id=e.course_id AND
            r.sem='$sem'";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }


    // function to retrieve the failed subject details of the student 
    public static function query_all_failed_sub($con, $usn, $sem)
    {
        if ($con) {
            $sql = " 
            SELECT DISTINCT r.sem,r.course_id,c.course_name,c.credit
            FROM result r,course c
            WHERE r.usn='$usn' AND
            r.total_marks<40 AND
            r.sem='$sem' AND
            c.course_id=r.course_id";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }


    // function to retrieve the failed subject irrespective of the semester  
    public static function query_all_failed_sub_irrespective_of_sem($con, $usn)
    {
        if ($con) {
            $sql = " 
            SELECT DISTINCT r.sem,r.course_id,c.course_name,c.credit
            FROM result r,course c
            WHERE r.usn='$usn' AND
            r.total_marks<40 AND
            c.course_id=r.course_id";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }


    // function to retrieve the number of subjects student has failed in 
    public static function query_course_id_of_failed_sub($con, $usn, $sem)
    {
        if ($con) {
            $sql = " 
            SELECT DISTINCT r.course_id
            FROM result r,course c
            WHERE r.usn='$usn' AND
            r.total_marks<40 AND
            r.sem='$sem'";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }


    // function to retrieve the semester of the student 
    public static function query_semester($con, $usn)
    {
        if ($con) {
            $sql = " 
            SELECT DISTINCT r.sem,r.exam_name
            FROM result r,student s
            WHERE r.usn='$usn'";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }


    // function to retrieve all the course names registered by the student
    public static function query_all_registrd_course_names($con, $usn, $sem)
    {
        if ($con) {
            $sql = "
            SELECT DISTINCT c.course_name
            FROM course c,enrolled e
            WHERE e.usn='$usn' AND
            e.course_id=c.course_id AND
            e.sem='$sem' AND
            c.sem='$sem'";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }


    // function to retrieve all the course names registered by the student
    public static function query_all_registrd_courses_credits($con, $usn)
    {
        if ($con) {
            $sql = "SELECT course.credit
            FROM course,enrolled
            WHERE enrolled.usn='$usn' AND
            enrolled.course_id=course.course_id";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }


    // function to return the correct and full name of the department the studet belong to 
    public static function get_dept_name($name)
    {
        switch ($name) {
            case 'CSE':
                return "COMPUTER SCIENCE AND ENGINEERING";
                break;
            case 'ISE':
                return "INFORMATION SCIENCE AND ENGINEERING";
                break;
            case 'CV':
                return "CIVIL ENGINEERING";
                break;
            case 'ETE':
                return "Electronics and Instrumentation Engineering";
                break;
            case 'MCA':
                return "Computer Applications (MCA)";
                break;
            case 'MECH':
                return "Mechanical Engineering";
                break;
            case 'EEE':
                return "Electrical and Electronics Engineering";
                break;
            case 'EIE':
                return "Electronics and Instrumentation Engineering";
                break;
            case 'ECE':
                return "Electronics and Communication Engineering";
                break;
            case 'ML':
                return "Medical Electronics Engineering";
                break;
            case 'IEM':
                return "Industrial Engineering and Management";
                break;
            case 'CH':
                return "Chemical Engineering";
                break;
            case 'BT':
                return "Bio-Technology";
                break;
            case 'AS':
                return "Aerospace Engineering";
                break;
            case 'AIML':
                return "Machine Learning";
                break;
        }
    }


    // function to calculate grade fo the student
    public static function calculate_grade($mark)
    {
        if ($mark >= 90) {
            return "S";
        } elseif ($mark >= 80 && $mark <= 89) {
            return "A";
        } elseif ($mark >= 70 && $mark <= 79) {
            return "B";
        } elseif ($mark >= 60 && $mark <= 69) {
            return "C";
        } elseif ($mark >= 50 && $mark <= 59) {
            return "D";
        } elseif ($mark >= 40 && $mark <= 49) {
            return "E";
        } else {
            return "F";
        }
    }

    public static function query_if_application_submitted_for_fastrack($con, $usn)
    {
        if ($con) {
            $sql = "
            SELECT r.course_id
            FROM course c,enrolled e,result r,aplication a
            WHERE a.usn='$usn' AND
            a.course_id IN
                (SELECT DISTINCT r.course_id
                FROM result r
                WHERE r.usn='$usn' AND
                r.total_marks<40)";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($query->fetchAll()) {
            return true;
        }
        return false;
    }

    // function to check if the user is logged in
    public static function isloggedin()
    {
        if (isset($_SESSION['is_logged_in'])  && $_SESSION['is_logged_in']) {
            return true;
        }
        return false;
    }
}
