function hecho(data){

	console.log($nombre,$apellido);

}
function error(){

	alert('error');

}
$(function(){

	$('#enviar').click(function(){
	var nombre = $('#nombre').val();
	var apellido = $('#apellido').val();

	datos={
		varNombre:nombre,
		varApellido:apellido
	}
		ETFGet(datos,hecho,error);
	});






	
})