<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 3:08 PM
 */
include('header.php');

?>
<form action="script_register.php" method="POST">
    <input type="text" name="fname" aria-required="true" />
    <br />
    <input type="" name="lname" aria-required="true" />
    <br />
    <input type="text" name="email" aria-required="true" />
    <br />
    <input type="text" name="phone" />
    <br />
    <input type="password" name="password" aria-required="true" />
    <br />
    <input type="password" name="password_confirm" aria-required="true" />
    <br />
    <input type="submit" value="Sign Up" />
</form>
