<?php
/**
 * Created by PhpStorm.
 * User: robertoferrerb
 * Date: 11/21/15
 * Time: 2:39 PM
 */

include "header.php";

?>
    <div class="jumbotron custom-jumbotron">

        <div class="container">
            <h1>Find My Classmates!</h1>
            <div>
                <img src="images/Logo.png" width="150">
            </div>
            <br>
            <div>
                <button class="btn btn-primary btn-lg">Click Me</button>
            </div>
        </div>

    </div>
    <div class="container">

        <h1>HTML Markup</h1>
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

    </div>

<?php

    include "footer.php";