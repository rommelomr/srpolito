function funciona(data){

	console.log(data);

}
function error(){

	window.location.reload();
}

$(function(){


	$('#enviar').click(function(){


		if ($('#nombres').val()=='') {

			alertify.alert('El campo Nombres no puede estar vacio');

		}else if ($('#apellidos').val()==''){
			
			alertify.alert('El campo Apellidos no puede estar vacio');

		}else if ($('#cedula').val()==''){
			
			alertify.alert('El campo Cedula no puede estar vacio');

		}else if ($('#sexo').val()=='0'){
			
			alertify.alert('El campo Sexo no puede estar vacio');

		}else if ($('#usuario').val()==''){
			
			alertify.alert('El campo usuario no puede estar vacio');

		}else if ($('#contrasena').val()==''){

			alertify.alert('Debe especificar una contraseña');

		}else if ($('#repContrasena').val()==''){

			alertify.alert('Las contraseñas no coinciden');

		}else{

			permisos = $('#permisos').val();
			datos={
				varUsuario:usuario,
				varContrasena:contrasena,
				varPermisos:permisos
			};
			
			ETFPost(datos,funciona,error);
		}

	});

});