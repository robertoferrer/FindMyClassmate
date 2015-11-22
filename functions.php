<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/21/15
 * Time: 8:13 PM
 */
//include "script_db_connect.php";

function connection(){
    $mysqli = mysqli_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'ramen', 'ramen');
    if ($mysqli->connect_errno) {
//        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return null;
    }
    return $mysqli;
}

function getMyCourses($id){

//    echo "Connected successfully: ".$mysqli->host_info . "\n";
    $mysqli = mysqli_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'ramen','ramen');
    $resultArray=null;
    if ($stmt = $mysqli->prepare("SELECT * FROM courses,users WHERE users.id = ? AND users.id = registration.user_id")) {
        /* bind parameters for markers */
        $stmt->bind_param("s", $id);
        /* execute query */
        $stmt->execute();
        /* bind result variables */
        $stmt->bind_result($resultArray);
        /* fetch value */
        $stmt->fetch();
        /*close statement */
        $stmt->close();
    }
    $mysqli->close();
    return $resultArray;
}