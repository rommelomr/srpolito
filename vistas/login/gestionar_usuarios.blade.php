<title>Festival Hallyu Venezuela</title>
</head>
<body>
	<div class="container">

		<div class="row" style="margin-top:15%;">
			<div class="col-md-6">
				<div class="card col-md-10">
					<div class="card-header">
						<center>
							<b>Crear Usuario</b>
						</center>
					</div>
					<div class="card-body">
						<center>
							
							<form>
								<input class="form-et col-md-12" type="text" name="usuario" placeholder="Nombre de Usuario">
								<input class="form-et col-md-12" type="password" name="pass" placeholder="Contraseña">
								<input class="form-et col-md-12" type="password" name="rep_pas" placeholder="Repetir Contraseña">
								<select class="form-et col-md-12">
									<option>Rol</option>
									<option>Root</option>
									<option>Usuario Estandar</option>
								</select>
								<button class="btn btn-raised btn-primary">Registrar</button>
							</form>
						</center>
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="card col-md-10">
					<div class="card-header">
						<center>
							<b>Lista de Usuarios</b>
						</center>						
					</div>
					<div class="card-body">
						
					</div>

				</div>
			</div>
			
		</div>
		{{Crear::comun('menu_modal')}}
	</div>
</body>
</html>	  