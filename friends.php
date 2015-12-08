<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/22/15
 * Time: 7:54 AM
 */

require('script_session_handler.php');
require('script_db_connect.php');


$sanitized_uid = (int) $_SESSION['uid'];
$result = mysql_query("SELECT * FROM `users` INNER JOIN `followers` ON `users`.`id`=`followers`.`user_id` WHERE `followers`.`follower_id`='$sanitized_uid'");
while($row = mysql_fetch_array($result)) {
    echo('<div>'.htmlentities($row['fname']).' '.htmlentities($row['lname']).'</div>');
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
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