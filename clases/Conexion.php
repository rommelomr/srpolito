<?php 
	//Clase que hereda de la clase PDO, con la que se conecta el sistema a la base de datos.

	class Conexion extends PDO{

		public function __construct($use=null,$pas=null){
			/*
				Los datos de conexión de base de datos se configuran en utilidades/cabeceraPhp.php
			*/
			parent::__construct(gestor.':host='.host.';dbname='.bd,usuario, clave, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		}

		public function verificar($sql,$arr=null){
			/*
				Funcion que ejecuta una sentencia SELECT FROM y verifica si los datos existen en la base de datos.
				si existe(n) devuelve 1, si no, devuelve 0;
			*/
			$ejecucion = parent::prepare($sql);
			$ejecucion->execute($arr);

			if ($ejecucion->rowCount()!=0){
				return true;
			}else{
				return false;
			}
		}

		public function extraer($sql,$arr=null){
			/*Funcion que ejecuta una sentencia SELECT FROM y devuelve un arreglo con los resultados. Si no encuentra resultados devuelve 0;
			*/
			$ejecucion = parent::prepare($sql);
			$ejecucion->execute($arr);
			return $ejecucion->fetchAll();

		}
		
		public function enviar($sql,$arr=null){
			//Funcion que usa los metodos de la clase PDO para preparar y ejecutar una sentencia sql.

			$ejecucion = parent::prepare($sql);
			return $ejecucion->execute($arr)? 1:0;
		}	

	}
			
?>
