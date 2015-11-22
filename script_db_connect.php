<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 8:10 PM
 */

$mysqli = new mysqli("findmyclassmatesnet.domaincommysql.com", "ramen", "eatramen", "ramen");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo "Connected successfully: ".$mysqli->host_info . "\n";

