<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 2:54 PM
 */

session_start();
unset($_SESSION);
session_destroy();
header('Location: index.php');
?>