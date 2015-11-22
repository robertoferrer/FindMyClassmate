<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/22/15
 * Time: 7:00 AM
 */

include('header.php');

$query = $_GET['q'];
$sanitized_query = mysql_real_escape_string($query);
$sql = "SELECT * FROM `courses` WHERE ";
?>