<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/22/15
 * Time: 5:40 AM
 */

include_once "functions.php";
$function = $_POST['function'];

switch($function){
    case "getDepartments":
        return getDepartments();
        break;
    case "getCourseByDepartment":
        return json_encode(getCourseByDepartment($_POST['department']));
        break;
}