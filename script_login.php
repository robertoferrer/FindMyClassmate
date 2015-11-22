<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 5:19 PM
 */


$db_link = mysql_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'ramen');
if(!$db_link){
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_select_db(ramen);
if(isset($_POST['password'])&&isset($_POST['email'])){
    $password = $_POST['password'];
    $email = $_POST['email'];
    $pw_hash = password_hash($password, PASSWORD_BCRYPT);
    $sanitized_pw_hash = mysql_real_escape_string($pw_hash);
    $sanitized_email = mysql_real_escape_string($email);
    $sql = "INSERT INTO 'users' ('fname','lname','pw_hash','email','phone') VALUES ('$sanitized_fname','$sanitized_lname','$sanitized_pw_hash','$sanitized_email','$sanitized_phone')";
    if(mysql_query($sql)) {
        $result = mysql_query("SELECT * FROM 'users' WHERE 'email' = '$sanitized_email' AND 'pw_hash' = '$sanitized_pw_hash'");
        $row = mysql_fetch_array($result);
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