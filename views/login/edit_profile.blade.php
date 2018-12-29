<?php !isset($system)? header('Location:../../'):0;?>
<link rel="stylesheet" href="estilos/edit_profile.css">
<title>Editar Perfil</title>
</head>
<body>	
	<div id="fondo"></div>
	<div class="container-fluid">
		
		<div id="message" class="row justify-content-center">
			<div class="col-md-4" style="color:black">
				
				<?php
					Crear::alerta('up',[
						0=>['Ha ocurrido un error al actualizar tus datos. Inténtelo de nuevo.'=>'#FB7979'],
						1=>['Cambios realizados correctamente'=>'#C079FB']
					]);
				?>
			</div>
		</div>
		<div class="row" style="margin-top: 1%;">
		
			<div id="card-login" class="col-md-4 offset-md-4 card">
	
				<div class="align-middle col-md-10 offset-md-1">
					
					<center>
						<h2>Mi Perfil</h2>
						<hr>
						<form method='post'>
							<div class="form-group">
								
								<input class="form-et col-8" type="text" maxlength="20" name="user" placeholder="Usuario" value="{{$datos[0]['user']}}">
							
								<input class="form-et col-8" type="text" maxlength="20" name="nombre" placeholder="Nombre" value="{{$datos[0]['nombre']}}">
								
								<input class="form-et col-8" type="text" maxlength="20" name="apellido" placeholder="Usuario" value="{{$datos[0]['apellido']}}">

								<input class="form-et col-8" type="password" name="pass" placeholder="Contraseña">

								<input class="form-et col-8" type="password" placeholder="Repetir Contraseña">

								<hr>
								{{Crear::send_button('Guardar Cambios','login','edit_info_profile','enviar','btn btn-purple col-md-8 form-control')}}
									
							</div>
						</form>

					</center>
				</div>
			</div>
		</div>
	</div>
	{{Crear::comun('menu_modal')}}
	
</body>
</html>
