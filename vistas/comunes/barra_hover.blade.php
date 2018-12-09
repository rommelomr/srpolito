<style type="text/css">
	#barra-menu{
		opacity: 0;
		background:#A26A02;
		padding:0.5%;
		position:fixed;
		width: 100%;
		left:0;
		bottom:0;
		z-index: 99;
		transition: 0.3s;
	}
	#barra-menu:hover{
		transition: 0.3s;
		opacity: 1;

	}
</style>

<div id="barra-menu">
	<div class="row justify-content-center" style="height: 100%;margin:0;">
			<a href="biblioteca/principal" class="btn btn-light">Inicio</a>
			<a href="login/gestionar_usuarios" class="btn btn-light">Usuarios</a>
			<a href="biblioteca/prestamos" class="btn btn-light">Préstamos</a>
			<a href="biblioteca/registrar" class="btn btn-light">Registrar</a>
			<a href="biblioteca/biblioteca" class="btn btn-light">Biblioteca</a>
	</div>
</div>