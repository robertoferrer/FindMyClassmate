<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 3:33 PM
 */

session_start();
$db_link = mysqli_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'ramen', 'eatramen');
if(!$db_link){
    error_log(mysqli_connect_error());
}
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['password'])&&isset($_POST['password_confirm'])&&isset($_POST['email'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    if($password === $password_confirm){
        $pw_hash = password_hash($password, PASSWORD_BCRYPT);
        $sanitized_fname = mysqli_real_escape_string($db_link, $fname);
        $sanitized_lname = mysqli_real_escape_string($db_link, $lname);
        $sanitized_email = mysqli_real_escape_string($db_link, $email);
        $sanitized_phone = (int) $phone;
        $sanitized_pw_hash = mysqli_real_escape_string($db_link, $pw_hash);
        $sql = "INSERT INTO 'users' ('fname','lname','pw_hash','email','phone') VALUES ('$sanitized_fname','$sanitized_lname','$sanitized_pw_hash','$sanitized_email','$sanitized_phone')";
        if(mysqli_query($db_link, $sql)){
            $result = mysqli_query($db_link, "SELECT * FROM 'users' WHERE 'email' = '$sanitized_email' AND 'pw_hash' = '$sanitized_pw_hash'");
            $row = mysqli_fetch_array($result);
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
            if($row['phone'] > 0) {
                $_SESSION['phone'] = $row['phone'];
            }
            $_SESSION['uid'] = $row['uid'];
            $redirect = 'home.php';
            header('Location: '.$redirect);
        }
    }
    else{
        //passwords don't match
        die('The passwords don\'t match<br />');
    }
}
else{
    die('The form should be completely filled<br />');
}
?>