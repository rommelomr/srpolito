<title>Iniciar Sesion</title>
<link rel="stylesheet" href="estilos/autenticacion.css">
</head>
<body>
	<div id="fondo"></div>
	<div class="container-fluid">

		<div class="row">

			<div id="card-login" class="col-md-4 offset-md-4 card">

				<div id="cajaLogin" class="align-middle col-md-10 offset-md-1">
					
					<center>
						<h2>Iniciar Sesión</h2>
						
						<form method='post'>
							<div class="form-group">
								
								<input class="form-et col-8" type="text" maxlength="15" name="usuario" placeholder="Usuario">
							
								<input class="form-et col-8" type="password" maxlength="255" name="contrasena" placeholder="Contraseña">

								<input hidden name="prov" value="index">

								{{Crear::send_button('Ingresar','login','log_in','enviar','btn btn-purple col-md-8 form-control')}}
									
							</div>
						</form>
						{{Crear::alerta('status',[
							'0'=>['Estimado Usuario, su cuenta se encuentra suspendida'=>'#FB7979']
						])}}
						{{Crear::alerta('log',[
							'2'=>['Contraseña Incorrecta'=>'#FBEB79'],
							'1'=>['Usuario no registrado'=>'#FBEB79'],
							'0'=>['Los datos ingresados no son correctos'=>'#FBEB79']
						])}}
					</center>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
