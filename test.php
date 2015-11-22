<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/22/15
 * Time: 1:19 AM
 */

require('script_db_connect.php');

$result = mysql_query("SELECT * FROM 'courses' LIMIT 30") or die(mysql_error());
$i = 0;
while($row = mysql_fetch_array($result)){
    //var_dump($row);
    $i++;
    echo($i.'<br /><br />');
}

/*
$result = mysqli_query($db_link, "SELECT * FROM 'courses' LIMIT 30");
while($row = mysqli_fetch_array($result)){
    var_dump($row);
    echo('<br /><br />');
}
*/
?>