<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 3:06 PM
 */
include "header.php";
if($_SERVER['REQUEST_METHOD'] === "POST"){
    include "functions.php";
    if(login($_POST['email'],$_POST['password'])){
//        header("Location:home.php");
    }
}
?>

<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
        <h1>Login</h1>
        <div class="login-box">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                        Don't have an account? <a href="registration.php" style="float:right;">Sign up</a>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

<?php
    include "footer.php";
?>