<?php
$archivoUsuario = $_GET['archivoUsuario'];
unlink($_GET['archivoUsuario']);
echo "<script>window.close();</script>";