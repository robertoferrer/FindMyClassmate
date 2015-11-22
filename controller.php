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
}