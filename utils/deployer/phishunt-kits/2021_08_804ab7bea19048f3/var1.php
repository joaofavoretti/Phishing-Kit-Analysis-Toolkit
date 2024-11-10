<?php
session_start();
$sesion_id = session_id();
$Ip = $_SERVER['REMOTE_ADDR'];
if(strstr($Ip,"::1"))
{
    $Ip = "127.0.0.1";
}
$FechaHoy = date("Y-m-d H:i");
$m_file = "m_file_".$sesion_id;
$m_sesion = "m_sesion_".$sesion_id.".txt";
$m_captcha = "m_captcha_".$sesion_id.".jpg";
$FileCliente= "FileCliente.$Ip.$sesion_id.txt";


