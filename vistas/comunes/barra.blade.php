<button id="menu" class="btn btn-raised btn-light" style="color:black;border-radius:20px 20px 20px 20px;position: fixed; left:0;bottom:0;z-index: 100"> 
	<b>E</b>
</button>
<div id="barra-menu" hidden style="background: #A26A02; padding:0.5%; position: fixed;width: 100%;left:0;bottom:0;z-index: 99">
	<div class="row justify-content-center" style="height: 100%;margin:0;">
			<a href="biblioteca/principal" class="btn btn-light">Inicio</a>
			<a href="login/gestionar_usuarios" class="btn btn-light">Usuarios</a>
			<a href="biblioteca/prestamos" class="btn btn-light">Préstamos</a>
			<a href="biblioteca/registrar" class="btn btn-light">Registrar</a>
			<a href="biblioteca/biblioteca" class="btn btn-light">Biblioteca</a>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('#menu').click(function(){
			var barra =$('#barra-menu');
			if(barra.attr('hidden')){
				barra.attr('hidden',false);
			}else{
				barra.attr('hidden',true);

			}
		});
	});
</script>