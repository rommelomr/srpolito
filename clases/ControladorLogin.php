<?php

	class ControladorLogin{

		private $user = [	//por defecto acepta letras, numeros, punto, guión y piso
							'min'=>6,
							'max'=>20,
							'ndd'=>'a,1,*'//necesarios: al menos una letra, un numero y un simbolo
						];
		private $pass = [	//por defecto acepta letras, numeros, punto, guión y piso
							'min'=>6,
							'max'=>255,
							'ndd'=>'a,1,*'//necesarios: al menos una letra, un numero y un simbolo
						];

		public static function autenticacion(){

			Accion::cargarPagina('login','autenticacion');
		}
		
		public static function gestionar_usuarios(){

			Accion::cargarPagina('login','gestionar_usuarios');
		}
		
		public static function usuarios(){

			$usuarios = self::extraerUsuarios();

			Accion::cargarPagina('login','usuarios',['usuarios'=>$usuarios]);
		}

		public static function cerrarSesion(){

			session_start();	
			session_destroy();
			header('Location:.');

		}
		private function validar_login(){

		}
		public static function iniciarSesion(){

			$user[] =PGSC('usuario');
			$user[] =PGSC('contrasena');

			if((validarCampoUsuario($user[0]))&&($user[0]!=="")&&($user[1]!=="") ){

				$usuario = new Usuario($user[0],$user[1]);
				$datos = $usuario->extraerUsuario();

				if($datos!=0){

					if($usuario->verificarContrasena($datos[0]['contrasena'])){


						session_start();
						$_SESSION['id']=$datos[0]['id'];
						$_SESSION['usuario']=$datos[0]['usuario'];
						$_SESSION['contrasena']=$datos[0]['contrasena'];
						$_SESSION['permisos']=$datos[0]['permisos'];
						$_SESSION['estado']=$datos[0]['estado'];


						header('Location:.');


					}else{

						header('Location:./?log=2');
					}
				}else{

					header('Location:./?log=1');
					
				}
			}else{

				header('Location:./?log=0');

			
			}

		}
		public static function registrarUsuario(){


			$Persona = new Persona($_POST['nombres'],$_POST['apellidos'],$_POST['cedula'],$_POST['sexo']);
			
			$Usuario = new Usuario($_POST['usuario'],$_POST['contrasena'],$_POST['permisos'],1);

			unset($_POST);
			
			if (($Usuario->crearUsuario())&&($Persona->crearPersona())){
				echo '<script>alert("Usuario creado")</script>';
			}else{
				echo '<script>alert("Usuario no creado")</script>';
			}
			self::usuarios();

		}
		
		public function extraerUsuarios(){

			$con = new Conexion();
			return $con->extraer('select * from usuario');			

		}



	}

?>