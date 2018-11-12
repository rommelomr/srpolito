<?php
	require_once "utilidades/cabeceraPhp.php";

	/*
		Codigos de retorno (queda a criterio del programador usarlo o no).

		0: Recargar Pagina
		1: Error 404 Pagina no Encontrada
		2: Error 403 Acceso Denegado
	*/


try{

	ControladorAjax::cargar();
}catch(Exception $e){

	echo '<script>window.location.assign("./?err=403")</script>';

}
	

?>