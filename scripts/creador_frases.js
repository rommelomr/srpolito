
$(function(){
	fade_out_alerts(3000);
	$('[data-toggle="tooltip"]').tooltip();

	$('#adjuntar-imagen').change(function(){
		$('#nombre-imagen').css('display','block');
		var pdrs = document.getElementById('adjuntar-imagen').files[0].name;
    	document.getElementById('info').innerHTML = pdrs;
	});
	$('#eliminar-imagen').click(function(){
		$('#adjuntar-imagen').val('');
		$('#nombre-imagen').css('display','none');
    	document.getElementById('info').innerHTML = '';
	});
	$('.btn-edit').click(function(){

		$('html, body').animate({
			scrollTop:$('#frase').position().top
		},500);

	});

	$('#buscar-frase').keyup(function(a){


		if((a.keyCode == 13)&&(a.target.value!='')){
			location.href = url('main/creador_frases')+'&frase='+$('#buscar-frase').val();
		
		}
	})
	$('#refresh').click(function(){
		location.href = url('main/creador_frases');
	})
	$('.btn-borrar').click(function(e){
		
		frase_borrar = $(this).attr('id_pub');
		
	})
	$('#confirmar_borrar_frase').click(function(){
		
		location.href = url('main/eliminar_frase')+'&frase='+frase_borrar;
		
		
	})


});