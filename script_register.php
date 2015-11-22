<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 3:33 PM
 */


$db_link = mysql_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'ramen');
if(!$db_link){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db(ramen);
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['password'])&&isset($_POST['password_confirm'])&&isset($_POST['email'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    if($password === $password_confirm){
        $pw_hash = password_hash($password, PASSWORD_BCRYPT);
        $sanitized_fname = mysql_real_escape_string($fname);
        $sanitized_lname = mysql_real_escape_string($lname);
        $sanitized_email = mysql_real_escape_string($email);
        $sanitized_phone = (int) $phone;
        $sanitized_pw_hash = mysql_real_escape_string($pw_hash);
        $sql = "INSERT INTO 'users' ('fname','lname','pw_hash','email','phone') VALUES ('$sanitized_fname','$sanitized_lname','$sanitized_pw_hash','$sanitized_email','$sanitized_phone')";
        if(mysql_query($sql)){
            $result = mysql_query("SELECT * FROM 'users' WHERE 'email' = '$sanitized_email' AND 'pw_hash' = '$sanitized_pw_hash'");
            $row = mysql_fetch_array($result);
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
    var_dump($_POST);
    die('The form should be completely filled<br />');
}
?>