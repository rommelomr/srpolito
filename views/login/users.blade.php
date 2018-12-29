<?php !isset($system)? header('Location:../../'):0;?>
<title>Usuarios</title>
<script src="scripts/users.js"></script>
</head>
<body>
	<div id="fondo"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php
					Crear::alerta('del',[
						0=>['Ha ocurrido un error al eliminar al usuario. Inténtelo de nuevo.'=>'warning'],
						1=>['Usuario eliminado correctamente'=>'success']
					]);
				?>
				<?php
					Crear::alerta('upd',[
						0=>['Ha ocurrido un error al actualizar los datos del usurario. Inténtelo de nuevo.'=>'danger'],
						1=>['Datos actualizados correctamente'=>'success']
					]);
				?>
				<?php
					Crear::alerta('reg',[
						0=>['El usuario no fue creado. Intente crear al usuario nuevamente'=>'#FB7979'],
						1=>['Usuario creado correctamente'=>'#79E5FB']
					]);
				?>
			</div>

		</div>
		<div class="row" style="margin-top: 2%;">
			
			<div  id="sing_up" class="col-md-4">

				<div class="card col-12" style="padding:0;">
					<div class="card-header" style="background: purple; border:none; color:white">
						<h5 id="titulo" align="center"><strong>REGISTRAR USUARIO</strong></h5>	
					</div>
					<div class="card-body col-10 offset-1">
						
						<form method="post" action=".">

							<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required pattern="[a-zA-Z ]{2,20}">

							<input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido" required pattern="[a-zA-Z ]{2,20}">

							<input id="user" class="form-control" type="text" name="user" placeholder="Username" required>

							<input id="password" class="form-control" type="password" name="pass" placeholder="Password" required>

							<input id="rep-password" class="form-control" type="password" placeholder="Repeat Password" required>
							<select id="privileges" class="form-control" name="privileges" style="margin-bottom: 3%;" required>
								<option value="" disabled selected>Permisos</option>
					        	<?php if(PGSC('permisos')[0]=='1111'):?>

									<option value="1111">Root</option>
								
								<?php endif ?>
								<option value="0001">Creador</option>
								<option value="0010">Reaccionador</option>
								<option value="0100">Crítico</option>
							</select>

							{{Crear::send_button('Save','login','sign_up','enviar','btn btn-purple col-12')}}
							
						</form>
					</div>						
				</div>
			</div>

			<div id="consultarUsuario" class="col-md-8">
				
				<table style="text-align:center" class="table table-hover table-striped col-12">
					<thead class="thead-dark">
						
						<tr>
							<th>Estado</th>
							<th>Usuarios</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Permisos</th>
							<th>Opciones</th>
						</tr>
					</thead>
					@forelse($users as $clave => $valor)
						@if($valor['id']!=ControllerLogin::get_session('id'))

							<tr class="bg-light">
						@if($valor['status']==1)
							<td><div style="padding:0;background:#95FF9A;border-radius: 25px 25px 25px 25px">C</div></td>
						@else
							<td><div style="padding:0;background:salmon;border-radius: 25px 25px 25px 25px">X</div></td>
						@endif
							<td>{{$valor['user']}}</td>
							<td>{{$valor['nombre']}}</td>
							<td>{{$valor['apellido']}}</td>
							<td>
								@if($valor['privileges']=='0100')
									{{'Creador'}}
								@elseif($valor['privileges']=='0010')
									{{'Reaccionador'}}
								@elseif($valor['privileges']=='0001')
									{{'Crítico'}}
								@elseif($valor['privileges']=='1111')
									{{'Root'}}
								@endif
							</td>
							
							<td clave="{{$clave}}" id="{{$valor['id']}}" usuario="{{$valor['user']}}" permisos="{{$valor['privileges']}}">

								<button id="{{$valor['id']}}" nombre="{{$valor['nombre']}}" apellido="{{$valor['apellido']}}" user="{{$valor['user']}}" privileges="{{$valor['privileges']}}"  data-toggle="modal" data-target="#edit-user" class="editar btn btn-link fas fa-edit"></button>

								<button id="{{$valor['id']}}" data-toggle="modal" data-target="#delete-user" class="delete btn btn-link fas fa-times-circle"></button>
							</td>
								
							
						</tr>
						@endif
					@empty
					@endforelse
				</table>		
			</div>

		</div>

		
	</div>
	
	<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header" style="margin:1%;padding:1%;">

	        <div class="modal-body">
		        <div class="row">
		        	<div class="co-md-4 offset-md-4">
		        		
			        	<h5 class="col-md-12 modal-title" id="exampleModalLabel">Editar Usuario</h5>
		        	</div>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span class="fa fa-times-circle" ></span>
			        </button>

		        </div>

		    </div>
	      </div>

	      <div class="modal-body">
	      	<form method="post" action="./?mod=login/modificar_usuario">
		      		
		        <input hidden name="id_mod" id="id-mod">
		        <input hidden name="id_persona_mod" id="id-persona-mod">

		        <input name="nombres_mod" id="nombres-mod" class="col-md-8 offset-md-2 form-control" placeholder="Usuario" type="text">

		        <input name="apellidos_mod" id="apellidos-mod" class="col-md-8 offset-md-2 form-control" placeholder="Contraseña" type="text">

		        <input name="cedula_mod" id="cedula-mod" class="col-md-8 offset-md-2 form-control" placeholder="Repetir Contraseña" type="text">
		        <input name="usuario_mod" id="usuario-mod" class="col-md-8 offset-md-2 form-control" placeholder="Usuario" type="text">
		        <input name="contrasena_mod" id="contrasena-mod" class="col-md-8 offset-md-2 form-control" placeholder="Contraseña" type="text">
		        <input id="rep-contrasena-mod" class="col-md-8 offset-md-2 form-control" placeholder="Repetir Contraseña">
		        <div class="row">
		        	
			        <div class="col-md-4 offset-md-2">
			        	
				        <select id="permisos-mod" name="permisos_mod" class="form-control">
				        	<option disabled>Permisos</option>
				        	<?php if(PGSC('permisos')[0]=='1'):?>

								<option value="1111">Root</option>
											
							<?php endif ?>
				        	<option value="0001">Profesor</option>
				        	<option value="0010">Supervisor</option>
				        	<option value="0100">Jefe</option>
				        </select>
			        </div>
			        <div class="col-md-4">
			        	
				        <select id="estado-mod" name="estado_mod" class="form-control">
				        	<option value="1" selected>Activo</option>
				        	<option value="2">Inactivo</option>
				        </select>
			        </div>
		        </div>

		      </div>

		      <div class="modal-footer" style="margin:0;padding:0;">
		        
			      <div class="modal-body">
			        <div class="col-md-4 offset-md-4">

			        	{{Crear::botonEnviarAjax('Guardar','Login','modificar_usuario','guardar','btn btn-primary col-md-12')}}

			        </div>
			      </div>
		      </div>
      	</form>

	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<div class="modal-header" style="margin:0;padding:0;">
		    	<div class="modal-body">
		    		
	    		
		    		<h5 class="text-center">¿Esta seguro que desea eliminar a este usuario?</h5>
		    	</div>
		    	
	    	</div>
	      

		    <div class="modal-body">

		    	
		    	<div class="row">
		    		
		    			<div class="col-md-4 offset-md-2">
		    				<form method="post" action="{{url('login/delete_user')}}">
		    					<input id="send-delete" hidden name="user">
				    			<input type="submit" class="col-md-12 btn btn-primary" value="Aceptar">		    		
		    				</form>
		    			</div>
		    			<div class="col-md-4">

				    		<button data-dismiss="modal" class=" col-md-12 btn btn-danger">Cancelar</button>			    		
		    			</div>
		    	</div>
		    	
		    </div>

	    </div>
	  </div>
	</div>
	{{Crear::comun('menu_modal')}}
</body>
</html>
