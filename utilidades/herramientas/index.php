<?php
	define('user','root');
	define('pass','erestu');
	define('gestor','mysql');
	define('host','localhost');
	define('bd','etframe');

	$clases = scandir("../../clases");
	$pos = count($clases);

	for($i=2;$i<$pos;$i++){
		

		require_once '../../clases/'.$clases[$i];
		
	}


?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	
	<link rel="stylesheet" type="text/css" href="../../utilidades/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../utilidades/bootstrap/bootstrap-vue.css">
	<link rel="stylesheet" type="text/css" href="../../utilidades/fontawesome/web-fonts-with-css/css/fontawesome-all.css">

	<script src="../../utilidades/jquery/jquery.min.js"></script>
	<script src="../../utilidades/popper/Popper.js"></script>
	<script src="../../utilidades/polyfill/polyfill.min.js"></script>
	<script src="../../utilidades/tether/tether.min.js"></script>
	
	<script src="../../utilidades/bootstrap/bootstrap.min.js"></script>
	<script src="../../utilidades/bootstrap/bootstrap-vue.js"></script>

	<script src="../../scripts/funciones.js"></script>

	<script src="../../utilidades/alertify/lib/alertify.js"></script>
	<link rel="stylesheet" href="../../utilidades/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../../utilidades/alertify/themes/alertify.default.css" />

	<link rel="stylesheet" type="text/css" href="../../estilos/general.css">