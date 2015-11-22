<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/22/15
 * Time: 7:54 AM
 */

require('script_session_handler.php');
require('script_db_connect.php');

include('header.php');

$sanitized_uid = (int) $_SESSION['uid'];
$result = mysql_query("SELECT * FROM `users` INNER JOIN `followers` ON `users`.`id`=`followers`.`user_id` WHERE `followers`.`follower_id`='$sanitized_uid'");
while($row = mysql_fetch_array($result)) {
    echo('<div>'.htmlentities($row['fname']).' '.htmlentities($row['lname']).'</div>');
}






?>