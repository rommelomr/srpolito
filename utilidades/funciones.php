<?php 
	function url($dir){
		return '.?mod='.$dir;
	}
	function alert($msg=null){
		echo '<script>alert("'.$msg.'");</script>';

	}
	function ascii_encode($word){
		$length = strlen($word);
		$code = '';
		for ($i=0; $i < $length; $i++) { 
			$ord = ord($word[$i]);
			if($ord<9){
				$code .= '00'.$ord;
			}else if($ord < 99){
				$code .= '0'.$ord;
			}else{
				$code .= $ord;
			}
		}
		return $code;
	}

	function ascii_decode($code){
		$length = strlen($code);
		$word = '';
		for ($i=0; $i < $length ; $i=$i+3) { 
			$word .= chr(substr($code,$i,3));
		}
		return $word;
	}

	function get_encode($arr){
		$var = '';
		foreach ($arr as $key => $value){
			if($var!=''){
				$var .= '*';
			}
			$var .= $key.'='.ascii_encode($value);
		}
		return $var;
	}
	function get_decode(){
		$length = strlen($_GET['var']);
		$vars = explode('*',$_GET['var']);
		
		foreach ($vars as $pos => $var) {
			//echo $pos.' :'.$var.'<br>';
			$get = explode('=', $var);
			$arr[$get[0]] = ascii_decode($get[1]);
		}
			return $arr;
		
	}

	function dd($arr){

		echo '<pre>';
		var_dump($arr);
		echo '</pre>';
		exit;

	}

	function incluirComponente($arr=null){
		
		if (($arr != null)){

			$modulo = obtenerModulo();				

			foreach ($arr as $valor) {
				
				require_once "modulos/$modulo/$valor";

			}
		}


	}

	function obtenerModulo($dir){
		//Funcion usada en el index del sistema para indicar qué modulo se va a cargar. Si no hay ningun modulo seteado, el modulo a cargar sera el principal
		
			$mod = explode("/", $dir);
			return $mod[0];
	}
	

	function obtenerPagina($dir){
		//Funcion usada en el index del sistema para indicar qué pagina se va a cargar del modulo obtenido anteriormente. Si no hay ninguna pagina seteada, la pagina a cargar sera el index del modulo

		
			$pag = explode("/", $dir);
			if(isset($pag[1])){
				return $pag[1];
			} else{
				return 'index';
			}

	}

	function imagen_error($err='404'){
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

	function PGSC($cad=null){
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

	function validarCampoUsuario($usu){

		if(		(strMaxMin($usu,0,20))
			&&	(strLetrasValidas($usu,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890._'))
			&& ($usu!=="")
				

			){

			return true;

		}else{
			return false;
		}

	}
	function strMaxMin($cad,$min=0,$max=255){

		if((strlen($cad)>=$min)&&(strlen($cad)<=$max)){


			return 1;

		}else{

			return 0;
		}
	}

	function strLetrasValidas($cad,$val='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'){

		for($i=0;$i<strlen($cad);$i++){

			if(strpos($val,$cad[$i])===false){

				return 0;

			}

		}
		return 1;



	}

	function verificarPermisos($tip){

		session_start();
		if(!(isset($_SESSION['usuario']))){

			
			header('Location:./?mod='.$dir);

		}

	}

	function verificarPublic($dir){

		session_start();
		if(isset($_SESSION['usuario'])){

			header('Location:./?mod='.$dir);

		}

	}
	function definirControlador($con){
		$con = ucwords($con);
		$con = 'Controller'.$con;
		return $con;
	}
	function get_code_form(){
		if(isset($_SESSION[code.'_code_form'])){
			return $_SESSION[code.'_code_form'];
		}else{
			return null;

		}
	}
	function verify_code_form(){

		return password_verify(get_code_form(),PGSC('_code_form'));
	}
	function previous_page($arr=null){
		if(($arr!=[]) && ($arr!=null)){
			foreach ($arr as $key => $value) {
				setcookie(code.'_'.$key,$value,time()+5);
			}
		}
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}

?>