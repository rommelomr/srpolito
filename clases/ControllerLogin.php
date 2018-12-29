<?php
	class ControllerLogin{
		public static function authentication(){
			Accion::cargarPagina('login','authentication');
		}

		public static function edit_info_profile(){

			$con = new Conexion;
			$user = $_POST['user'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$pass = '';

			$arr = array(
					'active_user' => ControllerLogin::get_session('user'),
					'user' => $_POST['user'],
					'nombre' => $_POST['nombre'],
					'apellido' => $_POST['apellido']
				);

			if($_POST['pass']!=''){
				$pass = ', pass = :pass';
				$arr['pass'] = password_hash($_POST['pass'],PASSWORD_BCRYPT);
			}

			if($con -> enviar('update users set  user = :user, nombre = :nombre, apellido = :apellido'.$pass.' where user = :active_user',
				$arr
			)){
				previous_page(['up'=>1]);
			}else{
				previous_page(['up'=>0]);
			}
		}

		public static function edit_profile(){
			$datos = DataBase::select(
				'user,nombre,apellido',
				'users',
				'id = '.self::get_session('id')

			);
			Accion::cargarPagina('login','edit_profile',['datos'=>$datos]);
		}

		public static function delete_user(){
			if(isset($_POST['user'])){
				$con = new Conexion;	
				$con->enviar('UPDATE users SET status = 0 where id = :id',array('id'=>$_POST['user']));
			}else{

				header('Location:./?mod=login/users&del=0');
			}
			header('Location:./?mod=login/users');
		}
		
		public static function users(){

			$users = DataBase::select(
					'id,nombre,apellido,user,privileges,status',
					'users',
					'pred: order by(status) desc'
					);
			Accion::cargarPagina('login','users',['users'=>$users]);
		}

		public static function log_out(){

			session_start();	
			session_destroy();
			header('Location:.');

		}

		public static function extract_user_by_user($usuario){
			$con = new Conexion;

			return $con -> extraer('select id, user, pass, privileges, status from users where user = :usuario',

					array('usuario'=>$usuario)
				);


		}
		public static function safe_session($key,$val){
			$_SESSION[code.'_'.$key] = $val;
		}
		public static function get_session($key){

			if (isset($_SESSION[code.'_'.$key])){
				return $_SESSION[code.'_'.$key];
			}
			return 0;
		}

		public static function verify_login($cla='user'){

			if(self::get_session($cla)){

				return 1;
			}

			return 0;

		}
		public static function log_in(){
			
			$user['user'] =PGSC('usuario');
			$user['pass'] =PGSC('contrasena');
			if((validarCampoUsuario($user['user']))&&($user['user']!=="")&&($user['pass']!=="") ){

				$datos = self::extract_user_by_user($user['user']);
				if($datos!=[]){
					if($datos[0]['status']==0){
						alert(url('login/authentication'));
						header('Location:'.url('login/authentication').'&status=0');
						exit;
					}

					if(password_verify($user['pass'],$datos[0]['pass'])){


						session_start();
						self::safe_session('id',$datos[0]['id']);
						self::safe_session('user',$datos[0]['user']);
						self::safe_session('privileges',$datos[0]['privileges']);
						self::safe_session('status',$datos[0]['status']);

						header('Location:.');


					}else{

						header('Location:'.url('login/authentication').'?&log=2');
						
					}
				}else{

					header('Location:'.url('login/authentication').'?&log=1');
					
				}
			}else{

				header('Location:'.url('login/authentication').'?&log=0');
			}

		}
		public static function sign_up(){

			if($db = Database::insert('User',
				['created_at'=>date('Y-m-d'),
				'status'=>1]
			)){
				previous_page(['reg'=>1]);
			}else{
				previous_page(['reg'=>0]);
			}

		}
		
		public function extraerUsuarios(){

			$con = new Conexion();
			return $con->extraer('select usuario.id, usuario.id_persona, usuario.usuario, usuario.permisos, usuario.estado, persona.id, persona.nombres, persona.apellidos, persona.cedula, persona.sexo from usuario, persona where usuario.id_persona = persona.id and usuario.id != 1 order by(usuario.permisos) desc');			

		}

		public function modificar_usuario(){

			/*
			hay que hacer las validaciones de la variable $_POST ya que solo se validan con html
			*/

			$con = new Conexion;

			$sql = 'UPDATE usuario set usuario = :usuario, permisos = :permisos, estado = :estado';
			$arr = ['usuario'=>$_POST['usuario_mod'],
			'permisos'=>$_POST['permisos_mod'],
			'estado'=>$_POST['estado_mod'],
			'id_usuario'=>$_POST['id_mod'],
			'nombres'=>$_POST['nombres_mod'],
			'apellidos'=>$_POST['apellidos_mod'],
			'cedula'=>$_POST['cedula_mod'],
			'id_persona'=>$_POST['id_persona_mod']
			];

			if($_POST['contrasena_mod'] != ''){

				$sql .= ', contrasena = :contrasena';

				$arr['contrasena'] = password_hash($_POST['contrasena_mod'],PASSWORD_BCRYPT);
			}

			$sql.=' where id = :id_usuario;

			UPDATE persona
			set nombres = :nombres, apellidos = :apellidos, cedula = :cedula
			where id = :id_persona;';

			$res = $con -> enviar($sql,
			$arr);
			if($res == 1){
				redireccionar('login','usuarios','upd=1');
			}else{
				redireccionar('login','usuarios','upd=0');
			}
		}

	}

?>