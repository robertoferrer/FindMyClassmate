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
<nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <img src="images/Logo.png" class="logo" style="display: inline; width: 50px; margin:-10px 10px 0px 0px;">Find My Classmates</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li><a href="mycourses.php">My Courses</a></li>
                    <li><a href="calendar.php">Calendar</a></li>
                    <li><a href="friends.php">Friends</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Course name">
                    </div>
                    <button type="submit" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
                    </button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        $user = isset($_SESSION['uid']) ? $_SESSION['uid'] : null;
                        if(isset($user)){
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Hello, <?php echo $_SESSION['fname']; ?></a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="myProfile.php">My Profile</a></li>
                                    <li><a href="script_logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                            <?php
                        }
                    ?>

                </ul>
            </div>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<?php
