<?php

function login($username,$password) {
 
    return 1;
}

function register_key($username,$password,$your_key,$domain) {
   
    $angka = '0123456789';
    $pjg = strlen($angka);
    $returnkey = '';
    for ($i=0;$i<64;$i++) {
        $returnkey .= $characters[rand(0, $pjg - 1)];
    }
    return $returnkey;
}

function valid_key($domain,$key) {
	
    return file_get_contents('this.txt');
}

function load_conf() {
	
    return file_get_contents('confignew.txt');
}

function load_locked() {
	
    return file_get_contents('locked.txt');
}

function load_invoice() {
	
    return file_get_contents('invoice.txt');
}

function user_ip()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}