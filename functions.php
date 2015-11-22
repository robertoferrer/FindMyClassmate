<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/21/15
 * Time: 8:13 PM
 */
//include "script_db_connect.php";

function connection(){
    $mysqli = mysqli_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'ramen', 'ramen');
    if ($mysqli->connect_errno) {
//        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return null;
    }
    return $mysqli;
}

function pdoConnection(){
    $dbUserName = "root";
    $dbPassword = "123456";
    $conn =  new PDO( "mysql:host=127.0.0.1;"."dbname=ramen", $dbUserName, $dbPassword);
    return $conn;
}


function getMyCourses($id){

//    echo "Connected successfully: ".$mysqli->host_info . "\n";
    $conn = pdoConnection();
    $result=null;
    $sql = "SELECT courses.title, courses.days, courses.crn, courses.id as courseId, users.id as userId FROM courses,users,registration WHERE users.id = :id AND users.id = registration.user_id AND courses.id = registration.course_id";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
    return $result;
}

function getClassmatesByCourse($course_id){

//    echo "Connected successfully: ".$mysqli->host_info . "\n";
    $conn = pdoConnection();
    $result=null;
    $sql = "SELECT courses.id as courseId, users.id as userId, users.fname as fname, users.lname as lname, email FROM courses,users,registration WHERE registration.user_id = users.id AND courses.id = registration.course_id AND courses.id = :id";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bindParam(':id', $course_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
}

function getCoursesForUser($user_id){
    $conn = pdoConnection();
    $result=null;
    $sql = "SELECT courses.title, courses.days, courses.crn, courses.id as courseId FROM courses";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
}


function login($email, $password){
    $conn = pdoConnection();
    $result=null;
    $sql = "SELECT * FROM users WHERE email = :email";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($user)){
            $dbpassword = $user['pw_hash'];
            $itMatches = password_verify($password,$dbpassword);
            if($itMatches){
                $_SESSION['uid'] = $user['id'];
                $_SESSION['fname'] =  $user['fname'];
                $_SESSION['lname'] =  $user['lname'];
                $_SESSION['email'] =  $user['email'];
                return true;
            } else
                return false;
        } else
            return false;

    }
}

function logout(){
    $_SESSION['uid'] = "";
    $_SESSION['fname'] =  "";
    $_SESSION['lname'] =  "";
    $_SESSION['email'] =  "";
    session_destroy();
}