<div class="dropdown">

  	<button class="btn btn-secundary btn-raised dropdown-toggle" type="button" id="dropdownNavBar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo PGSC('usuario');?>
  	</button>

	<div class="dropdown-menu" aria-labelledby="dropdownNavBar">
		
		<a align="center" class="dropdown-item" href="./?mod=principal/principal">Principal</a>

		<?php if((PGSC('permisos')[0]=='1') or (PGSC('permisos')[1]=='1')):?>
			<a align="center" class="dropdown-item" href="./?mod=login/usuarios">Usuarios</a>
		<?php endif ?>

		<a align="center" class="dropdown-item" href="./?mod=login/cerrarSesion">Cerrar Sesión</a>

	</div>
</div>