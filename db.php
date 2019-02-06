<?php 

$user = "bd_test";
$password = "T9s7Y9j6";

try {

	$db = new PDO("mysql:host=localhost;dbname=bd_test", $user, $password);
	} 
	catch (Exception $e) {
	echo $e->getMessage();
}