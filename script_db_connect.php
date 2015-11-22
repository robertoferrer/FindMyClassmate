<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 11/21/15
 * Time: 8:10 PM
 */


$link = mysql_connect('findmyclassmatesnet.domaincommysql.com', 'ramen', 'eatramen');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_select_db('ramen');

?>