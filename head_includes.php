<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 6:57 PM
 */

?>

<link href="main_stylesheet.css" rel="stylesheet">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="js/dataTables/css/jquery.dataTables.css" rel="stylesheet">
<link rel="stylesheet" href="assets/owl.carousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl.carousel/owl-carousel/owl.theme.css">
<link rel="stylesheet" href="assets/owl.carousel/owl-carousel/owl.transitions.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/dataTables/js/jquery.dataTables.js"></script>
<script src="assets/owl.carousel/owl-carousel/owl.carousel.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
    $(document).ready(function(){
        $("button,input[type=\"button\"],input[type=\"submit\"]").on("mousedown",function(){
            $(this).removeClass("button-inactive");
            $(this).addClass("button-active");
        });
        $("button,input[type=\"button\"],input[type=\"submit\"]").on("mouseup mouseleave",function(){
            $(this).removeClass("button-active");
            $(this).addClass("button-inactive");
        });
        $("button,input[type=\"button\"],input[type=\"submit\"]").addClass("button-inactive");
    });
</script>