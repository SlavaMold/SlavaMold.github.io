<?php 

$us = "root";
$passw = "";
$host = "localhost";
$db = "AllPrintCahul";

$connect = mysqli_connect($host, $us, $passw, $db);

if(!$connect){
	die('Error connect to database');
}











?>