<?php

$db['db_host']="localhost:3306";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="cms";

foreach($db as $key=> $value){
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Not connected : Ah sh*t... ' . mysqli_connect_error());;

 if ($connection){
     echo "<p style='color:white'>connected</p>";
 }else{
     echo $connection;
 }
?>