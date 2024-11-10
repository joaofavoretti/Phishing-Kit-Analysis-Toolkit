/***********************************************************************
 * Descripcion: JavaScript Algoritmo SHA-1 para mensajes de 
 *              longitud maxima de 55 caracteres.
 *
 * Autor: PG - SERMEPA 10/12/1999
 *
 ***********************************************************************/
function hash(cadena)
{
        var H1 = 0x67452301;
        var H2 = 0xefcdab89;
        var H3 = 0x98badcfe;
        var H4 = 0x10325476;
        var H5 = 0xc3d2e1f0;
        var Y1 = 0x5a827999;
        var Y2 = 0x6ed9eba1;
        var Y3 = 0x8f1bbcdc;
        var Y4 = 0xca62c1d6;

        buffer=new Array();
        words=new Array();

        var longitud=cadena.length;

        for(i=0;i<longitud;i++)
          buffer[i]=cadena.charCodeAt(i);

        /* Añadir padding */
        buffer[i]= 0x80;
        i++;
        for(;i<(64-(longitud+9));i++)
          buffer[i]=0x00;

        /* Los �ltimos 8 son la longitud */
        longitud*=8; // longitud bytes->bits
        buffer[56] = 0x00;
        buffer[57] = 0x00;
        buffer[58] = 0x00;
        buffer[59] = 0x00;
        buffer[60] = ((longitud >>> 24) & 0xff);
        buffer[61] = ((longitud >>> 16) & 0xff);
        buffer[62] = ((longitud >>> 8) & 0xff);
        buffer[63] = (longitud  & 0xff);

        /* Pasar  bloque de 64 bytes a 16 words */
        for(i=0,j=0;i<64;i+=4,j++)
          words[j]=((buffer[i + 0] << 24) & 0xff000000)|((buffer[i + 1] << 16) & 0x00ff0000) |
                           ((buffer[i + 2] <<  8) & 0x0000ff00)|((buffer[i + 3] <<  0) & 0x000000ff);              

        /* Procesar */

        for (i = 16; i <= 79; i++)
        {
                t = words[i - 3]^ words[i - 8]^ words[i - 14]^ words[i - 16];
                words[i] = circularRotate(t, 1);
        }

        // Comienzo calculo SHA1
        var A = H1;
        var B = H2;
        var C = H3;
        var D = H4;
        var E = H5;
        var t;
        /*
         * vuelta 1
         */
        for (j = 0; j <= 19; j++)
        {
                t = circularRotate(A, 5) + f(B, C, D) + E + words[j] + Y1;
                E = D;  D = C;  C = circularRotate(B, 30);      B = A;  A = t;
        }

        /*
         * vuelta 2
         */
        for (j = 20; j <= 39; j++)
        {
                t = circularRotate(A, 5) + h(B, C, D) + E + words[j] + Y2;
                E = D;  D = C;  C = circularRotate(B, 30);      B = A;  A = t;
        }

        /*
         * vuelta 3
         */
        for (j = 40; j <= 59; j++)
        {
                t = circularRotate(A, 5) + g(B, C, D) + E + words[j] + Y3;
                E = D;  D = C;  C = circularRotate(B, 30);      B = A;  A = t;
        }

        /*
         * vuelta 4
         */
        for (j = 60; j <= 79; j++)
        {
                t = circularRotate(A, 5) + h(B, C, D) + E + words[j] + Y4;
                E = D;  D = C;  C = circularRotate(B, 30);      B = A;  A = t;
        }

        H1 += A;
        H2 += B;
        H3 += C;
        H4 += D;
        H5 += E;

        /*
         * convertir a string
         */
          return (word_string(H1)+word_string(H2)+word_string(H3)+word_string(H4)+word_string(H5));

}/* Fin funcion hash */

function circularRotate(x,n)
{
        return (x << n) | (x >>> (32 - n));
}/* Fin funcion circularRotate */
function f(u,v,w)
{
        return ((u & v) | ((~u) & w));
}

function h(u,v,w)
{
                return (u ^ v ^ w);
}

function g(u,v,w)
{
                return ((u & v) | (u & w) | (v & w));
}

function word_string(a)
{
 b1 = ((a >>> 28) & 0xf); 
 b2 = ((a >>> 24) & 0xf); 
 b3 = ((a >>> 20) & 0xf);
 b4 = ((a >>> 16) & 0xf);
 b5 = ((a >>> 12) & 0xf);
 b6 = ((a >>> 8) & 0xf);
 b7 = ((a >>> 4) & 0xf);
 b8 = (a & 0xf);
 return (b1.toString(16)+b2.toString(16)+b3.toString(16)+b4.toString(16)+ 
         b5.toString(16)+b6.toString(16)+b7.toString(16)+b8.toString(16));
}

function submitirCip(){
	var CIP=new String(document.aux.pin.value);
	if( CIP.length==6 ){
		/* Transmitimos dos posiciones aletarias del hash */
 		var mensaje=CIP;
		var y=hash(mensaje);
		ale0=document.aux.HashAle0.value;
		ale1=document.aux.HashAle1.value;
		document.cip.cip.value=new String(ale0+"="+y.charAt(ale0)+"::"+ale1+"="+y.charAt(ale1));
		document.cip.submit();
		ocultaBoton();
		return 0;
	}else{
		if ( CIP.length==0 )
				alert("Informe CIP");
		else 	alert("El CIP debe constar de 6 posiciones.");
	}   
}

function esNetscape(){
	return (navigator.appName == "Netscape");
}

function ocultaBoton()
{
	if(esNetscape())
	{
		if(document.divImgOcultar)
			document.divImgOcultar.visibility="hide";
	}
	else
	{
		if(document.all.divImgOcultar)
			document.all.divImgOcultar.style.visibility="hidden";
	}
}

function procesaCadena(cadena)
{
		var nuevaCadena='';
        var longitud=cadena.length;
        var carAux;

        for(i=0;i<(longitud/2);i++)
        {
        	carAux = cadena.substring(2*i,2*i+2);
        	if (carAux=='85')
        		nuevaCadena += '0a';
        	else nuevaCadena += carAux;
    	}   	
		return nuevaCadena;
}/* Fin funcion procesaCadena */
