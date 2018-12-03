<?php

	/*
	Clase cuyos metodos estáticos son llamados desde los archivos
	HTML para CREAR elementos con configuracion preestablecida.

	*/
	class Crear{


		public static function comun($com){
			Accion::cargarPagina('comunes',$com);
		}

		

		public static function botonEnviar($nom='Ir',$mod='principal',$pag='index', $id='', $cla=''){

			echo self::botonEnviarSave($nom,$mod,$pag,$id,$cla);
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
		public static function code(){
			

			//1:generar codigo
			$codigo=self::codigoRandom();
			//2:guardar en session
			$_SESSION['etCodeForm']=$codigo;
			//3:encriptar
			$codigo = password_hash($codigo,PASSWORD_BCRYPT);
			//4:imprimir en input hidden
			echo '<input id="_code" hidden value="'.$codigo.'">';
			
		}
		public static function codigoRandom(){

			$cad = '';
			$ite = rand(15,20);
			for ($i=0; $i < $ite; $i++) { 
				# code...
				$min = chr(rand(97,122));
				$may = chr(rand(65,90));
				$num = rand(0,9);
				$rand = rand(0,5);
				switch($rand){
					case 0:{

						$cad.= $min.$num.$may;
						break;
					}
					case 1:{

						$cad.= $min.$may.$num;
						break;
					}
					case 2:{

						$cad.= $num.$min.$may;
						break;
					}
					case 3:{

						$cad.= $num.$may.$min;
						break;
					}
					case 4:{

						$cad.= $may.$num.$min;
						break;
					}
					case 5:{

						$cad.= $may.$min.$num;
						break;
					}



				}
			}
			return $cad;
		}	
	}
?>

