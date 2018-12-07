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

	//Esta sección de código analiza la URL para linkear las librerias del lado del cliente. Las URL amigables dan problema por esto
	$level = count(explode('/',$_GET['mod']));
	if($level > 2){
		$back='';
		for ($i=1; $i < $level ; $i++) { 
			$back .= '../';
		}
	}else{

		$back = '../';
	}
	define('back',$back);
	define('utilidades',back.'/utilidades');
	define('almacenamiento',back.'/almacenamiento');
	define('scripts',back.'/scripts');
	define('estilos',back.'/estilos');


?>