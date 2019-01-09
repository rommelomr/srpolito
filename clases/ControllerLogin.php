<?php
	class ControllerLogin{
		public static function banned(){
			Accion::cargarPagina('login','banned');
			
		}
		public static function authentication(){
			Accion::cargarPagina('login','authentication');
		}

		public static function edit_info_profile(){

			if($_POST['user']==''){
				previous_page(['up'=>2]);//Nombr de usuario vacio
				exit;
			}
			$con = new Conexion;
			$user = $_POST['user'];
			$pass = '';

			$arr = array(
					'active_user' => ControllerLogin::get_session('user'),
					'user' => $_POST['user'],
				);

			if($_POST['pass']!=''){
				$pass = ', pass = :pass';
				$arr['pass'] = password_hash($_POST['pass'],PASSWORD_BCRYPT);
			}

			if($con -> enviar('update users set  user = :user'.$pass.' where user = :active_user',$arr)){
				self::safe_session('user',$_POST['user']);
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
		public static function safe_session($key,$val,$pos=null){
			if($pos!=null){

				$_SESSION[code.'_'.$key][$pos] = $val;
			}else{

				$_SESSION[code.'_'.$key] = $val;
			}
		}
		public static function get_session($key,$pos=null){

			if (isset($_SESSION[code.'_'.$key])){
				if($pos!==null){

					return $_SESSION[code.'_'.$key][$pos];
				}
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
		public static function protect_actions($ret=''){

			//seteo la hora actual (la hora a la que se ralizó la accion)
			$current_hour = new DateTime(date('H:i:s'));

			//obtengo la hora de la ultima accion
			//dd($acum_intervals->format('H:i:s'));
			$hour_last_action = new DateTime(self::get_session('actions',0));

			$action_count = self::get_session('actions',2);
			
			//a la hora actual le resto la hora de la ultima accion para obtener la diferencia de tiempo entre una y otra
			$difference_interval = $current_hour->diff($hour_last_action);
			
			$difference_interval = explode(':',$difference_interval->format('%H:%I:%S'));
			
			$acum_intervals = new DateTime(self::get_session('actions',1));

			$acum_intervals->modify('+'.$difference_interval[0].' hours');
			$acum_intervals->modify('+'.$difference_interval[1].' minute');
			$acum_intervals->modify('+'.$difference_interval[2].' second');
			if($action_count==10){
				if(strtotime($acum_intervals->format('H:i:s'))<=strtotime('00:00:40')){
					self::safe_session('status',2);
					$con = new Database;
					if($con->update('users',
										['status'=>2],
										['id'=>['=',self::get_session('id')]])){
						if($ret=='ajax'){
							echo 'banned';
						}else{

							echo json_encode('banned');
						}
					}
				
					self::safe_session('actions',[$current_hour->format('H:i:s'),'00:00:00',0]);
				}else{
					self::safe_session('actions',[$current_hour->format('H:i:s'),'00:00:00',0]);
				}
			}else{

				$action_count++;
				self::safe_session('actions',[$current_hour->format('H:i:s'),$acum_intervals->format('H:i:s'),$action_count]);
			}
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
						self::safe_session('actions',[date('H:i:s'),'00:00:00',0]);

						header('Location:.');


					}else{

						header('Location:'.url('login/authentication').'&log=2');
						
					}
				}else{

					header('Location:'.url('login/authentication').'&log=1');
					
				}
			}else{

				header('Location:'.url('login/authentication').'&log=0');
			}

		}
		public static function sign_up(){
			$arr = [
				'nombre'=>$_POST['nombre'],
				'apellido'=>$_POST['apellido'],
				'user'=>$_POST['user'],
				'pass'=>password_hash($_POST['pass'],PASSWORD_BCRYPT),
				'privileges'=>$_POST['privileges'],
				'created_at'=>date('Y-m-d'),
				'status'=>1
				];
			if($_POST['privileges']==='0100'){
				$tabla = 'creadores_frases';
			}else if($_POST['privileges']==='0010'){
				$tabla = 'respondedores';
			}else if($_POST['privileges']==='0001'){
				$tabla = 'criticos';
				
			}

			$con = new Conexion();
			if($con -> enviar('insert into users (nombre,apellido,user,pass,privileges,status,created_at) values(:nombre,:apellido,:user,:pass,:privileges,:status,:created_at); insert into '.$tabla.' (id_usuario) values((select max(id) as id from users))',$arr)){
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