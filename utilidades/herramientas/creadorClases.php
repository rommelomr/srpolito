<?php require_once('index.php') ?>

	<script src="scripts/creadorClases.js"></script>
	<link rel="stylesheet" href="estilos/creadorClases.css">

</head>

<body style="background:gainsboro">

		<div class="card-header" style="background:black;">
			<h2 align="center" style="color:gainsboro">Creador de Clases</h2>
		</div>
	<div class="container">
		

		<br>
		<center>
			
		
			<div class="card col-12" style="padding-top:3%; padding-bottom:1%">
				<form method="post" action="clases.php">
					<div class="card-body col-8" style="padding-top:1%; padding-bottom:1%">
						<div class="row">

							<input title="Solo letras mayúsculas y minúsculas sin caracteres especiales ni espacios." class="form-control col-5" id="nombre" name="nombre" type="text" placeholder="Nueva Clase" required pattern="[a-zA-Z]{1,255}">
							<span class="col-2" align="center">Extends</span>
						
							<input class="form-control col-5" id="extends" name="extends" type="text" placeholder="Clase Padre" pattern="[a-zA-Z]{1,255}" title="Solo letras mayúsculas y minúsculas sin caracteres especiales ni espacios.">
						</div>

						
						<div class="col-8" style="margin-top: 3%;">

							<input type="checkbox" name="abstracta">
							Establecer como clase abstracta

						</div>
						
			

					</div>
						
					<hr style="background:grey">

					<div class="card-body" style="padding-top:1%; padding-bottom:1%">

						<div class="row">						
							<div class="col-6" style="padding:1.5%">
								<div id="atributos">

									<h4 style="margin:0;">Atributos</h4>
									<span class="blockquote-footer">por defecto son privados</span>

									<input class="form-control col-6" name="a[nombre]" id="atributo" type="text" placeholder="Nuevo Atributo"><br>

									<input name="a[visibilidad]" id="attrPrivado" type="radio" value="privado" checked>Privado
									<input name="a[visibilidad]" id="attrPublico" type="radio" value="publico">Público
									<input name="a[visibilidad]" id="attrProtegido" type="radio" value="protegido">Protegido</br> 

									<input name="a[estatico]" id="attrEstatico" type="checkbox" value="1">Estático 
									<input name="a[set]" id="set" type="checkbox" value="1">Crear Set 
									<input name="a[get]" id="get" type="checkbox" value="1">Crear Get 
									</br>
									</br>

								</div>
						
								<a class="btn btn-dark col-6" style="color:white" type="submit" id="agregarAtributo">Agregar Nuevo Atributo</a>
								</br>
								</br>
							</div>


							<div class="col-6" style="padding:1.5%">
						

								<div id="metodos">

									<h4 style="margin:0;">Métodos</h4>
									<span class="blockquote-footer">por defecto son privados</span>

									<input class="form-control col-6" name="m[nombre]" id="metodo" type="text" placeholder="Nuevo Metodo"><br>

									<input id="metodoPrivado" name="m[visibilidad]" type="radio" value="privado" checked>Privado
									<input id="metodoPublico" name="m[visibilidad]" type="radio" value="publico">Público
									<input id="metodoProtegido" name="m[visibilidad]" type="radio" value="protegido">Protegido</br>

									<input id="metodoEstatico" name="m[estatico]" type="checkbox" value="1">Estático 
									<input id="metodoPublico" name="m[abstracto]" type="checkbox" value="1">Abstracto
									</br>
									</br>
	
								</div>
								<a class="btn btn-dark col-6" style="color:white" id="agregarMetodo">Agregar Nuevo Método</a></br></br>
							</div>
						</div>

					</div>



				
	
					
					<button class="btn btn-primary">Crear Clase</button>
				</form>
			</div>
		</center>
	</div>

	
	



</body>
</html>

