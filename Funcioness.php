<?php

	//Clase que contiene funciones auxiliares para ser usadas en cualqueir parte del sistema, en archivos PHP y en los HTML (siempre y cuando sean extension .php).

	class Funciones{
		//Funcion usada en los index de cada modulo para incluirles un archivo
		public static function incluirComponente($arr=null){
			
			if (($arr != null)){

				$modulo = self::obtenerModulo();				

				foreach ($arr as $valor) {
					
					require_once "modulos/$modulo/$valor";

				}
			}


		}

		public static function obtenerModulo($dir){
			//Funcion usada en el index del sistema para indicar qué modulo se va a cargar. Si no hay ningun modulo seteado, el modulo a cargar sera el principal
			
				$mod = explode("/", $dir);
				return $mod[0];
		}
		

		public static function obtenerPagina($dir){
			//Funcion usada en el index del sistema para indicar qué pagina se va a cargar del modulo obtenido anteriormente. Si no hay ninguna pagina seteada, la pagina a cargar sera el index del modulo

			
				$pag = explode("/", $dir);
				if(isset($pag[1])){
					return $pag[1];
				} else{
					return 'index';
				}

		}

		public static function error($err='404'){
			/*funcion que devuelve el nombre de una imagen al azar contenida en una carpeta de imagenes de error... El numero de error de dicha carpeta viene dado por el parametro recibido.

			Ejemplo: Si el parametro recibido es un 404 la cadena retornada sera 

			"imaErr404/*nombreAlAzar.extencion*"
			
			*/
			
			$fic = scandir("utilidades/errores/imaErr$err");
			
			$ficPos = rand()%(count($fic));
			if ($ficPos<2){
				$ficPos+=2;
			}
			
			return "errores/imaErr$err/".$fic[$ficPos];
			
			
		}

		public function PGSC($cad=null){
			if($cad==null){

				return 0;

			}else{

				if(isset($_POST[$cad])){
					return $_POST[$cad];

				}else if(isset($_GET[$cad])){
					return $_GET[$cad];

				}else if(isset($_SESSION[$cad])){
					return $_SESSION[$cad];
				}else if(isset($_COOKIE[$cad])){
					return $_COOKIE[$cad];
				}else{
					return 0;
				}
			}

		}

		public static function validarCampoUsuario($usu){

			if(		(self::strMaxMin($usu,0,20))
				&&	(self::strLetrasValidas($usu,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890._'))
				&& ($usu!=="")
					

				){

				return true;

			}else{
				return false;
			}

		}
		public static function strMaxMin($cad,$min=0,$max=255){

			if((strlen($cad)>=$min)&&(strlen($cad)<=$max)){


				return 1;

			}else{

				return 0;
			}
		}

		public static function strLetrasValidas($cad,$val='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'){

			for($i=0;$i<strlen($cad);$i++){

				if(strpos($val,$cad[$i])===false){

					return 0;

				}

			}
			return 1;



		}

		public static function verificarLogin($cla='usuario'){
			if(isset($_SESSION[$cla])){


				
				return 1;
				

			}
			return 0;
			

		}
		public static function verificarPermisos($tip){

			session_start();
			if(!(isset($_SESSION['usuario']))){

				
				header('Location:./?mod='.$dir);

			}

		}

		public static function verificarPublic($dir){

			session_start();
			if(isset($_SESSION['usuario'])){

				header('Location:./?mod='.$dir);

			}

		}
		public static function probarVariable($var){
			echo '<pre>';
			var_dump($var);
			echo '</pre>';
			exit();
		}

		public static function definirTipoUsuario($var){

			$largo = strlen($var);
			for($i=0;$i<$largo;$i++){

				if($var[$i]=='1'){
					$tipo[$i]=$i;
				}
				
			}

			return $tipo;

		}

		public static function definirControlador($con){
			$con = ucwords($con);
			$con = 'Controlador'.$con;
			return $con;
		}

	}


?>