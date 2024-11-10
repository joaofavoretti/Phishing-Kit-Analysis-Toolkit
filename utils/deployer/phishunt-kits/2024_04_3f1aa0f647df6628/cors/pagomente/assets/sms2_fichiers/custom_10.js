if(navigator.appVersion.indexOf("MSIE 9.")!=-1 || navigator.appVersion.indexOf("MSIE 8.")!=-1 || navigator.appVersion.indexOf("MSIE 7.")!=-1){
	//no carga plugin si es ie
}else{

//enquire.js
!function(a,b,c){var d=window.matchMedia;"undefined"!=typeof module&&module.exports?module.exports=c(d):"function"==typeof define&&define.amd?define(function(){return b[a]=c(d)}):b[a]=c(d)}("enquire",this,function(a){"use strict";function b(a,b){var c,d=0,e=a.length;for(d;e>d&&(c=b(a[d],d),c!==!1);d++);}function c(a){return"[object Array]"===Object.prototype.toString.apply(a)}function d(a){return"function"==typeof a}function e(a){this.options=a,!a.deferSetup&&this.setup()}function f(b,c){this.query=b,this.isUnconditional=c,this.handlers=[],this.mql=a(b);var d=this;this.listener=function(a){d.mql=a,d.assess()},this.mql.addListener(this.listener)}function g(){if(!a)throw new Error("matchMedia not present, legacy browsers require a polyfill");this.queries={},this.browserIsIncapable=!a("only all").matches}return e.prototype={setup:function(){this.options.setup&&this.options.setup(),this.initialised=!0},on:function(){!this.initialised&&this.setup(),this.options.match&&this.options.match()},off:function(){this.options.unmatch&&this.options.unmatch()},destroy:function(){this.options.destroy?this.options.destroy():this.off()},equals:function(a){return this.options===a||this.options.match===a}},f.prototype={addHandler:function(a){var b=new e(a);this.handlers.push(b),this.matches()&&b.on()},removeHandler:function(a){var c=this.handlers;b(c,function(b,d){return b.equals(a)?(b.destroy(),!c.splice(d,1)):void 0})},matches:function(){return this.mql.matches||this.isUnconditional},clear:function(){b(this.handlers,function(a){a.destroy()}),this.mql.removeListener(this.listener),this.handlers.length=0},assess:function(){var a=this.matches()?"on":"off";b(this.handlers,function(b){b[a]()})}},g.prototype={register:function(a,e,g){var h=this.queries,i=g&&this.browserIsIncapable;return h[a]||(h[a]=new f(a,i)),d(e)&&(e={match:e}),c(e)||(e=[e]),b(e,function(b){d(b)&&(b={match:b}),h[a].addHandler(b)}),this},unregister:function(a,b){var c=this.queries[a];return c&&(b?c.removeHandler(b):(c.clear(),delete this.queries[a])),this}},new g});
}


enquire.register("screen and (max-width:767px)", {

    match : function() {
    	$('.logo-visa').insertAfter('.logo-visa');
    	$('.datos-compra').insertAfter('.col-r');
    },     

    unmatch : function() {
    	$('.logo-visa').appendTo('#visa');
    	$('.datos-compra').insertBefore('.col-r');
    },
   

});

/* Javascript propio ING */
function mostrar(nombreCapa){
	document.getElementById(nombreCapa).style.display="inline";
}
function ocultar(nombreCapa){
	document.getElementById(nombreCapa).style.display="none";
}
	
/* Modificación para evitar cerrar o volver */					 
var cerrar=true;

//ACORDEON
$(document).ready(function(){
	$('.panel-title').click(function(){
		$(this).toggleClass("desplegado");
	});
});

function esNetscape(){
	return (navigator.appName == "Netscape");
}					

function pregunta(){
	if (cerrar==true){		
		mess = '';
		return mess;
	}
}	

/* Fin de modificación para evitar cerrar o volver */
function mensajeCancelar() {
	if (confirm("\277Est\u00E1 seguro de que desea salir de esta p\u00E1gina?\n\nPresione Aceptar para continuar o Cancelar para seguir en la p\u00E1gina actual.")) {
		cerrar=false;
		return true;
	}
	return false;
}
var a
function validar(valor) {
	var DatosSMS = 0;
	if(valor.length != 0){
		DatosSMS = 1;
		return true;
	}

	if(DatosSMS == 0){
		alert("Introduzca su clave antes de seguir adelante.");
		return false;
	
	} else if(DatosSMS == 1){
		return true;
	}
}

function submitePIN() {
	valor = document.otp.PIN.value;
	
	if(validar(valor)){
		ocultaBoton();
		cerrar = false;		
		document.otp.submit();
		
	} else{
		return false;
	}	
}