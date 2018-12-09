<?php

	
	class Enrutador{
		//Pagina a la que se redireccionará si el usuario no logueado intenta acceder
		//a una pagina privada
		private static $out = ['mod'=>'login','pag'=>'autenticacion'];
		
		private static $default = ['mod'=>'biblioteca','pag'=>'principal'];


		private static $tipo = [

			/*configurar metodos:
			
			0:Páginas Publicas (se puede acceder estando o no logeado)
			1:Páginas a las que se puede acceder solo si se esta logeado
			2:Páginas a las que se puede acceder solo si NO se esta logeado

			Permisos: //Editar
				0: root
				1: usuario estandar
			*/

			'biblioteca'=>[
				'principal'=>[0],
				'prestamos'=>[0],
				'registrar'=>[0],
				'biblioteca'=>[0]

			],
			'login'=>[
				'autenticacion'=>[0],
				'gestionar_usuarios'=>[0],

			],



		];
		public static function cargar(){

			if(PGSC('petAjax')!==0){
				PeticionesAjax::cargar();
			}else if(isset($_GET['err'])){

				Accion::cargarPaginaError();

			}else{

				if(isset($_GET['con'])){

					$controlador = $_GET['con'];
					$metodo = $_GET['pag'];

					if(isset(self::$tipo[$controlador][$metodo][0])){
						$tipoPagina = self::$tipo[$controlador][$metodo][0];
						$controlador = definirControlador($controlador);

						if ($tipoPagina===0){

							$controlador::$metodo();

						}else{

							session_start();

							if(verificarLogin()){

								if($tipoPagina===1){
									$permisos = definirTipoUsuario($_SESSION['permisos']);
									$permisoConsedido = 0;
									$mod=strtolower(substr($controlador,11,strlen($controlador)-10));

									foreach (self::$tipo[$mod][$metodo][1] as $clavePaginas => $valorPaginas) {



										foreach ($permisos as $clavePermisos => $valorPermisos) {
											if($valorPaginas==$valorPermisos){
												$permisoConsedido = 1;
												break;
											}
											
										}
									}

								
									if($permisoConsedido){

										$controlador::$metodo();
									}else{

										Accion::cargarPaginaError(403);
									}
									

								}else if($tipoPagina===2){

									header('Location:./?mod='.self::$default['mod'].'/'.self::$default['pag']);

								}

							}else{
								if($tipoPagina===1){

								header('Location:./?mod='.self::$out['mod'].'/'.self::$out['pag']);

								}else if($tipoPagina===2){

									$controlador::$metodo();
									
								}
							}

						}
					}else{
						header('Location:../?err=404');
					}
					


				}else{
					/*
					FUNCIONAMIENTO DE ESTE ELSE:

					SI EN LA URL NO SE INDICA NI MODULO NI PAGINA, SE COMPROBARÁ LA SESIÓN.

					SI HAY USUARIO LOGEADO SE REDIRECCIONARÁ A LA PAGINA PRINCIPAL SETEADA AL COMIENZO DE ESTA CLASE EN EL ATRIBUTO "DEFAULT".

					SI NO HAY USUARIO LOGEADO SE REDIRECCIONARÁ A LA PAGINA DE SALIDA SETEADA AL COMIENZO DE ESTA CLASE EN EL ATRIBUTO OUT
					*/
					session_start();
					if(verificarLogin()){

						
						$controlador = definirControlador(self::$default['mod']);

						$metodo = self::$default['pag'];

						$controlador::$metodo();

						
					}else{

						$controlador = definirControlador(self::$out['mod']);
						
						$metodo = self::$out['pag'];

						$controlador::$metodo();
					}
				
				}

				if(!((!isset($_GET['var']))||($_GET['var']=='') || (($_GET['var']!='') && (strpos($_GET['var'],'=')===false)))){
				
					$_GET = get_decode($_GET['var']);
				}

			}


		}

		public static function ajax(){

			echo 'Peticion Ajax';
			
		}


 	}

?>