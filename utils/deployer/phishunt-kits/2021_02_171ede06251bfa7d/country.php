<?php
if (!empty($_SERVER['HTTP_CLIENT_IP']))  
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER["REMOTE_ADDR"];
    }
$country = json_decode(file_get_contents("https://geoip-db.com/json/{$ip}"));
if(strlen($country->country_code)<1)
{
	$none=1;
}
else if (!in_array($country->country_code,$allowed_countries))
{
header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
session_destroy();
die("<h1>500 Internal Server Error</h1>");
}

?>