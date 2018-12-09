<?php

	require_once __DIR__."/funciones.php";
	define('usuario','root');
	define('clave','');
	define('gestor','mysql');
	define('host','localhost');
	define('bd','biblioteca');

	$clases = scandir("clases");
	$pos = count($clases);

	for($i=2;$i<$pos;$i++){
		

		require_once __DIR__.'/../clases/'.$clases[$i];
		
	}
	define('code','gimnasio');

?>