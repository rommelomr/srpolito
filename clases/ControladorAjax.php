<?php
	class ControladorAjax{

		public static function cargar(){
			//recibir controlador y metodo;
			if(PGSC('con')!==0){

				$controlador = PGSC('con');

				$con = obtenerModulo($controlador);
				$met = obtenerPagina($controlador);
				$controller = definirControlador($con);
			
				$controller::$met();
			}else{
				header('Location:.');
			}

		}
		public static function verificarCode(){
			session_start();
			if ((PGSC('code')!==0) && (PGSC('etCodeForm')!==0)){
				$code = PGSC('code');
				$codeForm = $_SESSION['etCodeForm'];
			}else{
				$code = null;
				$codeForm=null;
			}
			unset($_SESSION['etCodeForm']);
			if(password_verify($codeForm,$code)){
				return 1;
			}else{
				$error = 'Always throw this error';
				throw new Exception($error);
			}
		}
		public static function index(){

			echo "El accion solicitada no tiene ningun destino";

		}


	}
?>
