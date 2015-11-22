<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/21/15
 * Time: 8:13 PM
 */
//include "script_db_connect.php";

function getMyCourses($id){
    $mysqli = new mysqli("findmyclassmatesnet.domaincommysql.com", "ramen", "eatramen", "ramen");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
//    echo "Connected successfully: ".$mysqli->host_info . "\n";

    if ($stmt = $mysqli->prepare("SELECT * FROM courses,users WHERE users.uid = ? AND users.uid = courses.")) {
        /* bind parameters for markers */
        $stmt->bind_param("s", $city);
        /* execute query */
        $stmt->execute();
        /* bind result variables */
        $stmt->bind_result($district);
        /* fetch value */
        $stmt->fetch();
        printf("%s is in district %s\n", $city, $district);
        /* close statement */
        $stmt->close();
    }
    $mysqli->close();
}