<?php !isset($system)? header('Location:../../'):0;?>
<title>Principal</title>
</head>
<body>
	<div class="container">

		<div class="row" style="margin-top:5%;">
			<div class="col-md-6">
				
				<table class="table">
					<thead class="thead-dark">
						
						<tr>
							<th>Solicitante</th>
							<th>Prestador</th>
							<th>Libros</th>
						</tr>
					</thead>
					<tr>
						<td>Nombre Solicitante</td>
						<td>Nombre Prestador</td>
						<td><button class="btn btn-raised btn-primary">Ver</button></td>
					</tr>
					<tr>
						<td>Nombre Solicitante</td>
						<td>Nombre Prestador</td>
						<td><button class="btn btn-raised btn-primary">Ver</button></td>
					</tr>

				</table>
			</div>
			<div class="col-md-6">
				<div class="card" style="padding:0">
					<div class="card-header" style="background: #A26A02;">
						<center>
							<b>Datos del Prestamo</b>
						</center>
					</div>
					<div class="card-body">
						<div class="row justify-content-center">
								
								<b>Código del préstamo:</b> 1234
							
						</div>
						<div class="row justify-content-center">
							<div class="col-md-6">
								<br><b>Solicitante:</b> Nombre
								<br><b>Cedula:</b> 25594817
								
								
							</div>
							<div class="col-md-6">

								<br><b>Prestador:</b> Nombre
								<br><b>Cedula:</b> 25594817

							</div>
						</div>
						<hr>
						<div class="row justify-content-center">
							<b>Libros:</b><br>
						</div>
						<hr>
						<div class="row justify-content-center">
							<div class="col-10">
									
								<table class="table table-bordered">
									<thead class="thead-dark">
										
										<tr>
											<th>Código</th>
											<th>Nombre</th>
											<th>Autor</th>
											<th>Estado</th>
										</tr>
									</thead>
									</tr>
									<tr class="table-warning">
										<td>8</td>
										<td>Biblia</td>
										<td>Dios</td>
										<td>Pendiente</td>
									</tr>
									<tr class="table-success">
										<td>1</td>
										<td>Harry Potter Y la Piedra Filosofal</td>
										<td>J. K. Rowling</td>
										<td>Entregado</td>
									<tr class="table-warning">
										<td>9</td>
										<td>Buscando a Alaska</td>
										<td>Jhon Green</td>
										<td>Pendiente</td>
									</tr>

								</table>
							</div>
						</div>
					</div>

					
				</div>
			</div>

		</div>
	</div>
</body>
</html>	  