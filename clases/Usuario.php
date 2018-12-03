<?php 

	class Usuario{

		private $usuario;
		private $clave;
		private $permisos;
		private $estado;


		public function get_usuario(){

			return $this->usuario;}

		public function get_clave(){

			return $this->clave;}

		public function get_permisos(){

			return $this->permisos;}

		public function get_estado(){

			return $this->estado;}

		private function set_usuario($usu){

			$this->usuario=$usu;}

		private function set_clave($cla){

			$this->clave=$cla;}

		private function set_permisos($per){

			$this->permisos=$per;}		

		private function set_estado($est){

			$this->estado=$est;}		

		public function __construct($usu,$cla=null,$per=null,$est=null){

			$this->set_usuario($usu);
			$this->set_clave($cla);
			$this->set_permisos($per);
			$this->set_estado($est);

		}


		////////////////////////////////////////////////////////////////////////

		public function crear_usuario(){

			//Método que registra un usuario en la base de datos. Devuelve 1 si lo registró, 0 en caso contrario
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