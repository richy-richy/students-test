<?php 

$user = "bd_test";
$password = "12";

try {

	$db = new PDO("mysql:host=localhost;dbname=bd_test", $user, $password);
	} 
	catch (Exception $e) {
	echo $e->getMessage();
}