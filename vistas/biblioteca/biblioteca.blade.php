<?php !isset($system)? header('Location:index.php?err=403'):0;?>
<title>Biblioteca</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center" style="padding:5%;">
				
			<div class="col-md-4">
				<input class="form-control" type="text" name="busqueda" placeholder="Nombre/Autor/Numero de Páginas/Categoría">
			</div>
			<div class="col-md-2">
				<button class="col-12 btn btn-raised btn-primary">Buscar</button>
			</div>

		</div>
		<div class="row justify-content-center">

			<table class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Autores</th>
						<th>Páginas</th>
						<th>Categorias</th>
						<th>Estado</th>

					</tr>
					
				</thead>
				<tbody>
					<tr class="table-warning">
						<td>1</td>
						<td>Harry Potter y El Prisionero de Askaban</td>
						<td>J.K. Rowling</td>
						<td>250</td>
						<td>Ciencia Ficción</td>
						<td>Prestado (Rommel Montoya)</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Biblia</td>
						<td>Dios</td>
						<td>5000</td>
						<td>Espiritualidad</td>
						<td>En Estante</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Los Negocios en la Era Digital</td>
						<td>Bill Gates</td>
						<td>640</td>
						<td>Negocios</td>
						<td>En Estante</td>
					</tr>
					<tr class="table-warning">
						<td>4</td>
						<td>Buscando a Alaska</td>
						<td>Jhon Gren</td>
						<td>320</td>
						<td>Romance</td>
						<td>Prestado (Cesar Bracho)</td>
					</tr>

				</tbody>
				
			</table>
			
		</div>
		{{Crear::comun('menu_modal')}}
	</div>
</body>
</html>	  