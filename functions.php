<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/21/15
 * Time: 8:13 PM
 */
include "script_db_connect.php";

function getMyCourses($id){

    if(mysql_query($sql)) {
        $result = mysql_query("SELECT * FROM 'users' WHERE 'email' = '$sanitized_email' AND 'pw_hash' = '$sanitized_pw_hash'");
        $row = mysql_fetch_array($result);
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
}