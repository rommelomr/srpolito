<?php

	
	class Router{

		private static $out = ['mod'=>'login','pag'=>'authentication'];
		
		private static $default = ['mod'=>'main','pag'=>'main'];


		protected static $privileges = [

			/*configurar metodos:
			
			0:Páginas Publicoss (se puede acceder estando o no logeado)
			1:Páginas a los que se puede acceder solo si se esta logeado
			2:Páginas a los que se puede acceder solo si NO se esta logeado

			*/

			/*
			Permisos:
				0: root (1111)
				1: Creador de frases (0100)
				2: Respondedor (0010)
				3: Crítico (0001)

			*/
			'login'=>[
				'banned'=>[1],
				'authentication'=>[2],
				'sign_up'=>[1,
							[0]],
				'delete_user'=>[1,
								[0]],
				'edit_profile'=>[1],
				'edit_info_profile'=>[1],
				'users'=>[1,
							[0]],
				'log_in'=>[0],
				'log_out'=>[1]
			],

			'main'=>[
				'main'	=>	[1,
								[0,1,2,3]],
				'creador_frases'=>	[1,
								[0,1]],
				'guardar_frase'	=>	[1,
									[0,1]],
				'eliminar_frase'=>	[1,
									[0,1]],
				'critico'=>	[1,
								[0,3]],
				'reaccionar'=>[1,
								[0,3]],
				'cargar_pubs'=>[1,
								[0,3]],

			]

		];
		public static function cargar(){
			if(isset($_GET['err'])){

				Accion::cargarPaginaError();

			}else{


				$dir = PGSC('mod');

		
				if($dir!==null){

										
					$method=obtenerPagina($dir);
					$con=obtenerModulo($dir);
					$pag_privileges = self::$privileges[$con][$method][0];
					$controller = definirControlador($con);
					if ($pag_privileges===0){

						$controller::$method();

					}else{
						session_start();

						if(ControllerLogin::get_session('user')!==0){
							ControllerLogin::protect_actions();

							if(($controller=='ControllerLogin') && ($method=='log_out') && (ControllerLogin::get_session('status')==2)){

								$controller::$method();

							}else if(ControllerLogin::get_session('status')==2){
								ControllerLogin::banned();exit;
							}
							if($pag_privileges === 1){
								if(!isset(self::$privileges[$con][$method][1])){

									$controller::$method();

								}else{
									$allow_access = self::verify_user_privilges($con,$method);
									if($allow_access){
										$controller::$method();
									}else{
										Accion::cargarPaginaError(403);
									}
									
								}

							}else if($pag_privileges===2){

								header('Location:./?mod='.self::$default['mod'].'/'.self::$default['pag']);

							}

						}else{
							if($pag_privileges===1){

							header('Location:./?mod='.self::$out['mod'].'/'.self::$out['pag']);

							}else if($pag_privileges===2){

								$controller::$method();
								
							}
						}

					}

				}else{
					session_start();
					if(ControllerLogin::get_session('user')!==0){
						ControllerLogin::protect_actions();
						if(ControllerLogin::get_session('status')==2){
							ControllerLogin::banned();exit;
						}
						
						$controller = definirControlador(self::$default['mod']);

						$method = self::$default['pag'];

						$controller::$method();

						
					}else{

						$controller = definirControlador(self::$out['mod']);
						
						$method = self::$out['pag'];

						$controller::$method();
					}
				
				}
			}


		}

		public static function verify_user_privilges($con,$method){
			$privileges = ControllerLogin::get_session('privileges');
			foreach (self::$privileges[$con][$method][1] as $privileges_key => $privileges_value){
				if($privileges[$privileges_value]==1){
					return true;
				}

			}
			return false;
		}


 	}

?>