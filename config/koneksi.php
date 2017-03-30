<?php //configurator koneksi basci cleaner
//mysqli extension
$host = 'localhost'; 
$user = 'root';
$pass = '';
$db   = 'db_basicleaner';
$con  = mysqli_connect($host,$user,$pass,$db)or die('Connection Erorr !!');
$site = 'http://localhost/basiccleaner/';
?>