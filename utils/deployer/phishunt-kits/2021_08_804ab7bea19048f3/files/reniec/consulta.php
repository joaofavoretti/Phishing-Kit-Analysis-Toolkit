<?php

$consulta = file_get_contents('http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI='.$dni);

if (stristr($consulta,"|||DNI no encontrado en Padrón Electoral")) {
	header('location: Error'); exit;}

list($paterno, $materno, $nombres) = explode('|', $consulta);
?>