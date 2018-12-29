<?php

	/*
	Clase cuyos metodos estáticos son llamados desde los archivos
	HTML para CREAR elementos con configuracion preestablecida.

	*/
	class Crear{


		public static function comun($com){
			Accion::cargarPagina('comunes',$com);
		}

		public static function close_modal($arr){
			/*
				'id' => id del modal
				'content' => Contenido del modal
				'title' => Contenido del titulo
				'id_agree' => id del boton aceptar
			*/
			echo '
			<div class="modal fade" id="'.$arr['id'].'" tabindex="-1" role="dialog" aria-labelledby="'.$arr['id'].'" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div id="'.$arr['id'].'_header" class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">'.$arr['title'].'</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div id="'.$arr['id'].'_body" class="modal-body">
			        '.$arr['content'].'
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
			        <button id="'.$arr['id_agree'].'" type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
			      </div>
			    </div>
			  </div>
			</div>';
		}

		public static function alerta($var,$arr){
			
			if(isset($_COOKIE[code.'_'.$var])){
				foreach ($arr as $indice => $arr){
					if($_COOKIE[code.'_'.$var]==$indice){
						foreach ($arr as $mensaje => $color){
							echo '<div class="et_alert" style="background:'.$color.'; margin:0; border-radius: 5px 5px 5px 5px;" class="col-12 alert"><center>';
							echo $mensaje;
							echo '</center></div>';
						}	
					}
				}
			}
		}
		public static function send_button($nam='Ir',$mod='principal',$pag='index', $id='', $cla=''){

			echo self::botonEnviarSave($nam,$mod,$pag,$id,$cla);
		}

		public static function botonEnviarAjax($nom,$con,$met,$id,$cla){

			echo self::botonEnviarAjaxSave($nom,$con,$met,$id,$cla);

		}
		public static function botonEnviarAjaxSave($nom,$con,$met,$id,$cla){
		//public static function botonEnviarAjaxSave($id,$cla,$con,$met){

			return '<input id="met" hidden value="'.$con.'/'.$met.'">
					<input type="submit" id="'.$id.'"  class="'.$cla.'"value="'.$nom.'">';

		}


		public static function botonEnviarSave($nom='Ir',$mod='principal',$pag='index', $id='', $cla=''){

	
		return "<input name='mod' value='".$mod."/".$pag."' hidden>
				<input type='submit' id='".$id."' class='".$cla."' value='".$nom."'>";

			  
		}
		public static function form_code(){
			

			//1:generar codigo
			srand();
			$codigo=rand();
			//2:guardar en session
			$_SESSION[code.'_code_form']=$codigo;
			//3:encriptar
			$codigo = password_hash($codigo,PASSWORD_BCRYPT);
			//4:imprimir en input hidden
			echo '<input id="_code_form" name="_code_form" hidden value="'.$codigo.'">';
			
		}

	}
?>

