<?php 
	//Clase que hereda de la clase PDO, con la que se conecta el sistema a la base de datos.

	class Conexion extends PDO{

		private $user=user;
		private $pass=pass;
		private $gestor=gestor;
		private $host=host;
		private $bd=bd;

		private $sentencia;


		public function __construct($use=null,$pas=null){
			/*
			Los atributos de la clase, a excepcion de "setencia", se obtienen del archivo /config.ini,
			a saber: Usuario de base de datos, contraseña,gestor,host y nombre de base de datos.
			Nota: Usuario y clave se pueden obtener de dos maneras.
				1:Pasandolos como parámetro al crear el objeto conexion
				2:Creando el objeto conexion sin parametros, lo cual hara que el constructor los obtenga del archivo /config.ini
			*/



			parent::__construct($this->gestor.':host='.$this->host.';dbname='.$this->bd,$this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
				
		

		}
		private function setUser($val){
			
			$this->user =$val;}

		private function setPass($val){

			$this->pass =$val;}

		private function setGestor($val){

			$this ->gestor = $val;}

		private function setHost($val){
			$this ->host = $val;}

		private function setBd($val){
			$this ->bd = $val;}

		private function cargarConfigIni(){

			$configIni=fopen('config.ini', 'r');

				while(!feof($configIni)){

					$linea = explode("=",trim(fgets($configIni)));
					if(isset($linea[1])){
						$valores[] = $linea[1];
						
					}
					
				}
			fclose($configIni);
			return $valores;}



		public function verificar($sql,$arr=null){
			/*Funcion que ejecuta una sentencia SELECT FROM y verifica si los datos existen en la base de datos.
			si existe(n) devuelve 1, si no, devuelve 0;
			*/
			$ejecucion = parent::prepare($sql);
			$ejecucion->execute($arr);

			if ($ejecucion->rowCount()!=0){
				return 1;
			}else{
				return 0;
			}
		}

		public function extraer($sql,$arr=null){
			/*Funcion que ejecuta una sentencia SELECT FROM y devuelve un arreglo con los resultados. Si no encuentra resultados devuelve 0;
			*/
			$ejecucion = parent::prepare($sql);
			$ejecucion->execute($arr);
			if ($ejecucion->rowCount()!=0){
				return $ejecucion->fetchAll();
			}else{
				return 0;
			}
		}
		
		public function enviar($sql,$arr=null){
			//Funcion que usa los metodos de la clase PDO para preparar y ejecutar una sentencia sql.

			$ejecucion = parent::prepare($sql);
			return $ejecucion->execute($arr)? 1:0;
		}	

	}
			
?>
