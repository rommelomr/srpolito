<?php 

	class User{
		public static $table = 'users';
		public static $attr = ['nombre','apellido','user','pass','privileges','status','created_at'];

		public function create($nombre,$apellido,$usuario,$clave,$permisos,$estado){
		
			//Método que registra un usuario en la base de datos. Devuelve 1 si lo registró, 0 en caso contrario

			$values = [$nombre,$apellido,$usuario,$clave,$permisos,$estado];
			$limit = count($this->attr);

			for ($i=0; $i < $limit; $i++) { 
				echo 'a'; exit();
			}
			$con = new Conexion();
			return $con->
				enviar("insert into usuario (usuario,clave,permisos,estado) values (:usuario,:clave,:permisos,:estado)"

				,array('usuario'=>$this->get_usuario()
						,'clave'=>password_hash($this->get_clave(),PASSWORD_BCRYPT)
						,'permisos'=>$this->get_permisos()
						,'estado'=>$this->get_estado())
					);

		}

		public function consultar_usuario(){
			$con = new Conexion();

			return $con->
				extraer('select usuario, clave, permisos, estado from usuario where usuario = :usuario',
					array(
						'usuario'=>$this->get_usuario())
				);
		}

	}
?>