<?php

$host_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "u790894234_help";

$db = mysql_connect($host_name,$user_name,$password);
if(!$db){
    die("Could not connect:".mysql_error());
}

mysql_select_db($db_name) or die(mysql_error());