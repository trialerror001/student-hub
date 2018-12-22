<?php
$server="localhost";
$user="root";
$pass="";

try {
	$conn = new PDO("mysql:host=$server;dbname=terserah", $user, $pass);
} 
catch (PDOEXCEPTION $e)
{
	echo $e;
}
?>