<title>Principal</title>

</head>
<body>
	
	<div class="container">

		<div class="row justify-content-center" style="margin-top: 3%;">

			<h3>Prestar Libro</h3>

		</div>

		<div class="row justify-content-center">
			<div class="col-md-6">
				<br>
				<div class="row justify-content-center">
					<input type="text" name="filtro" class="form-control col-md-10" placeholder="Nombre o autor">
					<button class="btn btn-raised btn-primary">Buscar</button>
				</div>
				<div class="row">
					<br><br>
					<div class="col-md-12">
						<div class="row">
							<table class="table table-striped text-center">
								<thead class="thead-dark">
									
									<tr>
										<th>Autor</th>
										<th>Libro</th>
										<th>Prestar</th>
									</tr>
								</thead>
									<tr>
										<td>Autor F</td>
										<td>Libro N</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Autor F</td>
										<td>Libro N</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Autor F</td>
										<td>Libro N</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Autor F</td>
										<td>Libro N</td>
										<td><input type="checkbox"></td>
									</tr>

							</table>
						</div>
						<div class="row justify-content-center">
							<nav aria-label="...">
							  <ul class="pagination">
							    <li class="page-item disabled">
							      <a class="page-link" href="#" tabindex="-1">Previous</a>
							    </li>
							    <li class="page-item"><a class="page-link" href="#">1</a></li>
							    <li class="page-item active">
							      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
							    </li>
							    <li class="page-item"><a class="page-link" href="#">3</a></li>
							    <li class="page-item">
							      <a class="page-link" href="#">Next</a>
							    </li>
							  </ul>
							</nav>
						</div>

					</div>
				</div>
				
			</div>
			<div class="col-md-6">
				
				
					<div class="row justify-content-center">
						
						<div class="card col-md-8" style="padding:0">
							<div class="card-header" style="background: #A26A02;">
								<center>
									
									<b>Libros a Prestar</b>
								</center>
							</div>
							<div class="card-body" >
								<div class="row">
									<div class="col-md-12">
										<input class="form-control" name="cedula_solicitante" placeholder="Solicitante">
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<center>
											
											<ul id="lista-izquierda">
												<li>
													Libro 1
												</li>
												<li>
													Libro 2
												</li>
												<li>
													Libro N
												</li>

											</ul>
										</center>
									</div>
									<div class="col-md-6">
										<center>
												
											<ul id="lista-derecha">
												<li>
													Libro 1
												</li>
												<li>
													Libro 2
												</li>
												<li>
													Libro N
												</li>

											</ul>
										</center>
									</div>

								</div>
							</div>
							<div class="card-footer">
								<center>
									
									<button class="btn btn-raised btn-primary">Prestar</button>
								</center>
							</div>
							
						</div>

					</div>

					
				</div>
			</div>

		</div>
		{{Crear::comun('menu_modal')}}

	</div>

</body>
</html>	  