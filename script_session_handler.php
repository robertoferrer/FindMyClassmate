<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 2:46 PM
 */

session_start();

if(!isset($_SESSION['uid'])){
    $redirect_url='login.php';
    if(isset($_SERVER['HTTP_REFERER'])){
        $redirect_url.='?target='.urlencode($_SERVER['HTTP_REFERER']);
    }
    header('Location: '.$redirect_url);
}
?>