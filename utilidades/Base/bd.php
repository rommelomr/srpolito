<?php 

	//La informacion recibida desde el index es recibida por POST.

	$info = $_POST['info'];
	echo "esta es la pagina dos del modulo base <br>";
	echo 'La info recibida del index es: '.$info;

	

	//Para hacer el ejemplo de la conexion a la base de datos debe crear una base de datos llamada "prueba", con una tabla llamada "tablaPrueba" la cual tenga dos atributos a y b (preferiblemente de tipo varchar). El usuario y contraseña deben ser los que estan seteados en el archivo "config.ini"

	//$con = new Conexion();
	//echo $con->enviar("insert into tablaPrueba values ('$info','$info')");


?>