<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/21/15
 * Time: 8:13 PM
 */
//include "script_db_connect.php";

function connection(){
    include('script_db_connect.php');
}

function pdoConnection(){
    $dbUserName = "root";
    $dbPassword = "123456";
    $conn =  new PDO( "mysql:host=127.0.0.1;"."dbname=ramen", $dbUserName, $dbPassword);
    return $conn;
}


function getMyCourses($id){
    connection();
    $result=null;
    $sql = "SELECT courses.title, courses.days, courses.crn, courses.id as courseId, users.id as userId FROM courses,users,registration WHERE users.id = :id AND users.id = registration.user_id AND courses.id = registration.course_id";
    $result = mysql_query($sql);
    return $result;
}

function getClassmatesByCourse($course_id){
    connection();
    $result=null;
    $sql = "SELECT courses.id as courseId, users.id as userId, users.fname as fname, users.lname as lname, email FROM courses,users,registration WHERE registration.user_id = users.id AND courses.id = registration.course_id AND courses.id = :id";
    $result = mysql_query($sql);
    return $result;
}

function getCoursesForUser($user_id){
    connection();
    $result=null;
    $sql = "SELECT courses.title, courses.days, courses.crn, courses.id as courseId FROM courses";
    $result = mysql_query($sql);
    return $result;
}


function login($email, $password){
    connection();
    $result=null;
    $sql = "SELECT * FROM users WHERE email = :email";
    $result = mysql_query($sql);
    $user = mysql_fetch_array($result);
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

function logout(){
    $_SESSION['uid'] = "";
    $_SESSION['fname'] =  "";
    $_SESSION['lname'] =  "";
    $_SESSION['email'] =  "";
    unset($_SESSION);
    session_destroy();
}

function getDepartments(){
    connection();
    $sql = "SELECT DISTINCT `department` FROM `courses`;";
    if(mysql_query($sql)) {
        $result = mysql_query($sql);
        //$row = mysql_fetch_array($result);
        return $result;
    }
}