<?php
	require_once "utilidades/funciones.php";
	define('user','root');
	define('pass','');
	define('gestor','mysql');
	define('host','localhost');
	define('bd','biblioteca');

	$clases = scandir("clases");
	$pos = count($clases);


	for($i=2;$i<$pos;$i++){
		

		require_once 'clases/'.$clases[$i];
		
	}
	define('code','gimnasio');


?>