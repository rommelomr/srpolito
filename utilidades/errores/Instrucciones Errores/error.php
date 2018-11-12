<?php 
	
	if(isset($_GET['err'])){

		if($_GET['err']==null){

			$error = 404;

		}else{
			$error=$_GET['err'];
		}
		//$error guarda el codigo de error (404,403,etc)

		echo 'Error '.$error;
		echo '<br>Si usted esta viendo este mensaje, es por que le falta configurar el manejo de errores del sistema.<br>Dirijase al archivo "Leeme.txt"';

		
		//header('Location:/*inserte aqui la direccion del index del sistema partiendo de la raiz*/index.php?err='.$error);

		//Importante: Antes del nombre del sistema se debe colocar un slash "/". Ejemplo, si el sistema se llama "ETFrameV4" el header quedaria: header('Location:/ETFrameV4/index.php?err='.$error);



	}else{
		echo "error por analizar";
	}

	
?>