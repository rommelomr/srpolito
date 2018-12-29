<?php !isset($system)? header('Location:../../'):0;?>
<link rel="stylesheet" href="estilos/critico.css">
<script src="scripts/critico.js"></script>
<title>Principal</title>
</head>
<body>
	<div id="fondo"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				{{Crear::alerta('del',[
					'0'=>['La frase no se pudo eliminar. Intentalo de nuevo'=>'salmon'],
					'1'=>['Frase Eliminada'=>'#C079FB']
				])}}
			</div>
		</div>
		<div class="row justify-content-center" id="contenedor-cuadro-botones">
			<div class="col-md-6">
				<div id="contenedor-cuadro-texto" class="card col-12">
					{{Crear::alerta('frase',[
						'0'=>['Debes escribir una frase que enviar'=>'salmon'],
						'1'=>['Frase registrada'=>'#C079FB'],
						'2'=>['Ha ocurrido un error inesperado, intentalo de nuevo'=>'salmon']
					])}}
					<form method="post">
						<textarea name="frase" id="frase" class="form-et col-12" rows="5" placeholder="Frase"></textarea>
						{{Crear::form_code()}}
						{{Crear::send_button('Enviar','main','guardar_frase','enviar','btn btn-radius btn-phan btn-phan-purple col-6 offset-3')}}
					</form>
				</div>
			</div>
		</div>
		<div class="row justify-content-center" style="margin-top:1%">
				
				<div class="col-md-6">
			    	<input id="buscar-frase" data-toggle="tooltip" data-placement="right" title="Pulsa enter para buscar la frase" class="form-et col-12" type="text" id="search" placeholder="Busca una frase">
				</div>
		</div>
		@if(isset($_GET['frase']))
			<div class="row justify-content-center" style="margin-top:1%">
				<div class="col-md-6">
					<center>
						<button style="color:white" id="refresh" class="btn btn-radius btn-phan-purple">Vaciar Búsqueda</button>
					</center>
				</div>
			</div>
		@endif
			@forelse($frases as $clave => $valor)
		<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="card" style="padding:0">
						<div class="card-body col-12 border" style=";padding:0%">
							<button style="padding:0" class="btn btn-link" data-toggle="modal" data-target="#borrar_frase"><i id="{{'borrar_'.$valor['id_publicacion']}}" data-toggle="tooltip" data-placement="top" title="Eliminar Frase" style="color:salmon" class="btn-borrar fas fa-trash-alt fa-2x"></i></button>
							<button style="padding:0" class="btn-edit btn btn-link"><i data-toggle="tooltip" data-placement="top" title="Editar frase" style="color:#50C5DD" class="fas fa-pen fa-2x"></i></button>

							<button id="{{$valor['id_publicacion']}}" style="color:purple;float:right" class="btn btn-link">Ver Comentarios</button>

						</div>
						<div class="card-body"  style="padding:0;">
							<div class="col-12">
								
							<div class="row" style="padding:0;">
								
								<div class="col-6 border-right" style="padding-top:2%;padding-bottom:2%;">

									<center><pre><span class="font">{{$valor['frase']}}</span></pre></center>
								</div>
								<div data-toggle="tooltip" data-placement="top" title="Buena frase" class="col-2 border" style="padding:0">
								<center>
									<div style="background:#B3FF91"><i class="far fa-smile-wink fa-2x"></i></div>
									<div style="padding:6%;">N%</div>
								</center>
								</div>
								<div data-toggle="tooltip" data-placement="top" title="Ahí va" class="col-2 border" style="padding:0">
									<center>
										<div style="background:#F4FF87"><i class="far fa-meh fa-2x"></i></div>
										<div style="padding:6%;">N%</div>
									</center>
								</div>
								<div data-toggle="tooltip" data-placement="top" title="Puedes hacerlo mejor" class="col-2 border" style="padding:0">
									<center>
										<div style="background: salmon"><i class="far fa-tired fa-2x"></i></div>
										<div style="padding:6%;">N%</div>
									</center>
								</div>
							</div>
							</div>

						</div>
					</div>
				</div>
		</div>
				<br>
			@empty
			<div class="row justify-content-center">	
				<div class="col-md-4">	
					<div class="card">		
					<center>
							No hay frases para mostrar
					</center>
					</div>

				</div>
			</div>

		@endforelse

	</div>
	{{Crear::comun('menu_modal')}}
	{{Crear::close_modal([
		'id'=>'borrar_frase',
		'title'=>'Esta a punto de borrar esta frase',
		'content'=>'¿Está seguro de que desea borrarla?',
		'id_agree'=>'confirmar_borrar_frase'

	])}}
</body>
</html>	  