<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 3:33 PM
 */

session_start();
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['password'])&&isset($_POST['password_confirm'])&&isset($_POST['email'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    if($password === $password_confirm){
        $pw_hash = password_hash($password, PASSWORD_BCRYPT);
        $sanitized_fname = mysql_real_escape_string($fname);
        $sanitized_lname = mysql_real_escape_string($lname);
        $sanitized_email = mysql_real_escape_string($email);
        $sanitized_phone = (int) $phone;
        $sanitized_pw_hash = mysql_real_escape_string($pw_hash);
        $sql = "INSERT INTO 'users' ('fname','lname','pw_hash','email','phone') VALUES ('$sanitized_fname','$sanitized_lname','$sanitized_pw_hash','$sanitized_email','$sanitized_phone')";
        mysql_query($sql);
    }
    else{
        //passwords don't match

    }
}
?>