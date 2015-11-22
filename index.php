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
        <div id="owl-home">
            <div class="img-center">
                <img src="images/Banner%203.jpg">
            </div>
            <div class="img-center">
                <img src="images/Banner%203%20%233.jpg">
            </div>
            <div class="img-center">
                <img src="images/Banner%203%20%232.jpg">
            </div>
        </div>

    </div>
    <div class="container">

        <div class="row">
            <div class="col-sm-offset-1">
                <h1>Registration</h1>
                <br>
            </div>
        </div>
        <div class="box2">
            <form class="form-horizontal" action="script_register.php" method="POST">
                <div class="form-group">
                    <label for="inptFirstName" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-4">
                        <input type="text" name="fname" class="form-control" id="inptFirstName" aria-required="true" placeholder="First Name">
                    </div>
                    <label for="inputLastName" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-4">
                        <input type="text" name="lname" class="form-control" id="inputLastName" aria-required="true" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="Email" class="form-control" id="inputLastName" aria-required="true" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="Phone" class="form-control" id="inputLastName"  placeholder="XXX-XXX-XXXX">
                        <p class="help-block">Please type 10 digits</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="Password" class="form-control" id="inputPassword" aria-required="true" placeholder="*******">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="Password2" class="form-control" id="inputPassword2" aria-required="true" placeholder="*******">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input class="btn btn-info" type="submit" value="Sign Up" />
                    </div>
                </div>
            </form>
        </div>


    </div>

<script>
    $(document).ready(function() {

        $("#owl-home").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds
            navigation : false, // Show next and prev buttons
            slideSpeed : 5,
            paginationSpeed : 400,
            singleItem:true,
            transitionStyle: "fade"

        });

    });
</script>
<?php

include "footer.php";