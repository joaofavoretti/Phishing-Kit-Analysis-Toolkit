//-> v2.1.0
var msg_PANIncorrecto; 
var msg_TarCaducada;
var msg_FaltaTarjeta;
var msg_FaltaCodSeg;
var msg_FaltaCentroOrig;
var msg_FaltaTPVOrig;
var msg_FaltaFechaOrig;
var msg_FaltaNumOperOrig;
var text_BtnOK; 
var text_BtnCancel; 
var tex_tLocTemplate;
var msg_ErrorLenPAN;
var msg_ErrorLenCodSeg;
var msg_Continuar;
var msg_Cancelar;
var timeout_Alert = 5000;
var timeout_Modal = 15000;

var bMsgInit = false;

var idCtrlFocus;

//-> v3.1.19
/*
//window.history.forward();
function noBack() { 
    window.history.forward(); 
}
window.onbeforeunload = confirmExit;
function confirmExit() 
{
    return "";
}
*/
//<- v3.1.19

//->3.1.22 
// función para recalcular posición 
// y resituar las modales
function RecalOnResize() 
{
    var obj;
    var id;
    var objAlert;
    var objModal;
    var valorTop;
    // se inicializa objeto
    obj = null;
    // Ventana modal
    try
    {
        objModal = document.getElementById('dvConfirm');
        if( objModal!=null && GetStyleProperty('dvConfirm','display')=='block' )
        {
            obj = objModal;
            id = 'dvConfirm';
        }
	}
	catch(e1){
	}
    // Ventana confirmación
    try
    {
        if( id!='dvConfirm' )
        {
            objAlert = document.getElementById('dvAlert');
            if( objAlert!=null && GetStyleProperty('dvAlert','display')=='block' )
            {
                obj = objAlert;
                id = 'dvAlert';
            }
        }
	}
	catch(e2){
	}
    // Se recalcula posición
    try
    {
        // si el diálogo no estuviera visible
        // el objeto no se asigna y es nulo
        if( obj!=null )
        {
		    // se centra el div verticalmente antes de hacerlo visible
            SituarDialogo(id,obj);
	        // el tamaño del div que oculta los controles 
	        // también hay que redimensionarlo
	        DeshabilitarControles(true);
        }
	}
	catch(e1){
	}
}
// función que asigna comportamiento
// por defecto a eventos de ventana
function SetWindowEvents()
{
    try
    {
        // se recalcula la posición si hay scroll
        window.onscroll = RecalOnScroll;
	}
	catch(e){
	}
    try
    {
        // se recalcula la posición si hay redimensión
        window.onresize = RecalOnResize;
	}
	catch(e){
	}
}
// función de inicialización
SetWindowEvents();
//<-3.1.22

function SetVariablesJS()
{
    var t_espera;
    //alert('debug: SetVariablesJS: inicio...');
    if( !bMsgInit )
    {
        //-> v3.1.19: se cubren distintas formas de renderizar controles
        msg_PANIncorrecto = GetControlValue('AlertWrongPAN');
        msg_TarCaducada = GetControlValue('AlertTarCaducada');
        msg_FaltaTarjeta = GetControlValue('AlertFaltaTarjeta');
        msg_FaltaCodSeg = GetControlValue('AlertFaltaCodSeg');
        msg_FaltaCentroOrig = GetControlValue('AlertFaltaCentroOrig');
        msg_FaltaTPVOrig = GetControlValue('AlertFaltaTPVOrig');
        msg_FaltaFechaOrig = GetControlValue('AlertFaltaFechaOrig');
        msg_FaltaNumOperOrig = GetControlValue('AlertFaltaNumOperOrig');
        text_BtnOK = GetControlValue('CaptionBtnOK');
        text_BtnCancel = GetControlValue('CaptionBtnCancel');
        text_LocTemplate = GetControlValue('CaptionLocTemplate');
        msg_ErrorLenPAN = GetControlValue('AlertErrorLenPAN');
        msg_ErrorLenCodSeg = GetControlValue('AlertErrorLenCodSeg');
        msg_Continuar = GetControlValue('MsgContinuar');
        msg_Cancelar = GetControlValue('MsgCancelar');
        t_espera = GetControlValue('TimeoutAlert');
        timeout_Alert = Number(t_espera);
        t_espera = GetControlValue('TimeoutModal');
        timeout_Modal = Number(t_espera);
        //<- v3.1.19
        // mensajes asignados
        bMsgInit = true;
    }
    //alert('debug: SetVariablesJS: final...');
}

function showAlert( pMessage, ptxtBtnOK, ptxtBtnCANCEL, idCtrl )
{
	var obj;
	var Msgobj;
	var OKobj;
	var CANCELobj;
	var Auxobj;
	var sMessageTxt = pMessage;
	var sBtnOK = ptxtBtnOK;
	var sBtnCANCELTxt = ptxtBtnCANCEL;

	//alert('showAlert');

    // se mantine el id del control validado
	if( idCtrl!=null && idCtrl!='' )
	    idCtrlFocus = idCtrl;
	else
	    idCtrlFocus = null;

	OKobj = document.getElementById('ButtonAlertYES');
	if(OKobj!=null)
	{
		OKobj.value = sBtnOK;
	}

	try
	{
    	obj = document.getElementById('dvAlert');
	}catch(e){
        //return false so no post back occurs
        return false;
	}

	if ( obj != null )
	{
		Msgobj = document.getElementById('lblAlert');
		if ( Msgobj != null )
		{
			// label auxiliar: en principio se oculta
	        Auxobj = document.getElementById('dvAuxAlert');
	        if ( Auxobj != null )
	        {
	            Auxobj.style.display = 'none';
	        }

			try
			{
		        // se muestra mensaje
				Msgobj.innerHTML = sMessageTxt;
			}
			catch(e)
			{
                // algunos navegadores no soportan innerHTML
				// se oculta el label
				Msgobj.style.display = 'none';
				// método alternativo sin usar innerHTML
		        if ( Auxobj != null )
		        {
		            Auxobj.style.display = 'block';
			        addTextNode(Auxobj,sMessageTxt);
		        }
			}
		}

		try
		{
		    // se muestra el diálogo
		    obj.className = "vtw_show_dialog";
		    // se centra el div verticalmente antes de hacerlo visible
            SituarDialogo('dvAlert',obj);
		    // se deshabilitan los controles mientras se muestra mensaje
		    DeshabilitarControles(true);
		    // si timeout es 0: espera infinita
		    if( timeout_Alert>0 )
		    {
	            // oculta DIV en n milisegundos
	            var t=setTimeout("HideAlert('dvAlert')",timeout_Alert);
            }
		}
		catch(e)
		{
		    // se habilitan los controles 
		    DeshabilitarControles(false);
		}
	}

	return false;
}

function showDialogSend( idDIV, idLabel, idButtonOK, idButtonCancel, idAux )
{
    // fuerza enviar transacción al hacer PostBack
    //-> v3.1.19
    //document.getElementById('ctl00_SendTransaction').value = 'true';
    SetControlValue('SendTransaction', 'true');
    //<- v3.1.19
    // se recuperan los mensjes de los campos hidden
    SetVariablesJS();
    // se muestra "ventana" modal
    return showDialog( msg_Continuar, idDIV, idLabel, idButtonOK, idButtonCancel, idAux );
}

function showDialogCancel( idDIV, idLabel, idButtonOK, idButtonCancel, idAux )
{
    // fuerza cancelar transacción al hacer PostBack
    //-> v3.1.19
    //document.getElementById('ctl00_SendTransaction').value = 'false';
    SetControlValue('SendTransaction', 'false');
    //<- v3.1.19
    // se recuperan los mensjes de los campos hidden
    SetVariablesJS();
    // se muestra "ventana" modal
    return showDialog( msg_Cancelar, idDIV, idLabel, idButtonOK, idButtonCancel, idAux );
}

function showDialog( pMessage, idDIV, idLabel, idButtonOK, idButtonCancel, idAux )
{
	var obj;
	var Msgobj;
	var OKobj;
	var CANCELobj;
	var Auxobj;
	var sMessageTxt = pMessage;
	var sBtnOK = text_BtnOK;
	var sBtnCANCELTxt = text_BtnCancel;

    //alert('showDialog');

	OKobj = document.getElementById(idButtonOK);
	if(OKobj!=null)
	{
		OKobj.value = sBtnOK;
	}

	CANCELobj = document.getElementById(idButtonCancel);
	if(CANCELobj!=null)
	{
		CANCELobj.value = sBtnCANCELTxt;
	}

	try
	{
    	obj = document.getElementById(idDIV);
	}
	catch(e)
	{
        //return false so no post back occurs
        return false;
	}

	if ( obj != null )
	{
		Msgobj = document.getElementById(idLabel);
		if ( Msgobj != null )
		{
			// label auxiliar: en principio se oculta
	        Auxobj = document.getElementById(idAux);
	        if ( Auxobj != null )
	            Auxobj.style.display = 'none';

			try
			{
		        // se muestra mensaje
				Msgobj.innerHTML = sMessageTxt;
			}
			catch(e)
			{
                // algunos navegadores no soportan innerHTML
				// se oculta el label
				Msgobj.style.display = 'none';
				// método alternativo sin usar innerHTML
		        if ( Auxobj != null )
		        {
		            Auxobj.style.display = 'block';
			        addTextNode(Auxobj,sMessageTxt);
		        }
			}
		}

		try
		{
		    // se muestra el diálogo
		    obj.className = "vtw_show_dialog";
		    // se centra el div verticalmente antes de hacerlo visible
            SituarDialogo(idDIV,obj);
		    // se deshabilitan los controles mientras se muestra mensaje
		    DeshabilitarControles(true);
		    // si timeout es 0: espera infinita
		    if( timeout_Modal>0 )
		    {
	            // oculta DIV en n milisegundos
	            var t=setTimeout("HideAlert('" + idDIV + "')",timeout_Modal);
	        }
		}
		catch(e)
		{
		    // se habilitan los controles 
		    DeshabilitarControles(false);
		}
	}

	return false;
}

function addTextNode(objRef,sTxt)
{
    var children = objRef.childNodes;
    for(var i = 0; i < children.length; i++)
        objRef.removeChild(children[i]);

    var para = document.createElement('p');
    var newtext = document.createTextNode(sTxt);
    para.appendChild(newtext);
    objRef.appendChild(para);
}
// oculta alert / modal
function HideAlert(DivID)
{
    try
    {
        //Get object
        var obj = document.getElementById(DivID);
        if ( obj != null )
        {
            // se oculta el diálogo
            obj.className = "vtw_hide_dialog";
		    // se fuerza a ocultar el objeto: sacarlo de css
		    obj.style.display = 'none';
		    obj.style.zIndex = '-5';
        }
		// se habilitan los controles 
		DeshabilitarControles(false);

        if(DivID=='dvAlert')
        {
            // se pone el foco en el control
	        if( idCtrlFocus!=null && idCtrlFocus!='' )
	        {
	            obj = document.getElementById(idCtrlFocus);
	            if( obj!=null )
	            {
	                if(obj.type=='text')
	                {
    	                obj.value = '';
	                }
	                obj.focus();
	            }
	            idCtrlFocus = null;
            }
        }



        //return false so no post back occurs
        return false;
    }
    catch(e)
    {
		// se habilitan los controles
		DeshabilitarControles(false);
        //return false so no post back occurs
        return false;
    }
}

// OK en el botón del alert
function RecuperarFoco(DivID)
{
    var obj;

    try
    {
        // se oculta el alert
        HideAlert(DivID);

        return false;
    }
    catch(e)
    {
        //return false so no post back occurs
        return false;
    }
}
// CANCEL en el botón del modal
function NoPostBack(IdDIV)
{
    try
    {
        // oculta el div confirm/cancel
        HideAlert(IdDIV);

        // no se hace PostBack: se pone por defecto a false
        //-> v3.1.19
        //document.getElementById('ctl00_SendTransaction').value = 'false';
        SetControlValue('SendTransaction', 'false');
        //<- v3.1.19
        // return false so no post back occurs
        return false;
    }
    catch(e)
    {
        //alert('NoPostBack:no exception!!');
        // return false so no post back occurs
        return false;
    }
    return false;
}
// OK en el botón del modal
function EnviarFormulario(IdDIV)
{
    var objForm;
    //alert('EnviarFormulario()');
    // oculta el div confirm/cancel
    HideAlert(IdDIV);
	// se deshabilitan los controles
	DeshabilitarControles(true);
	try{
	    // se recupera formulario
	    objForm = document.getElementById('aspnetForm');
	    if( objForm!=null )
	    {
	        objForm.submit();
	    }
        // para hacer submit del formulario
        return true;
	}
    catch(e)
    {
        //alert('debug:EnviarFormulario(): exception catched:'+e.message);
        return true;
    }
}

function DeshabilitarControles(estado)
{
    var i;
    var obj, doc;
    var alto, maxDocHeight;

    alto = 0;
    maxDocHeight = 0;
	try{
	    // máxima altura del documento
	    maxDocHeight = getMaxDocHeight();
	    //->v3.1.22b: se usa como referencia la vista
	    // the width of the screen (excluding the Windows Taskbar)
	    //alto = screen.availHeight;
        alto = getViewHeight();
        //<-v3.1.22b
	    // puede ser el alto de la pantalla menor que el documento
	    if( alto < maxDocHeight )
	        alto = maxDocHeight;
	}
    catch(e)
    {
        alto = 0;
    }

    try
    {
        obj = document.getElementById('dvDisableScreen');
        if( obj!=null )
        {
            doc = document.getElementById('DocumentBody');
            // habilitar / deshabilitar elementos de la página
            if( estado==false )
            {
                obj.style.display='none';
                // restaura scroll-bar
                if(doc!=null)
                {
                    //v3.1.18: se fuerza ocultar por programación
                    //doc.className='scrollbarauto';
                    try{doc.style.overflow='auto';}catch(e){}
                }
            }
            //v3.1.22b: sólo se muestra si se ha podido calcular el tamaño
            //else
            else if( alto>0 )
            {
                // si se calculó la altura máxima
                obj.style.height=alto+"px";
                //-> v3.1.18
                // se fuerza estilo por progamación
                obj.style.position='absolute';
                obj.style.top='0px';
                obj.style.left='0px';
                obj.style.width='100%';
                obj.style.backgroundColor='#333333';
                var bOpacity;
                try{
                    // For IE9, Firefox, Chrome, Opera, and Safari
                    //opacity:0.7;
                    obj.style.opacity=0.7;
                    bOpacity=true;
                }
                catch(e1){
                    bOpacity=false;
                }
                if(bOpacity=false)
                {
                    try{
                        // For IE8 and earlier
                        //filter: alpha(opacity=70);
                        obj.style.filters.alpha.opacity=70;
                    }
                    catch(e2){
                    }
                }
                obj.style.zIndex='+4';
                //<- v3.1.18

                obj.style.display='block';
                // oculta scroll-bar
                if(doc!=null)
                {
                    //v3.1.18: se fuerza ocultar por programación
                    //doc.className='scrollbarhidden';
                    try{doc.style.overflow='hidden';}catch(e){}
                }
            }
        }
        // se cambia el estado de los botones
        DeshabilitarBotones(estado);

    }
    catch(e)
    {
        return false;
    }

    return true;
}

function getMaxDocHeight() 
{
    var D = document;
    var resultado;
    // v3.1.22b: se controlan las excepciones por cada una de las propiedades
    /*
    try
    {
        //-> v3.1.18
        //resultado = Math.max(
        //    Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        //    Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        //    Math.max(D.body.clientHeight, D.documentElement.clientHeight),
        //    Math.max(window.innerHeight, window.outerHeight)
        //    );
        //for IE, documentElement works for standard mode, while the body works for the quirk mode
        resultado = Math.max(
            Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
            Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
            Math.max(D.body.clientHeight, D.documentElement.clientHeight)
            );
        //<- v3.1.18
    }
    catch(e)
    {
        //alert('debug:getDocHeight(): exception throwed!!');
        resultado = 0;
    }
    */
    var h1=0,h2=0,aux=0;
    resultado = 0;
    // scrollHeight: Returns the total height of an element's contents, in pixels. 
    // The value contains the height with the padding, but does not include 
    // the scrollBar, border, and the margin.
    try{ h1=D.body.scrollHeight; }catch(e){ h1=0; }
    //for IE, documentElement works for standard mode, while the body works for the quirk mode
    try{ h2=D.documentElement.scrollHeight; }catch(e){ h2=0; }
    // se elige el valor más alto
    resultado = Math.max(h1, h2);
    aux = resultado;
    // offsetHeight: Returns the height of the visible area for an object, in pixels. 
    // The value contains the height with the padding, scrollBar, and the border, 
    // but does not include the margin.
    try{ h1=D.body.offsetHeight; }catch(e){ h1=0; }
    //for IE, documentElement works for standard mode, while the body works for the quirk mode
    try{ h2=D.documentElement.offsetHeight; }catch(e){ h2=0; }
    // se elige el valor más alto
    resultado = Math.max(aux, h1, h2);
    aux = resultado;
    // clientHeight: Returns the height of the visible area for an object, in pixels. 
    // The value contains the height with the padding, but it does not include 
    // the scrollBar, border, and the margin.
    try{ h1=D.body.clientHeight; }catch(e){ h1=0; }
    //for IE, documentElement works for standard mode, while the body works for the quirk mode
    try{ h2=D.documentElement.clientHeight; }catch(e){ h2=0; }
    // se elige el valor más alto
    resultado = Math.max(aux, h1, h2);
    //<- v3.1.22b
    return resultado;
}

function getViewHeight() 
{
    var D = document;
    var resultado;
    //-> v3.1.18
    /*try
    {
        // clientHeight: Returns the viewable height of the content on a page (not including 
        // borders, margins, or scrollbars)
        // offsetHeight: Returns the height of an element, including borders and padding if any,
        // but not margins
        //resultado = Math.max(
        //    Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        //    Math.max(D.body.clientHeight, D.documentElement.clientHeight)
        //    );
        // body vs. documentElement: permite soportar diversos navegadores
        // se escoge el valor más grande (normalmente, el que es distinto de 0)
        //resultado = Math.max(D.body.offsetHeight, D.documentElement.offsetHeight);
        resultado = Math.max(D.body.clientHeight, D.documentElement.clientHeight);
    }
    catch(e)
    {
        //alert('debug:getViewHeight(): exception throwed!!');
        resultado = 0;
    }*/
    try
    {
        // No funciona para IE
        resultado = window.innerHeight;
        if( resultado==undefined )resultado = 0;
    }
    catch(e)
    {
        resultado = 0;
    }
    if( resultado <= 0 )
    {
        try
        {
            resultado = D.documentElement.clientHeight;
        }
        catch(e)
        {
            resultado = 0;
        }
    }
    //<- v3.1.18
    return resultado;
}

function getScrollFromTop()
{
    var D = document;
    var resultado;
    //-> v3.1.22b: se controlan las excepciones por cada una de las propiedades
    /*
    try
    {
        resultado = Math.max(window.pageYOffset,D.body.scrollTop);
    }
    catch(e)
    {
        //alert('debug:getScrollFromTop(): exception throwed!!');
        resultado = 0;
    }
    */
    var h1=0,h3=0,h2=0;
    resultado = 0;
    // pageYOffset: Retrieves the number of pixels by which the contents
    // of the document are scrolled upward.
    try{ h1=window.pageYOffset; }catch(e){ h1=0; }
    // scrollTop: retrieves the number of pixels by which the contents 
    // of an object are scrolled upward.
    try{ h3=D.documentElement.scrollTop; }catch(e){ h3=0; }
    try{ h2=D.body.scrollTop; }catch(e){ h2=0; }
    // se elige el valor más alto
    resultado = Math.max(h1, h3, h2);
    //<- v3.1.22b
    return resultado;
}

function getObjHeight(idObj)
{
    var obj;
    var resultado;
    var zSave;
    resultado = 0;
    try
    {
        obj = document.getElementById(idObj);
        if( obj!=null )
        {
            zSave = obj.style.zIndex;
            // visible pero en plano oculto: para obtener la altura
	        obj.style.zIndex = '-15';
	        obj.style.display = 'block';
            resultado = obj.offsetHeight;
            // se oculta de nuevo
	        obj.style.display = 'none';
	        obj.style.zIndex = zSave;
	    }
    }
    catch(e)
    {
        //alert('debug:getObjHeight(): exception throwed!!');
        resultado = 0;
    }
    return resultado;
}
//-> v3.1.22b: se distingue posicionamiento fijo/absoluto
//function calcularTop(idObj)
function calcularTop(idObj, posFix)
//<- v3.1.22b
{
    var resultado, valor, totalview, addscroll, addheight, max;
    totalview = getViewHeight();
    if( totalview>0 ){
        // se sitúa en mitad de la vista
        valor = totalview/2;
        // v3.1.22b: si position:fixed, no se añade scroll
        // se desplaza el elemento sobre el top de la vista
        //alert('debug: calcular Top(0):posFix=<'+posFix+'>');
        if(posFix!=true)
        {
            // se comprueba si se ha scrolleado
            addscroll = getScrollFromTop();
            if( addscroll>0 )
            {
                // se añade desplazamiento con scroll desde el top
                valor = valor + addscroll;
            }
        }

        // se obtiene altura del objeto a mostrar
        addheight = getObjHeight(idObj);
        // cálculo para posición en pixels
        // se desplaza el objeto hacia arriba en la mitad de su altura
        if( addheight>0 )
        {
            valor = valor - (addheight/2);
        }
        resultado = valor;
        /* v3.1.22b: innecesario
        // para impedir que se vaya de la pantalla
        max = getMaxDocHeight();
        if( resultado > max )
        {
            resultado = max-(totalview*0.25);
        }
        */
        /*
        // cálculo para posición porcentual (NO SE USA)
        var diff = totalview - addheight;
        valor = ((diff*100)/totalview)/2;
        var rest = ((diff*100)/totalview)%2;
        // si hay parte decimal
        if(rest>0)
        {
            try
            {
                // Utilizar directamente round da una excepción
                // Se trunca a dos decimales y se redondea a un entero
                var entero = Math.round(Number(valor.toFixed(2)));
                valor = entero;
            }catch(e){
            }
        }
        resultado = valor;
        */
    }
    else
        resultado = 0;
    //alert('debug:calcular Top(2):resultado='+resultado+'+totalview='+totalview+'+addscroll='+addscroll+
    //    '+addheight='+addheight);
    return resultado;
}

function DeshabilitarBotones(estado)
{
    var objButton1;
    var objButton2;
    var objButton3;
    var objButton4;

    // 1.- CAMBIAR ESTADO DE LOS BOTONES
    //-> v3.1.19
    //objButton1 = document.getElementById('ctl00_ButtonEnviar');
    objButton1 = GetControlObj('ButtonEnviar');
    //<- v3.1.19
    if(objButton1!=null)
    {
        if(objButton1.disabled != estado)objButton1.disabled = estado;
    }
    //-> v3.1.19
    //objButton2 = document.getElementById('ctl00_ButtonCancelar');
    objButton2 = GetControlObj('ButtonCancelar');
    //<- v3.1.19
    if(objButton2!=null)
    {
        if(objButton2.disabled != estado)objButton2.disabled = estado;
    }
    //-> v3.1.19
    //objButton3 = document.getElementById('ctl00_ButtonEnviar1');
    objButton3 = GetControlObj('ButtonEnviar1');
    //<- v3.1.19
    if(objButton3!=null)
    {
        if(objButton3.disabled != estado)objButton3.disabled = estado;
    }
    //-> v3.1.19
    //objButton4 = document.getElementById('ctl00_ButtonCancelar1');
    objButton4 = GetControlObj('ButtonCancelar1');
    //<- v3.1.19
    if(objButton4!=null)
    {
        if(objButton4.disabled != estado)objButton4.disabled = estado;
    }
}

function WaitUntil(millisegundos) 
{
    var inicio = new Date().getTime();
    //alert('WaitUntil:millisegundos:' + millisegundos);
    while ((new Date().getTime() - inicio) < millisegundos){}
}

function checkInputNumerico(event)
{
    // se acotan los numéricos y se permiten las teclas de función
    if( (event.charCode > 31 && event.charCode < 48) || event.charCode > 57 )
    {
        // se evita la acción
        event.preventDefault();
    }
}

// copyright 1999 Idocs, Inc. http://www.idocs.com
// Distribute this script freely but keep this notice in place
function numbersonly_OLD(myfield, e, dec)
{
    var key;
    var keychar;

    if (window.event)
    {
        key = window.event.keyCode;
        alert('numbersonly_old:window.event.keyCode:'+key);
    }
    else if (e)
    {
        key = e.which;
        alert('numbersonly_old:e.which:'+key);
    }
    else
    {
        alert('numbersonly_old:keychar:return true');
        return true;
    }

    keychar = String.fromCharCode(key);

    alert('numbersonly_old:keychar:'+keychar);

    // control keys
    if ((key==null) || (key==0) || (key==8) || 
        (key==9) || (key==13) || (key==27) )
    {
        alert('numbersonly_old:control key:'+key);
        return true;
    }

    // numbers
    else if ((("0123456789").indexOf(keychar) > -1))
    {
        alert('numbersonly_old:number');
        return true;
    }
    // decimal point jump
    else if (dec && (keychar == "."))
    {
        myfield.form.elements[dec].focus();
        return false;
    }
    else
    {
        return false;
    }
}

function numbersonly(myfield, e, dec)
{
    var key;
    var keychar;
    var keywich;

    if (!e) var e = window.event;

    key = e.keyCode;
    keywich = e.which;
    if( !key )
        key = keywich;
    
    keychar = String.fromCharCode(key);

    // numbers
    if ((("0123456789").indexOf(keychar) > -1))
	{
        return true;
    }
    // decimal point jump
    else if (dec && (keychar == "."))
	{
        myfield.form.elements[dec].focus();
        return false;
    }
    // último intento: por si es tecla de control
    else if ((keywich==null) || (keywich==0) || (keywich==8) || 
            (keywich==9) || (keywich==13) || (keywich==27) )
    {
        return true;
    }

    return false;
}
//<- v2.1.0

function showAlert_OLD( pMessage, ptxtBtnOK, ptxtBtnCANCEL, ptxtLocTemplate ){
	var sMessage = pMessage;
	var sBtnOK = ptxtBtnOK;
	var sBtnCANCEL = ptxtBtnCANCEL;
	var sLocTemplate = ptxtLocTemplate;
	var params = new Array(sMessage, sBtnOK, sBtnCANCEL, sLocTemplate);
	
	var retAlert;
	var WinSettings;
	var v_height;
	var v_width;
	
	var screen_center_x;
	var screen_center_y;
	var dialog_top;
	var dialog_left;
	var valRetorno;
	
	v_height = 120;
	v_width = 200 + (sMessage.length*5);

	screen_center_x = (screen.width / 2);
	screen_center_y = (screen.height / 2);
	
	// alert( "centro: (" + screen_center_x.toString() + "," + screen_center_y.toString() + ")");
    
    dialog_top = (screen_center_y - (v_height / 2));
    dialog_left = (screen_center_x - (v_width / 2));

	// WinSettings = "title:no;status:no;resizable:no;center:yes;dialogHeight:" + v_height.toString() +  "px;dialogWidth:" + v_width.toString() + "px";
	WinSettings = "title:no;status:no;resizable:no;dialogHeight:" + v_height.toString() +  "px;dialogWidth:" + v_width.toString() + "px;dialogLeft:" + dialog_left.toString() + "px;dialogTop:" + dialog_top.toString() + "px";

    // [12/04/2012]: hay que capturar posible excepción
	//retAlert = window.showModalDialog("./alert.html", params, WinSettings);
	//return (retAlert==1);
    try {
        retAlert = window.showModalDialog("./alert.html", params, WinSettings);
        if (retAlert== null || typeof(retAlert)=='undefined') 
    {
            valRetorno=false;
        }else{
	        if (retAlert==1)
	        {
	            valRetorno=true;
	        } else {
	            valRetorno=false;
	    }
    }
    } catch(exception) {
        valRetorno=false;
    }

    return valRetorno;
} 

function RellenarCeros( cadena, longitud )
{
    var res;
    
    if ( cadena=='' || cadena==null )
        return '';
    
    if ( longitud > cadena.length )
    {
        res = '' + cadena;
        while ( res.length < longitud )
            res = '0' + res;
    }
    else
        res = cadena;
        
    return res;
} 

function validarFecha(dia, mes, anio) 
{ 
    var elMes = parseInt(mes); 

    if(elMes>12) 
        return false; 
    // MES FEBRERO 
    if(elMes == 2)
    { 
        if(esBisiesto(anio))
        { 
            if(parseInt(dia) > 29)
            { 
                return false; 
            } 
            else 
                return true; 
        } 
        else
        { 
            if(parseInt(dia) > 28){ 
                return false; 
            } 
            else 
                return true; 
        } 
    } 
    
    //RESTO DE MESES 
    if(elMes== 4 || elMes==6 || elMes==9 || elMes==11)
    { 
        if(parseInt(dia) > 30)
        { 
            return false; 
        } 
    } 
    return true; 
} 

function esBisiesto(anio) 
{ 
    var BISIESTO; 
    if(parseInt(anio)%4==0)
    { 
        if(parseInt(anio)%100==0)
        { 
            if(parseInt(anio)%400==0)
            { 
                BISIESTO=true; 
            } 
            else
            { 
                BISIESTO=false; 
            } 
        } 
        else
        { 
            BISIESTO=true; 
        } 
    } 
    else 
        BISIESTO=false; 

    return BISIESTO; 
} 

function IsNumeric(sText)
{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;
 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
      {
         IsNumber = false;
      }
   }
   return IsNumber;
}

function ValidarPAN(textBoxRef, textBoxVal, msgPANIncorrecto, textBtnOK, txtLocTemplate )
{
    // Calcula el dígito de control de la cadena en la longitud especificada
	
    var i;//int
    var acum;//int
    var multiplicador;//int
    var cRet;//char
    var cAux;//char
    var szAbaco=new String();//[512]
    var szInter=new Array();//[32]
    
    var num;
    var hexStr;
    
    var cadena;
    var longitud;
    
    //alert('ejecutando: ValidarPAN');
    //alert('ValidarPAN: textBoxRef = ' + textBoxRef);
    //alert('ValidarPAN: textBoxVal = ' + textBoxVal);
    
    cadena = textBoxVal;
    longitud = cadena.length - 1;

    //alert('ValidarPAN: cadena = ' + cadena + ' y longitud = ' + longitud);

    cAux = cadena.charAt(longitud);

    multiplicador=2;
    
    hexStr='0F';
    num = parseInt(hexStr,16); 
    
    //alert('ValidarPAN: num = ' + num);

    for (i=(longitud-1); i>=0; i--)	
    {
        // Se acumula en el string szAbaco los digitos por separado
        szInter = "";
        var num1 = parseInt(cadena.charAt(i),10);
        szInter = (num1 & num) * multiplicador;
        szAbaco = szAbaco + szInter;
        
        //alert('ValidarPAN: cadena[i] = ' + cadena.charAt(i) + ' y cadena[i]&0x0F = ' + (num1 & num) );
        //alert('ValidarPAN: szInter = ' + szInter + ' y szAbaco = ' + szAbaco);
        
        // Switch 
        if (multiplicador==1) 
        {
            multiplicador=2;
        }
        else 
        {
            multiplicador=1;
        }
    }

    // En acum se suman todos los digitos 
    acum=0;
    for (i=0; i<szAbaco.length; i++)
    {
        var num2 = parseInt(szAbaco.charAt(i),10);
        acum = acum + (num2 & num);
        //alert('ValidarPAN: acum = ' + acum + ' y (num2 & num) = ' + (num2 & num) );
    }
	
    //alert('ValidarPAN: acum = ' + acum);

    if ( (acum%10)==0 ) 
    {
        cRet='0';
    }
    else 
    {
        //alert('ValidarPAN: (10-(acum%10)) = ' + (10-(acum%10)) );
        //cRet=(char)((10-(acum%10))+'0');
        cRet= (10-(acum%10));
    }

    //alert('ValidarPAN: cRet = ' + cRet + ' y cAux = ' + cAux);

    if( cRet == cAux )
    {
        return true;
    }
    else //when the validation fails and the page will not submit
    {
        //alert( 'ValidarPAN' );

        // [APL:22.10.2010] alert('Error: ¡PAN Incorrecto! Vuelva a teclear nº de tarjeta.');
        // se recupera foco del control al ocultarse el alert 
        showAlert( msgPANIncorrecto, textBtnOK, "", textBoxRef );
        // alert( msgPANIncorrecto );

        return false;
    }
}

function ValidarFechaCaducidad( sMes, sAno, 
                                msgTarCaducada, textBtnOK, txtLocTemplate )
{
    var hoy = new Date();

    var ano = Number(sAno);
    var ano_sys = Number(hoy.getFullYear());

    if(ano < ano_sys)
    {
        // [APL:22.10.2010] alert('Tarjeta caducada');
        // alert( msgTarCaducada );
        showAlert( msgTarCaducada, textBtnOK, "", txtLocTemplate );
        return false;
    }

    var mes = Number(sMes);
    var mes_sys = Number(hoy.getMonth());

    if(ano == ano_sys)
    {
        var diff = mes - mes_sys;
        //alert( 'diff es ' + diff );
        //getMonth devuelve mes de 0 a 11: la diferencia tendrá que ser >= 1
        if( diff < 1 )
    {
        // [APL:22.10.2010] alert('Tarjeta caducada');
        // alert( msgTarCaducada );
        showAlert( msgTarCaducada, textBtnOK, "", txtLocTemplate );
        
        return false;
    }
    }
    return true;
}


function ValidarCentroOriginal( sValor, idCentroOri )
{
    var res;
    var longitud;
    
    if( sValor==null || sValor=='' )
        return false;
    
    longitud = sValor.length;
    if ( longitud > 4 )
        return false;
        
    if ( IsNumeric(sValor) == false )
        return false;
        
    if ( longitud < 4 )
    {
        res = RellenarCeros( sValor, 4 );
        
        document.getElementById(idCentroOri).value = res;
    }        
    
    return true;
}


function ValidarTPVOriginal( sValor, idTPVOri )
{
    var res;
    var longitud;

    if( sValor==null || sValor=='' )
        return false;

    longitud = sValor.length;
    if ( longitud > 4 )
        return false;

    if ( IsNumeric(sValor) == false )
        return false;
        
    if ( longitud < 4 )
    {
        res = RellenarCeros( sValor, 4 );
        
        document.getElementById(idTPVOri).value = res;
    }        
    
    return true;
}

function fechaActual()
{
    var dia;
    var mes;
    var anno;
    
    var f = new Date();
    
    dia = f.getDate().toString();
    mes = (f.getMonth() + 1).toString();
    anno = f.getFullYear().toString();
    
    if (dia.length == 1)
        dia = '0' + dia;
    if (mes.length == 1)
        mes = '0' + mes;
        
    // alert('dia:<' + dia + '> mes:<' + mes + '> anno:<' + anno + '>');
        
    return (dia + mes + anno);
}

// las 2 fechas tienen que estar en formato ddmmaaaa
// si sFecha1 > sFecha2 --> 1
// si sFecha1 = sFecha2 --> 0
// si sFecha1 < sFecha2 --> -1
function compararFechas(sFecha1, sFecha2)
{
    var sAuxF1;
    var sAuxF2;
    var l_fecha;
    var i;
    var ch1;
    var ch2;
    
    
    sAuxF1 = sFecha1.substr(4,4)+sFecha1.substr(2,2)+sFecha1.substr(0,2);
    sAuxF2 = sFecha2.substr(4,4)+sFecha2.substr(2,2)+sFecha2.substr(0,2);
    
    // alert('sAuxF1<' + sAuxF1 + '> sAuxF2<' + sAuxF2 + '>');
    
    l_fecha = sAuxF1.length;
    for(i=0;i<l_fecha;i++){
        ch1 = sAuxF1.charAt(i);
        ch2 = sAuxF2.charAt(i);
        if ( ch1 < ch2 )
            return -1;
        if ( ch1 > ch2 )
            return 1;
    }
    
    return 0;
}

function ValidarFechaOriginal( sValor )
{
   var longitud;
   var anno;
   var mes;
   var dia;
   var sFechaActual;
   
   if( sValor==null || sValor=='' )
        return false;
        
    longitud = sValor.length;
    if ( longitud != 8 )
        return false;

    if ( IsNumeric(sValor) == false )
        return false;
    
    // Validación de la fecha
    anno = sValor.substr(4,4);
    mes = sValor.substr(2,2);
    dia = sValor.substr(0,2);
    
    // alert('anno:<' + anno + '> mes:<' + mes + '> dia:<' + dia + '>');
    
    if (validarFecha(dia, mes, anno) == false)
        return false;
        
    sFechaActual = fechaActual();
    
    // alert('Fecha actual: <' + sFechaActual + '>');
    
    // si sValor > sFechaActual --> fecha incorrecta
    if ( compararFechas(sValor, sFechaActual) == 1 )
        return false;
        
    return true;
}

function ValidarNumOperOri( sValor, idNumOperOri )
{
    var res;
    var longitud;

    if( sValor==null || sValor=='' )
        return false;

    if ( IsNumeric(sValor) == false )
        return false;
    
    longitud = sValor.length;
    if ( longitud > 6 )
        return false;
        
    if ( longitud < 6 )
    {
        res = RellenarCeros( sValor, 6 );
        
        document.getElementById(idNumOperOri).value = res;
    }        

    return true;
}

function ValidarCodAutoriz( sValor )
{
    var longitud;

    if( sValor==null || sValor=='' )
        return false;

    longitud = sValor.length;
    if ( longitud > 20 )
        return false;
    
    return true;
}

function CentroOri_OnLostFocus(idCtrl){
    var valor = document.getElementById(idCtrl).value;

    document.getElementById(idCtrl).value = RellenarCeros(valor, 4);
    return true;
}

function TPVOri_OnLostFocus(idCtrl){
    var valor = document.getElementById(idCtrl).value;
    
    document.getElementById(idCtrl).value = RellenarCeros(valor, 4);
    return true;
}

function FechaOri_OnLostFocus(idCtrl){
/*
    var valor = document.getElementById(idCtrl).value;
    
    document.getElementById(idCtrl).value = RellenarCeros(valor, 4);
    return true;
*/
}

function IdOperOri_OnLostFocus(idCtrl){
    var valor = document.getElementById(idCtrl).value;
    
    document.getElementById(idCtrl).value = RellenarCeros(valor, 6);
    return true;
}

function ValidarFormulario(tipoXtn, idNumTrj, idFeccad1, idFeccad2, idCodSeg,
    idCentroOri, idTPVOri, idFechaOri, idNumOperOri,
    flgValLuhn, flgValFeccad, flgCVV_Mode  )
{
    var valor;

    //alert('debug: ValidarFormulario: inicio:...');

    // se recuperan los mensjes de los campos hidden
    SetVariablesJS();

    //alert('debug: tipoXtn: ' + tipoXtn );

    switch(tipoXtn)
    {
        case 'V':
        case 'D':
        // v3.1.27: validaciones también para Preautorización
        case 'P':
            valor = document.getElementById(idNumTrj).value;
            if(valor==null || valor=='')
            {
                // [APL:22.10.2010] alert('Falta dato obligatorio. No se introdujo PAN de la tarjeta');
                // se recupera foco del control al ocultarse el alert 
                showAlert( msg_FaltaTarjeta, text_BtnOK, "", idNumTrj );
                return false;
            }

            //se eliminan posibles blancos
            while( valor.indexOf(" ", 0) > -1 ){
                valor = valor.replace(" ", "");
            }

            //-> v2.1.0
            if( valor.length < 14 )
            {
                // 'Error longitud PAN de la tarjeta'
                // se recupera foco del control al ocultarse el alert 
                showAlert( msg_ErrorLenPAN, text_BtnOK, "", idNumTrj );
                return false;
            }
            //<- v2.1.0

            if( flgValLuhn==true )
            {
                if(!ValidarPAN(idNumTrj, valor, msg_PANIncorrecto, text_BtnOK, tex_tLocTemplate))
                    return false;
            }
            
            if( flgValFeccad==true )
            {
                if(!ValidarFechaCaducidad(document.getElementById(idFeccad1).value, 
                    document.getElementById(idFeccad2).value, msg_TarCaducada, text_BtnOK, tex_tLocTemplate))
                    return false;
            }

            //alert('debug: flgCVV_Mode: ' + flgCVV_Mode );

            // v3.1.27: validaciones también para Preautorización
            if( (tipoXtn=='V'||tipoXtn=='P') && flgCVV_Mode!='0' )
            {
               valor = document.getElementById(idCodSeg).value;

               //alert('debug: CodSeguridad: ' + valor );

                // v3.1.16: si es obligatorio, se comprueba que se envíe
                if(flgCVV_Mode=='1')
                {
                    if(valor==null || valor=='')
                    {
                        // [APL:22.10.2010] alert('Falta dato obligatorio. No se introdujo código de seguridad');
                        // alert( msg_FaltaCodSeg );
                        // se recupera foco del control al ocultarse el alert 
                        showAlert( msg_FaltaCodSeg, text_BtnOK, "", idCodSeg );
                        return false;
                    }
                }
                // si se ha introducido, se valida
                if(valor!=null && valor!='')
                {
                    //-> v2.1.0
                    if( valor.length < 3 )
                    {
                        // 'Error longitud código de seguridad'
                        // se recupera foco del control al ocultarse el alert 
                        showAlert( msg_ErrorLenCodSeg, text_BtnOK, "", idCodSeg );
                        return false;
                    }
                    //<- v2.1.0

                    //se eliminan posibles blancos
                    while( valor.indexOf(" ", 0) > -1 )
                    {
                        valor = valor.replace(" ", "");
                    }
                }
            }
        break;
        case 'R':
        case 'A':
            valor = document.getElementById(idCentroOri).value; 
            if ( ValidarCentroOriginal(valor, idCentroOri) == false )
            {
                // se recupera foco del control al ocultarse el alert 
                showAlert( msg_FaltaCentroOrig, text_BtnOK, "", idCentroOri );
                return false;
            }
            valor = document.getElementById(idTPVOri).value;    
            if( ValidarTPVOriginal(valor, idTPVOri) == false )
            {
                // se recupera foco del control al ocultarse el alert 
                showAlert( msg_FaltaTPVOrig, text_BtnOK, "", idTPVOri );
                return false;
            }
            valor = document.getElementById(idFechaOri).value;    
            if( ValidarFechaOriginal(valor) == false )
            {
                // se recupera foco del control al ocultarse el alert 
                showAlert( msg_FaltaFechaOrig, text_BtnOK, "", idFechaOri );
                return false;
            }
            valor = document.getElementById(idNumOperOri).value;    
            if( ValidarNumOperOri(valor, idNumOperOri) == false )
            {
                // se recupera foco del control al ocultarse el alert 
                showAlert( msg_FaltaNumOperOrig, text_BtnOK, "", idNumOperOri );
                return false;
            }
        break;
    }

    //-> v2.1.0
    // fuerza enviar transacción al hacer PostBack
    //-> v3.1.19
    //document.getElementById('ctl00_SendTransaction').value = 'true';
    SetControlValue('SendTransaction', 'true');
    //<- v3.1.19
    //<- v2.1.0

    return true;
}

function enviar() {
    //var user,ticket,ack,mac;
    alert('ejecutando enviar');
    
    var textBoxes = document.getElementsByTagName("input");

    for (i=0; i< textBoxes.length; i++)
    {
        //if (textBoxes[i].type == 'text')
        //{
            alert('enviar: '+textBoxes[i].id+'/'+textBoxes[i].type);
        //}
    }

    //alert('enviar: '+user+'/'+ticket+'/'+ack+'/'+mac);
}

/// Mostrar / ocultar imagen usando un div ///
var panel;
function showDiv(nombre) {
    //alert('showDiv ----> ('+ nombre + ')');
    panel = nombre;
    setTimeout('mostrar()', 1000); // retardo 

	//para que no haga submit
	return false;
}

function mostrar() { 
    //alert('mostrar ----> (' + panel + ')');
    referencia(panel).visibility = 'visible';
    setTimeout('ocultar()', 5000); // 5 seg. antes de cerrarse 
}

function ocultar(){
    //alert('ocultar ----> (' + panel + ')');
    referencia(panel).visibility = 'hidden';
}

function referencia(name) {
  //alert('referencia ----> (' + name + ')');
  return eval('document.all.' + name + '.style');
}
/*
/// Mostrar / ocultar imagen usando una nueva ventana ///
function popupWin() { 
    text = "<html>\n<head>\n<title></title>\n<body onblur=\"self.close()\">\n"; 
    text += "<center>\n<br>"; 
    text += "<img src=\"C:/Inetpub/wwwroot/CF1/VisualPluginWeb/images/img_cod_seguridad.gif\" alt=\"\" id=\"img_cvv2\" visible=\"false\" />"; 
    text += "</center>\n</body>\n</html>\n"; 
    setTimeout('windowProp(text)', 1000); // retardo 

	//para que no haga submit
	return false;
} 

function windowProp(text) { 
    newWindow = window.open('','newWin','width=400,height=400,toolbar=no,location=no,directories=no,\
        status=no,menubar=no,scrollbars=no,resizable=no'); 
    newWindow.document.write(text); 
    setTimeout('closeWin(newWindow)', 5000); // 5 seg. antes de cerrarse 
} 

function closeWin(newWindow) { 
    newWindow.close(); // cerramos la ventana 
} 
*/

/// Mostrar / ocultar imagen usando una nueva ventana ///
function popImage_OLD(imageURL, imageTitle)
{
    PositionX = 100;
    PositionY = 100;
    defaultWidth = 500;
    defaultHeight = 500;
    var AutoClose = true;

    var isNN;
    var isIE;

    if (parseInt(navigator.appVersion.charAt(0))>=4)
    {
        isNN=(navigator.appName=="Netscape")?1:0;
        isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;
    }
    var optNN='scrollbars=yes,width='+defaultWidth+',height='+defaultHeight+',left='+PositionX+',top='+PositionY;
    var optIE='scrollbars=yes,width=175,height=75,left='+PositionX+',top='+PositionY;

    if (isNN){
        imgWin=window.open('about:blank','',optNN);
    }
    if (isIE){
        imgWin=window.open('about:blank','',optIE);
    }
    
    with (imgWin.document)
    {
    writeln('<html><head><title>Cargando ...</title><style>body{margin:0px;}</style>');
    writeln('<sc'+'ript>');
    writeln('var isNN,isIE;');
    writeln('if (parseInt(navigator.appVersion.charAt(0))>=4){');
    writeln('isNN=(navigator.appName=="Netscape")?1:0;');
    writeln('isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}');
    writeln('function reSizeToImage(){');
    writeln('if (isIE){');
    //-> Cambio 3.1.0: para IE, se toma directamente el tamaño de la imagen para
    // redimensionar la ventana; el segundo resizeTo no estaba funcionando en IE9
    //writeln('window.resizeTo(175,75);');
    //writeln('width=175-(document.body.clientWidth-document.images[0].width);');
    //writeln('height=75-(document.body.clientHeight-document.images[0].height);');
    writeln('width=document.images[0].width;');
    writeln('height=document.images[0].height;');
    //<- Cambio 3.1.0
    writeln('window.resizeTo(width,height);}');
    writeln('if (isNN){'); 
    writeln('window.innerWidth=document.images["imagenes"].width;');
    writeln('window.innerHeight=document.images["imagenes"].height;}}');
    writeln('function doTitle(){document.title="'+imageTitle+'";}');
    writeln('</sc'+'ript>');
    if (!AutoClose) 
        writeln('</head><body bgcolor=000000 scroll="yes" onload="reSizeToImage();doTitle();self.focus()">')
    else 
        writeln('</head><body bgcolor=ffffff scroll="yes" onload="reSizeToImage();doTitle();self.focus()" onblur="self.close()">');
    writeln('<img name="imagenes" src='+imageURL+' style="display:block"></body></html>');

    close(); 
    }

	//para que no haga submit
	return false;
}

function popImage(imageURL, imageTitle)
{
    PositionX = 100;
    PositionY = 100;
    defaultWidth = 500;
    defaultHeight = 500;
    var AutoClose = true;

    var isNN;
    var isIE;

    if (parseInt(navigator.appVersion.charAt(0))>=4)
    {
        isNN=(navigator.appName=="Netscape")?1:0;
        isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;
    }
    var optNN='scrollbars=yes,width='+defaultWidth+',height='+defaultHeight+',left='+PositionX+',top='+PositionY;
    var optIE='scrollbars=yes,width=175,height=75,left='+PositionX+',top='+PositionY;

    if (isNN){
        imgWin=window.open('about:blank','',optNN);
    }
    if (isIE){
        imgWin=window.open('about:blank','',optIE);
    }
    
    with (imgWin.document)
    {
    writeln('<html><head><title>Cargando ...</title><style>body{margin:0px;}</style>');
    writeln('<sc'+'ript>');
    writeln('var isNN,isIE;');
    writeln('if (parseInt(navigator.appVersion.charAt(0))>=4){');
    writeln('isNN=(navigator.appName=="Netscape")?1:0;');
    writeln('isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}');
    // función reSizeToImage
    writeln('function reSizeToImage(){');
    writeln('var nAncho,nAlto;');
    writeln('var nAdd_w=0;');
    writeln('var nAdd_h=0;');
    writeln('nAncho=document.images[0].width;');
    writeln('nAlto=document.images[0].height;');
    // para IE
    writeln('if (isIE){');
    writeln('}');
    // para Firefox / Chrome
    writeln('if (isNN){'); 
    writeln('}');
    // se comprueban valores mínimos
    writeln('if (nAdd_w<100){');
    writeln('nAdd_w=100;}');
    writeln('if (nAdd_h<120){'); 
    writeln('nAdd_h=120;}');
    // se redimensiona la ventana
    writeln('window.resizeTo(nAncho+nAdd_w,nAlto+nAdd_h);');
    writeln('}');
    // función doTitle
    writeln('function doTitle(){document.title="'+imageTitle+'";}');
    writeln('</sc'+'ript>');
    if (!AutoClose) 
        writeln('</head><body bgcolor=000000 scroll="yes" onload="reSizeToImage();doTitle();self.focus()">')
    else 
        writeln('</head><body bgcolor=ffffff scroll="yes" onload="reSizeToImage();doTitle();self.focus()" onblur="self.close()">');
    writeln('<div id="contenedor" style="text-align:center">');
    //writeln('<img name="imagenes" src='+imageURL+' style="display:block"></div></body></html>');
    writeln('<img name="imagenes" src='+imageURL+' style="display:inline-block"></div></body></html>');

    close(); 
    }

	//para que no haga submit
	return false;
}
//-> v3.1.19 (DCC)
function SendCustomerChoice(opcion)
{
    try
    {
        SetControlValue('CustomerChoice', opcion);
    }
    catch(e)
    {
        // return false so no post back occurs
        return false;
    }
    // se deshabilita la página
    DeshabilitarControlesDCC('true');

    //alert('debug: SendCustomerChoice: return true');

    return true;
}
function DeshabilitarControlesDCC(estado)
{
    var i;
    var obj, doc;
    var alto, maxDocHeight;

    alto = 0;
    maxDocHeight = 0;
	try{
	    // máxima altura del documento
	    maxDocHeight = getMaxDocHeight();
	    //->v3.1.22b: se usa como referencia la vista
	    // the width of the screen (excluding the Windows Taskbar)
	    //alto = screen.availHeight;
        alto = getViewHeight();
        //<-v3.1.22b
	    // puede ser el alto de la pantalla menor que el documento
	    if( alto < maxDocHeight )
	        alto = maxDocHeight;
	}
    catch(e)
    {
        alto = 0;
    }

    try
    {
        obj = document.getElementById('dvDisableScreen');
        if( obj!=null )
        {
            doc = document.getElementById('DocumentBody');
            // habilitar / deshabilitar elementos de la página
            if( estado==false )
            {
                obj.style.display='none';
                // restaura scroll-bar
                if(doc!=null)
                {
                    //v3.1.18: se fuerza ocultar por programación
                    //doc.className='scrollbarauto';
                    try{doc.style.overflow='auto';}catch(e){}
                }
            }
            //v3.1.22b: sólo se muestra si se ha podido calcular el tamaño
            //else
            else if( alto>0 )
            {
                // si se calculó la altura máxima
                obj.style.height=alto+"px";
                //-> v3.1.18
                // se fuerza estilo por progamación
                obj.style.position='absolute';
                obj.style.top='0px';
                obj.style.left='0px';
                obj.style.width='100%';
                obj.style.backgroundColor='#333333';
                var bOpacity;
                try{
                    // For IE9, Firefox, Chrome, Opera, and Safari
                    //opacity:0.7;
                    obj.style.opacity=0.7;
                    bOpacity=true;
                }
                catch(e1){
                    bOpacity=false;
                }
                if(bOpacity=false)
                {
                    try{
                        // For IE8 and earlier
                        //filter: alpha(opacity=70);
                        obj.style.filters.alpha.opacity=70;
                    }
                    catch(e2){
                    }
                }
                obj.style.zIndex='+4';
                //<- v3.1.18

                obj.style.display='block';
                // oculta scroll-bar
                if(doc!=null)
                {
                    //v3.1.18: se fuerza ocultar por programación
                    //doc.className='scrollbarhidden';
                    try{doc.style.overflow='hidden';}catch(e){}
                }
            }
        }
    }
    catch(e)
    {
        return false;
    }

    return true;
}

function GetControlValue(ctrlName)
{
    var valor;
    var objCtrl;
    var auxName;
    try
    {
        valor = "";
        auxName = 'ctl00_' + ctrlName;
        objCtrl = document.getElementById(auxName);
        if(objCtrl!=null)
        {
            valor = objCtrl.value;
        }
    }
    catch(e)
    {
        valor = "";
    }
    if( valor=="" )
    {
        try
        {
            auxName = ctrlName;
            objCtrl = document.getElementById(auxName);
            if(objCtrl!=null)
            {
                valor = objCtrl.value;
            }
        }
        catch(e)
        {
            valor = "";
        }
    }
    return valor;
}

function SetControlValue(ctrlName, valor)
{
    var objCtrl;
    var auxName;
    var bAsignado;
    //alert('debug: SetControlValue: Control='+ctrlName+' Valor='+valor);
    try
    {
        bAsignado=false;
        auxName = ctrlName;
        objCtrl = document.getElementById(auxName);
        if(objCtrl!=null)
        {
            objCtrl.value = valor;
            bAsignado=true;
            //alert('debug: SetControlValue: Control='+auxName+' Valor asignado.');
        }
    }
    catch(e)
    {
        bAsignado=false;
    }
    if( bAsignado==false )
    {
        try
        {
            auxName = 'ctl00_' + ctrlName;
            objCtrl = document.getElementById(auxName);
            if(objCtrl!=null)
            {
                objCtrl.value = valor;
                bAsignado=true;
                //alert('debug: SetControlValue: Control='+auxName+' Valor asignado.');
            }
        }
        catch(e)
        {
            bAsignado=false;
        }
    }
    return bAsignado;
}

function GetControlObj(ctrlName)
{
    var objCtrl;
    var auxName;
    try
    {
        auxName = 'ctl00_' + ctrlName;
        objCtrl = document.getElementById(auxName);
        if(objCtrl!=null)
        {
            return objCtrl;
        }
    }
    catch(e)
    {
        objCtrl = null;
    }
    if( objCtrl==null )
    {
        try
        {
            auxName = ctrlName;
            objCtrl = document.getElementById(auxName);
            if(objCtrl!=null)
            {
                return objCtrl;
            }
        }
        catch(e)
        {
            objCtrl = null;
        }
    }
    return objCtrl;
}
//<- v3.1.19 (DCC)

//-> v3.1.22b
function GetStyleProperty(ElementId, CssProperty)
{
    var obj = document.getElementById(ElementId);
    if(obj==null)
    {
        //alert('debug: Get Style: ElementId is null');
        return "";
    }

    try
    {
        //IE
        if(obj.currentStyle)
        {
            var res = obj.currentStyle[CssProperty];
            //alert('debug: Get Style: currentStyle='+res);
            return res;
        }
        //alert('debug: Get Style: no currentStyle');
    }
    catch(e){
        //alert('debug: Get Style: exception in currentStyle');
    }
    try
    {
        //Firefox
        if (window.getComputedStyle)
        {
            var elementStyle = window.getComputedStyle(obj, null);
            var res = elementStyle.getPropertyValue(CssProperty);
            //alert('debug: Get Style: getPropertyValue='+res);
            return res;
        }
        //alert('debug: Get Style: no getComputedStyle');
    }
    catch(e){
        //alert('debug: Get Style: exception getComputedStyle');
    }
    try
    {
        //try and get inline style
        if (obj.style[CssProperty]!=null && obj.style[CssProperty]!='undefined')
        {
            return obj.style[CssProperty];
        }
    }
    catch(e){
    }

    try
    {
        // si no funcionó ninguna de las opciones anteriores, se evalúa llamada explícita
        var valor = eval('document.getElementById('+ElementId+').style.'+CssProperty);
        if (valor!=null && valor!='undefined')
        {
            //alert('debug: eval(obj.style.'+CssProperty+')='+valor);
            return valor;
        }
    }
    catch(e){
        //alert('debug: Exception in eval(obj.style.'+CssProperty+')');
    }

    return "";
}
// OJO:  Disabled <input> elements in a form will not be submitted
function CambiarEstadoEditables(estado)
{
    // 2.- CAMBIAR ESTADO DE LAS CAJAS DE TEXTO
    // lista de controles de texto editables
    var arrTxt=new Array("txtTarjeta","lstMeses","lstYears","txtCodSeguridad","txtCentro",
        "txtTPVOri","txtFechaOri","txtIdOpOri","txtAutOri");

    var frm = document.forms[0];

    for (i=0;i<frm.elements.length;i++)
    {
	    var objCtrl = frm.elements[i];
	    if(objCtrl!=null && objCtrl.id!=null)
	    {
	        //alert('debug: frm.elements['+i+'].id='+objCtrl.id);
	        for( j=0; j<arrTxt.length; j++ )
	        {
	            if(objCtrl.id.indexOf(arrTxt[j])>=0)
	            {
	                //alert('debug: frm.elements['+i+'].id='+objCtrl.id+' & frm.elements['+i+'].disabled='+objCtrl.disabled);
	                if(objCtrl.disabled != estado)objCtrl.disabled = estado;
	            }
	        }
	    }
    }
}

function RecalOnScroll() 
{
    var obj;
    var id;
    var objAlert;
    var objModal;
    var valorTop;
    // se inicializa objeto
    obj = null;
    // Ventana modal
    try
    {
        objModal = document.getElementById('dvConfirm');
        if( objModal!=null && GetStyleProperty('dvConfirm','display')=='block' )
        {
            obj = objModal;
            id = 'dvConfirm';
        }
	}
	catch(e1){
	}
    // Ventana confirmación
    try
    {
        if( id!='dvConfirm' )
        {
            objAlert = document.getElementById('dvAlert');
            if( objAlert!=null && GetStyleProperty('dvAlert','display')=='block' )
            {
                obj = objAlert;
                id = 'dvAlert';
            }
        }
	}
	catch(e2){
	}
    // Se recalcula posición
    try
    {
        if( obj!=null )
        {
		    // se centra el div verticalmente
            // hay que distinguir entre posición
            // fija y absoluta para situar verticalmente el div
            var objPos = GetStyleProperty(id, 'position');
            if(objPos!='fixed')
            {
                valorTop = calcularTop(id,false);
                // se desplaza n pixels desde el top
                obj.style.marginTop="0px";
                obj.style.top=valorTop+"px";
                // se hace visible el objeto: sacarlo de css
                obj.style.display = 'block';
                obj.style.zIndex = '+10';
            }
        }
	}
	catch(e1){
	}
}

function SituarDialogo(id,obj)
{
    // se centra el div verticalmente (hay que distinguir entre 
    // posición fija y absoluta para situar verticalmente el div)
    var objPos = GetStyleProperty(id, 'position');
    // si es position:fixed 
    if(objPos!=null && objPos=='fixed')
    {
        valorTop = calcularTop(id,true);
        // se sitúa en relación a la vista
//        obj.style.marginTop="0%";
//        obj.style.top=valorTop+"%";
    }
    else
    {
        valorTop = calcularTop(id,false);
        // se desplaza n pixels desde el top
//        obj.style.marginTop="0px";
//        obj.style.top=valorTop+"px";
    }
    // se desplaza n pixels desde el top
    obj.style.marginTop="0px";
    obj.style.top=valorTop+"px";
    // se hace visible el objeto: sacarlo de css
    obj.style.display = 'block';
    obj.style.zIndex = '+10';
}
//<-v3.1.22b