<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/22/15
 * Time: 7:00 AM
 */


$query = $_GET['q'];
$sanitized_query = mysql_real_escape_string($query);
$sql = "SELECT * FROM `courses` WHERE ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find My Classmate | <?php echo (isset($_SESSION['page_title']) ? $_SESSION['page_title'] : null); ?></title>

    <?php
    include('head_includes.php');
    ?>
    <!--    FONTS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "header.php";
?>