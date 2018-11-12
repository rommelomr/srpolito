<?php


	class ControladorPrincipal{

		public static function principal(){

			Accion::cargarPagina('principal','principal');
		}



		public static function prueba(){
			if(ControladorAjax::verificarCode()){

			$nombre = PGSC('varNombre');
			$apellido = PGSC('varApellido');

			$cadena = "$nombre $apellido";

			echo $cadena;
			}else{
				header('Location:index.php/?err=403');

			}
		}
	}


?>