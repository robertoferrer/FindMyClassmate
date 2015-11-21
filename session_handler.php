<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 2:46 PM
 */

session_start();

if(!isset($_SESSION['uid'])) {
    header('login.php');
}

?>