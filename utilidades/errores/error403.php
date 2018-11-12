<title>Permiso Denegado</title>
<link rel="stylesheet" type="text/css" href="utilidades/errores/errEstilos.css">
</head>
<body>
	<?php 


		echo "
		<div id='conImaPrincipal'>
			<img id='imaPrincipal' src='utilidades/".Funciones::error(403)."' width='100%' height='100%'".">
		</div>

		";

	?>
	<div id="conPrincipal">
		
	<center>
		<p id="menPrincipal" class="letra-grande">¡Permiso Denegado!</p>
	</center>
	<br><br>
	<center>

		<p>
			Ha ingresado a un sitio al que usted no está autorizado.</br>Le recomendamos que regrese a la página principal.
		</p>
		
	</center>
	<br><br>
	<center>
		
		<form action="." method='post'>

			<?php Crear::botonEnviar('Volver','principal','principal','',"btn btn-light") ?>
		</form>

	</center>
		
	</div>

	

</body>
</html>