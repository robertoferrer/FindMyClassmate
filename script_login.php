<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 5:19 PM
 */


include('script_db_connect.php');
if(isset($_POST['password'])&&isset($_POST['email'])){
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sanitized_email = mysql_real_escape_string($email);
    $sql = "SELECT * FROM WHERE `email`='$sanitized_email') LIMIT 1";
    if($result = mysql_query($sql)) {
        $row = mysql_fetch_array($result);
        $db_password = $row['pw_hash'];
        if (password_verify($password, $db_password)) {
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
            if ($row['phone'] > 0) {
                $_SESSION['phone'] = $row['phone'];
            }
            $_SESSION['uid'] = $row['uid'];
            $redirect = 'home.php';
            header('Location: ' . $redirect);
        }
        else {
            die('passwords don\'t match');
        }
    }
    else{
        die(mysql_error());
    }
}
else {
    die('Your email and password are required to continue.<br />');
}
?>