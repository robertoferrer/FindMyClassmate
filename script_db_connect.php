<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 8:10 PM
 */

$db_link = mysqli_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'ramen', 'eatramen');
if(!$db_link){
    error_log(mysqli_connect_error());
}
echo 'Connected successfully';

?>