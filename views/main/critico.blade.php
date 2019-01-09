<?php !isset($system)? header('Location:../../'):0;?>
<link rel="stylesheet" href="estilos/critico.css">
<script src="scripts/critico.js"></script>
<title>Principal</title>
</head>
<body>

	<div id="fondo"></div>
	<div class="col-md-4" style="position: fixed;top:1vh;left:85vw">
		
		<button id="refrescar" class="btn btn-radius btn-phan-purple">Refrescar</button>
	</div>
	<div class="card col-2" style="display:none;padding:1%; position: fixed;top:1vh;left:1vw">
		<div class="row justify-content-center">
			<div class="col-12">
				<center>
					<h5>Buscar</h5>
				</center>
					<hr>
					<span><input type="checkbox">Solo no evaluadas</span><br>
			</div>
		</div>
	</div>


	<div class="container">
		{{Crear::ajax_dir([
		'id' => 'reaccion',
		'controller' => 'main',
		'method' => 'reaccionar'
		])}}
		{{Crear::form_code('reaccionar')}}
		<div class="row justify-content-center" id="pubs-ajax">
		@forelse($frases as $clave => $valor)
			<div class="col-md-8" style="margin-bottom:3%;">
				<div class="card">
					<div class="row">
						<div class="card col-12">
							<div class="row" style="padding:2%">
								<div class="col-12">
									<pre><span style="font-size:5vh;font-family:helvetica">{{$valor['frase']}}</span></pre>
								</div>
							</div>
							@if($valor['imagen']!=null)
								<div class="row" style="padding:2%">
									<div class="col-12">
										<center>
											<img src="imagenes/{{$valor['imagen']}}" class="img-fluid" alt="Si no se ve la imagen, informat al administrador del sitio">
										</center>
									</div>
								</div>
							@endif		
							<div class="row" style="border:1px solid lightgrey">
								<div class="reaccion col-3 buena_{{$valor['id']}}" reaccion="buena" id_pub="{{$valor['id']}}" style="padding:0;
									@if($valor['cod_critica']!=null)
										@if($valor['cod_critica']=='b')
											background:#B3FF91;
										@else
											background:grey;
										@endif
									@endif
								">
									
									<center>
										<button data-toggle="tooltip" data-placement="top" title="Esta buen@" class="btn btn-link" style="height:100%;width:100%;">
											<i  class=" far fa-smile-wink fa-2x"></i>
										
										</button>
									</center>
									
								</div>
								<div class="reaccion col-3 regular_{{$valor['id']}}" reaccion="regular" id_pub="{{$valor['id']}}" style="padding:0;
									@if($valor['cod_critica']!=null)
										@if($valor['cod_critica']=='r')
											background:#F4FF87;
										@else
											background:grey;
										@endif
									@endif
								">
									
									<center>
										<button data-toggle="tooltip" data-placement="top" title="Ahí va" class="btn btn-link" style="height:100%;width:100%;">
											<i class=" far fa-meh fa-2x"></i>
										
										</button>
									</center>
								</div>
								<div class="reaccion col-3 mala_{{$valor['id']}}" reaccion="mala" id_pub="{{$valor['id']}}" style="padding:0;
									@if($valor['cod_critica']!=null)
										@if($valor['cod_critica']=='m')
											background:salmon;
										@else
											background:grey;
										@endif
									@endif
								">
									<center>
										<button data-toggle="tooltip" data-placement="top" title="No me gusta" class="btn btn-link" style="height:100%;width:100%;">
											 
											<i class=" far fa-frown fa-2x"></i>
										</button>
									</center>
								</div>
								<div class="reaccion col-3 denunciar_{{$valor['id']}}" reaccion="denunciar" id_pub="{{$valor['id']}}" style="padding:0;
									@if($valor['cod_critica']!=null)
										@if($valor['cod_critica']=='d')
											background:#FC9C2A;
										@else
											background:grey;
										@endif
									@endif
								">
									<center>
										<button data-toggle="tooltip" data-placement="top" title="Denunciar" class="btn btn-link" style="height:100%;width:100%;">
											 
											<i class=" far fa-tired fa-2x"></i>
										</button>
									</center>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		<br>
		
		@empty
		@endforelse
		</div>
		@if($pag+1 < ceil($max_pub/10))
		<div class="row justify-content-center" id="ver-mas">
			<div class="card col-3">
				<div class="card-header">
					<div>
						<center>
						<input hidden pag="{{$pag}}" id_max="{{$id_max}}" max_pub="{{$max_pub}}" id="pag">
						<button id="cargar-pubs" class="btn btn-link">VER MÁS</button>
						</center>
					</div>
				</div>
			</div>
		</div>
			{{Crear::comun('menu_modal')}}
			{{Crear::ajax_dir([
			'id' => 'pagina',
			'controller' => 'main',
			'method' => 'cargar_pubs'
			])}}
			{{Crear::form_code('pagina')}}
		@endif
	</div>
</body>
</html>	  