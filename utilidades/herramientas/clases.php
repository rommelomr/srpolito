<?php

	function dd($par){
		echo '<pre>';
		var_dump($par);
		echo '</pre>';
	}

	$clase= '	';

	if(isset($_POST['abstracta'])){
		$clase.= 'abstract ';
		unset($_POST['abstracta']);
	}

	$nombreClase = ucwords($_POST['nombre']);
	unset($_POST['nombre']);
	
	$clase.= 'class ';
	$clase.= $nombreClase;

	if($_POST['extends']!=''){
		$clase.= ' extends '.$_POST['extends'];
	}
	unset($_POST['extends']);


	$contA=0;
	$contM=0;

	$i=0;
	$j=0;
	foreach ($_POST as $key => $value) {
		if($key[0]==='a'){


			if($_POST[$key]['nombre']!==""){

				switch(isset($_POST[$key]['visibilidad'])){
					case 'publico':{

						$atributos[$i]='public ';
					}
					case 'privado':{
						$atributos[$i]='private ';

					}
					case 'protegido':{
						$atributos[$i]='protected ';

					}

				}

				if(isset($_POST[$key]['estatico'])){

					$atributos[$i].='static ';

				}

				$atributos[$i].='$'.$_POST[$key]['nombre'].';';
				$i++;$contA++;

				if(isset($_POST[$key]['set'])){
					$metodos[$j]='private function set'.ucwords($_POST[$key]['nombre']).'($'.substr($_POST[$key]['nombre'], 0,3).')';

					if(isset($_POST[$key]['estatico'])){

						$metodos[$j].='{self::$'.$_POST[$key]['nombre'].'=$'.substr($_POST[$key]['nombre'],0,3).';}';
					}else{
						$metodos[$j].='{$this->'.$_POST[$key]['nombre'].'=$'.substr($_POST[$key]['nombre'],0,3).';}';
					}


					$j++;$contM++;

				}
				if(isset($_POST[$key]['get'])){

					$metodos[$j]='public function get'.ucwords($_POST[$key]['nombre']).'()';
					if(isset($_POST[$key]['estatico'])){

						$metodos[$j].='{return self::$'.$_POST[$key]['nombre'].';}';
					}else{
						$metodos[$j].='{return $this->'.$_POST[$key]['nombre'].';}';
					}

					$j++;$contM++;

				}


			} 

		}else{
			if($_POST[$key]['nombre']!==""){


				switch(isset($_POST[$key]['visibilidad'])){
					case 'publico':{

						$metodos[$j]='public ';
					}
					case 'privado':{
						$metodos[$j]='private ';

					}
					case 'protegido':{
						$metodos[$j]='protected ';

					}

				}


				$metodos[$j].='function '.$_POST[$key]['nombre'].'(){}';
				$j++;$contM++;


			} 
		}

	}




	if(file_exists('../../clases/'.$nombreClase.'.php')){

		echo 'La clase "'.$nombreClase.'" ya existe.';

	}else{
		echo 'Clase: '.$nombreClase.'</br></br>';
		echo '<strong>Atributos:</strong> </br>';
		if(isset($atributos))
			dd($atributos);
		else
			echo 'nunguno';
		echo '</br>';
		echo '</br><strong>Metodos:</strong> </br>';
		if(isset($atributos))
			dd($metodos);
		else
			echo 'nunguno';

		echo '</br>';

		$file = fopen('../../clases/'.$nombreClase.'.php','w');

			fwrite($file,'<?php'.PHP_EOL);
			fwrite($file,$clase.'{'.PHP_EOL);
			
			if(isset($atributos)){

				foreach ($atributos as $key => $value){

					fwrite($file,'		'.$value.PHP_EOL);
				}
			}
			if(isset($metodos)){

				foreach ($metodos as $key => $value){
				
					fwrite($file,'		'.$value.PHP_EOL);

				}
			}

			fwrite($file,'	}'.PHP_EOL);

			fwrite($file,'?>'.PHP_EOL);


		fclose($file);

		chmod('../../clases/'.$nombreClase.'.php',0777);

		echo '</br><strong>Clase "'.$nombreClase.'" creada correctamente</strong>';
	}

?>