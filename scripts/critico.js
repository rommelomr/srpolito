$(function(){
	if($('.et_alert').length!=0){
		setTimeout(function(){
			$('.et_alert').fadeOut(500);
		},3000);
	}
	$('[data-toggle="tooltip"]').tooltip()
	$('.btn-edit').click(function(){

		$('html, body').animate({
			scrollTop:$('#frase').position().top
		},500);

	});

	$('#buscar-frase').keyup(function(a){


		if((a.keyCode == 13)&&(a.target.value!='')){
			location.href = url('main/crear_frase')+'&frase='+$('#buscar-frase').val();
		
		}
	})
	$('#refresh').click(function(){
		location.href = url('main/crear_frase');
	})
	$('.btn-borrar').click(function(e){
		frase_borrar = e.target.id;
		
	})
	$('#confirmar_borrar_frase').click(function(){
		
		location.href = url('main/eliminar_frase')+'&frase='+frase_borrar;
		
		
	})


});