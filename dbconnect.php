<?php 
 session_start();
$server_name = 'localhost';
$user_name = 'root';
$user_psw = 'root';
$db_name = 'studentresult1';
$con = mysqli_connect($server_name,$user_name,$user_psw,$db_name) OR die('could not connect');
?>