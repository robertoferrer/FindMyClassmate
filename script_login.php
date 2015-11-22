<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 5:19 PM
 */


session_start();
$db_link = mysqli_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'ramen', 'eatramen');
if(!$db_link){
    error_log(mysqli_connect_error());
}
if(isset($_POST['password'])&&isset($_POST['email'])){
    $password = $_POST['password'];
    $email = $_POST['email'];
    $pw_hash = password_hash($password, PASSWORD_BCRYPT);
    $sanitized_pw_hash = mysqli_real_escape_string($db_link, $pw_hash);
    $sanitized_email = mysqli_real_escape_string($db_link, $email);
    $sql = "INSERT INTO 'users' ('fname','lname','pw_hash','email','phone') VALUES ('$sanitized_fname','$sanitized_lname','$sanitized_pw_hash','$sanitized_email','$sanitized_phone')";
    if(mysqli_query($db_link, $sql)) {
        $result = mysqli_query($db_link, "SELECT * FROM 'users' WHERE 'email' = '$sanitized_email' AND 'pw_hash' = '$sanitized_pw_hash'");
        $row = mysqli_fetch_array($result);
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['email'] = $row['email'];
        if ($row['phone'] > 0) {
            $_SESSION['phone'] = $row['phone'];
        }
        $_SESSION['uid'] = $row['uid'];
        $redirect = 'home.php';
        header('Location: ' . $redirect);
    }
}
else {
    die('Your email and password are required to continue.<br />');
}
?>