<?php


	class ControllerMain{

		public static function main(){

			switch (ControllerLogin::get_session('privileges')){
				case '0100':{
					self::crear_frase();;
					break;
				}
				case '0010':{
					alert('perfil respondedor');
					break;
				}
				case '0001':{
					self::critico();
					break;
				}
				case '1111':{
					self::critico();
					break;
				}
				
			}
		}
		public static function reaccionar(){//vista

			if(verify_ajax_code('reaccionar')){

				ControllerLogin::protect_actions('ajax');
				$id_usuario = ControllerLogin::get_session('id');
				$con = new Conexion();
				$arr =[
					'id_pubublicacion'=>$_POST['id_pub'],
					'id_usuario'=>$id_usuario,
				];
				
				if(count($con -> extraer('select id, id_publicacion, cod_critica from criticas where id_publicacion = :id_pubublicacion and id_usuario = :id_usuario',$arr))==0){
					
					$arr = ['id_usuario'=>$id_usuario,
					'id_publicacion'=>$_POST['id_pub'],
					'cod_critica'=>$_POST['cod_critica']];
					$con->enviar('insert into criticas (id_publicacion,id_usuario,cod_critica) values (:id_publicacion,:id_usuario,:cod_critica); update criticos set num_criticas = num_criticas+1 where id_usuario = '.$id_usuario,$arr);

				}else{
					
					Database::update('criticas',
					['cod_critica'=>$_POST['cod_critica']],
					['id_usuario'=>['=',$id_usuario],
					'id_publicacion'=>['=',$_POST['id_pub']]]);
					

				}

			}
		}
		public static function creador_frases(){//vista
			if(isset($_GET['frase'])){
				$and_frase = 'and frases.frase like :frase';
				$arr['frase']='%'.$_GET['frase'].'%';
			}else{
				$and_frase = '';
				$arr = null;
			}
			$con = new Conexion();

			$frases = $con -> extraer('select frases.id, frases.id_publicacion, frases.frase, publicaciones.bueno, publicaciones.regular, publicaciones.malo, publicaciones.tipo, imagenes.nombre as imagen from publicaciones left join frases on frases.id_publicacion = publicaciones.id left join imagenes on imagenes.id_publicacion = publicaciones.id where publicaciones.id_usuario = '.ControllerLogin::get_session('id').' '.$and_frase.'  and publicaciones.estado = 1 order by (publicaciones.fecha) desc',
				$arr
				);
			Accion::cargarPagina('main','creador_frases',['frases'=>$frases]);

		}
		public static function guardar_frase(){

			if(verify_code_form('crear_pub')){//Verifico si el code existe y es valido
				if(($_POST['frase']=='') && ($_FILES['adjuntar_imagen']['tmp_name']=='') ){//Si la frase esta vacia es por modificacion del usuario... Sera retrocedido a la pagina nuevamente
					previous_page(['publicacion' => 0]);exit();
				}else{

					$sql_frase = '';
					if($_POST['frase']!=''){
						
						//Verificamos si esta checkeada la opcion de frase como meme
						$tipo = PGSC('como_meme');
						if($tipo==null){//si no esta checkeado, se guardara la publicacion como frase
							$tipo = 'f';
						}else if($tipo == 1){//si esta checkeado, traerá '1' y se guardara la publicacion como meme
							$tipo = 'm';
						}else{//si esta checkeado y trae algo que no sea un 1 es por modificacion del usaurio. Cargará la pagina nuevamente (OJO: no se esta retrocediendo)
							header('Location:'.url('main/creador_frases'));
							exit();
						}
						$arr['frase']=$_POST['frase'];
						$sql_frase = 'insert into frases (id_publicacion,frase) values ((select max(id) as id from publicaciones),:frase);';
					}


					//Hasta ahora se supone que la sentencia sql para esta vacia
					$sql_img='';
					if($_FILES['adjuntar_imagen']['tmp_name']!=''){//Si hay una imagen seteada:
						$file = [
							'file'		=> $_FILES,
							'input_name'=> 'adjuntar_imagen',
							'size'		=> 1048576,
							'type'		=> 'image'
						];//Se definen las validaciones del archivo: tamaño maximo de 1 MB y de mimetype image
						$valid_file = file_validate($file);
						if($valid_file==0){//si el archivo no es una imagen se retrocede con un mensaje 0
							previous_page(['publicacion'=>3]);exit;
						}else if($valid_file==1){//Si el tamaño de la imagen pasa de 1 MB
							previous_page(['publicacion'=>4]);exit;
						}else if($valid_file==2){//Si la imagen es valida
							$sql_img='insert into imagenes (id_publicacion,nombre) values ((select max(id) as id from publicaciones),:nombre_imagen)';//Se añade la sentencia SQL
							$tipo = 'm';//El tipo de publicacion ahora es "meme"
							$arr['nombre_imagen']=$_FILES['adjuntar_imagen']['name'];//Se agrega el parametro de la ejecucion
							move_uploaded_file($_FILES['adjuntar_imagen']['tmp_name'], 'imagenes/'.$_FILES['adjuntar_imagen']['name']);//Se copia la imagen a la carpeta imagenes
						}
					}

					$con = new Conexion();
					if($con -> enviar('insert into publicaciones (id_usuario,fecha,estado,tipo) values ('.ControllerLogin::get_session('id').',"'.date('Y-m-d G-i-s').'",1,"'.$tipo.'");'.$sql_frase.$sql_img,$arr)){
						previous_page(['publicacion'=>1]);
					}else{
						previous_page(['publicacion'=>2]);
					}
				}
			}else{
				alert("The security code hasn't been verified");
			}
		}
		public static function eliminar_frase(){

			if(Database::update(
				'publicaciones',//table
				['estado'=>0],//set
				[ //where
				'id'=>['=',$_GET['frase']],
				'id_usuario'=>['=',ControllerLogin::get_session('id')]

				])){
					previous_page(['del'=>1]);
				}else{
					previous_page(['del'=>0]);

				}
		}


		public static function extraer_memes($pag,$max){
			$pag = ($pag*10);
			$con = new Conexion;
			$id_user = ControllerLogin::get_session('id');
			$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			return $con -> extraer('(select publicaciones.id, publicaciones.fecha, frases.frase, imagenes.nombre as imagen, criticas.cod_critica from publicaciones left join frases on frases.id_publicacion = publicaciones.id left join imagenes on imagenes.id_publicacion = publicaciones.id right join criticas on criticas.id_publicacion = publicaciones.id where criticas.id_usuario = :id_user and publicaciones.tipo = "m" and publicaciones.id <= :max) UNION (select publicaciones.id, publicaciones.fecha,  frases.frase, imagenes.nombre as imagen, null from publicaciones left join frases on frases.id_publicacion = publicaciones.id left join imagenes on imagenes.id_publicacion = publicaciones.id where publicaciones.tipo = "m" and publicaciones.id <= :max_dos and publicaciones.id not in (select publicaciones.id from publicaciones left join frases on frases.id_publicacion = publicaciones.id left join imagenes on imagenes.id_publicacion = publicaciones.id right join criticas on criticas.id_publicacion = publicaciones.id where publicaciones.tipo = "m" and publicaciones.id <= 15)) order by (fecha) desc limit :pag,10',['max'=>$max,'max_dos'=>$max,'pag'=>$pag,'id_user'=>$id_user]);
		}
		public static function critico(){
			$con = new Conexion;
			$max = $con->extraer('select max(publicaciones.id), count(publicaciones.id) from publicaciones left join frases on frases.id_publicacion = publicaciones.id left join imagenes on imagenes.id_publicacion = publicaciones.id where publicaciones.tipo = "m"');

			$frases = self::extraer_memes(0,$max[0][0]);
			Accion::cargarPagina('main','critico',['frases'=>$frases,'pag'=>0,'id_max'=>$max[0][0],'max_pub'=>$max[0][1]]);

		}
		public static function cargar_pubs(){

			//echo json_encode($_GET['pag']+1);
			$frases = self::extraer_memes($_GET['pag']+1,$_GET['id_max']);
			echo json_encode($frases);
		}

	}


?>