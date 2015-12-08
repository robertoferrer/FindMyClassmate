<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 3:08 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find My Classmate | <?php echo (isset($_SESSION['page_title']) ? $_SESSION['page_title'] : null); ?></title>

    <?php
    include('head_includes.php');
    ?>
    <!--    FONTS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "header.php";
?>
<form action="script_regster.php" method="POST">
    <input type="text" name="fname" aria-required="true" />
    <div class="form-group">
        <label for="inptFirstName" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" name="fname" class="form-control" id="inptFirstName" placeholder="First Name">
        </div>
    </div>
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
