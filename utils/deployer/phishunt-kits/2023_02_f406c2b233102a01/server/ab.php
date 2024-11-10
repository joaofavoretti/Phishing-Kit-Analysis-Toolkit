<?php
include 'config.php';

if ($testmode == true) {
    $ip = '83.110.250.231';
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
}

$countryCode = @country($ip);
if($countryCode == 'it' || $countryCode == 'fr' || $countryCode == 'de' || $countryCode == 'brz' || $countryCode == 'aeu' || $countryCode == 'nrw') 
{ 

}
else
{
    die('HTTP/1.0 404 Not Found');
}

?>

