<?php


	class ControllerMain{

		public static function main(){

			switch (ControllerLogin::get_session('privileges')){
				case '0100':{
					self::crear_frase();;
					break;
				}
				case '0010':{
					alert('perfil reaccionador');
					break;
				}
				case '0001':{
					alert('Perfil Critico');
					break;
				}
				case '1111':{
					alert('Perfil Root');
					break;
				}
				
			}
		}
		public static function crear_frase(){//vista
			if(isset($_GET['frase'])){
				$frase = '%'.$_GET['frase'].'%';
			}else{
				$frase = '%%';
			}
			$con = new Conexion();
			$frases = $con -> extraer('select frases.id, frases.id_publicacion, frases.frase, publicaciones.bueno, publicaciones.regular, publicaciones.malo from frases inner join publicaciones on frases.id_publicacion = publicaciones.id where publicaciones.id_usuario = '.ControllerLogin::get_session('id').' and frases.frase like :frase and publicaciones.estado = 1',
				array('frase'=>$frase)
				);
			Accion::cargarPagina('main','crear_frase',['frases'=>$frases]);

		}
		public static function guardar_frase(){
			if(verify_code_form()){
				if($_POST['frase']==''){
					previous_page(['frase' => 0]);
				}else{
					$con = new Conexion();
					if($con -> enviar('insert into publicaciones (id_usuario,fecha,estado) values ('.ControllerLogin::get_session('id').',"'.date('Y-m-d').'",1);
							insert into frases (id_publicacion,frase,estado) values ((select max(id) as id from publicaciones),:frase,1);',['frase'=>$_POST['frase']])){
						previous_page(['frase'=>1]);
					}else{
						previous_page(['frase'=>2]);
					}
				}
			}
		}
		public static function eliminar_frase(){
			if(Database::update(
				'publicaciones',//table
				['estado'=>0],//set
				['id'=>['=',$_GET['frase'][strlen($_GET['frase'])-1]]])){ //where
					previous_page(['del'=>1]);
				}else{
					previous_page(['del'=>0]);

				}
		}

	}


?>