<?php
	require_once 'Router.php';
	class AjaxController extends Router{

		public static function cargar(){
			//recibir controlador y metodo;
			session_start();
			$method = PGSC('method');
			$controller = PGSC('controller');
			$send_request = true;
			
			if(parent::$privileges[$controller][$method][0]===1){
				
				if(!parent::verify_user_privilges($controller,$method)){
					$send_request = false;
				}

			}else if(parent::$privileges[$controller][$method][0]===2){
				if(ControllerLogin::get_session('user')!==0){
					$send_request = false;
				}

			}
			if($send_request){
				$controller = definirControlador(PGSC('controller'));
				$controller::$method();
				
			}else{
				echo 'La solicitud no puede realizarce porque no se tienen los permisos necesarios';
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
		public static function get_code(){

			echo "El accion solicitada no tiene ningun destino";

		}


	}
?>
