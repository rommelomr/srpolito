<title>Pagina No Encontrada</title>
<link rel="stylesheet" type="text/css" href="utilidades/errores/errEstilos.css">
</head>
<body>
<?php 

	echo "
	<div id='conImaPrincipal'>
		<img id='imaPrincipal' src='utilidades/".Funciones::error(404)."' width='100%' height='100%'".">
	</div>

	";
	//echo Funciones::error404();

?>
	<div id="conPrincipal">
		<center>
			
			<h1 class="letra-grande">¡UPS!</h1>
			<br>
			<h1>La página que está solicitando no ha sido encontrada</h1>
			<br>
			<h3>Para volver a la página principal haz clic aquí</h3>
			<br>

			<form action="." method="post">

			<?php Crear::botonEnviar('Volver','principal','principal','',"btn btn-light"); ?>
				
			</form>
		</center>
		

	</div>

</body>
</html>