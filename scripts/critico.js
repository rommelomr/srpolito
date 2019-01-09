function hecho(a){
	if(a=='banned'){
		location.href = url('login/banned');
	}
}
function error(){
	alert('no funca');
}

function pubs_hecho(a){
	
	var pag = $('#pag');
	var pagina = parseInt(pag.attr('pag'));
	var max_pub = pag.attr('max_pub')
	if(pagina >= Math.floor(max_pub/10)-1){
		$('#ver-mas').remove();
	}
	var div_pubs = $('#pubs-ajax');
	for (var i = a.length - 1; i >= 0; i--) {
		var imagen = '';
		if(a[i]['imagen']!==null){
			imagen = '<div class="row" style="padding:2%">									<div class="col-12">										<center>											<img src="imagenes/'+a[i]['imagen']+'" class="img-fluid" alt="Si no se ve la imagen, informat al administrador del sitio">										</center>									</div>								</div>';
		}

		if(a[i]['cod_critica']!=null){
			if(a[i]['cod_critica']=='b'){
				var color_buena = 'background:#B3FF91;';
			}else{
				var color_buena = 'background:grey;';
			}
			if(a[i]['cod_critica']=='r'){
				var color_regular = 'background:#F4FF87;';
			}else{
				var color_regular = 'background:grey;';
			}
			if(a[i]['cod_critica']=='m'){
				var color_mala = 'background:salmon;';
			}else{
				var color_mala = 'background:grey;';
			}
			if(a[i]['cod_critica']=='d'){
				var color_denunciada = 'background:#FC9C2A;';
			}else{
				var color_denunciada = 'background:grey;';
			}
		}

			
		div_pubs.append('<div class="col-md-8" style="margin:1.5%">				<div class="card">					<div class="row">						<div class="card col-12">							<div class="row" style="padding:2%">								<div class="col-12">									<pre><span style="font-size:5vh;font-family:helvetica">'+a[i]['frase']+'</span></pre>								</div>							</div>															'+imagen+'																<div class="row" style="border:1px solid lightgrey">								<div class="reaccion col-3 buena_'+a[i]['id']+'" reaccion="buena" id_pub="'+a[i]['id']+'" style="padding:0;'+color_buena+'">																		<center>										<button data-toggle="tooltip" data-placement="top" title="Esta buen@" class="btn btn-link" style="height:100%;width:100%;">											<i  class=" far fa-smile-wink fa-2x"></i>																				</button>									</center>																	</div>								<div class="reaccion col-3 regular_'+a[i]['id']+'" reaccion="regular" id_pub="'+a[i]['id']+'" style="padding:0;'+color_regular+'">																		<center>										<button data-toggle="tooltip" data-placement="top" title="Ahí va" class="btn btn-link" style="height:100%;width:100%;">											<i class=" far fa-meh fa-2x"></i>																				</button>									</center>								</div>								<div class="reaccion col-3 mala_'+a[i]['id']+'" reaccion="mala" id_pub="'+a[i]['id']+'" style="padding:0;'+color_mala+'">									<center>										<button data-toggle="tooltip" data-placement="top" title="No me gusta" class="btn btn-link" style="height:100%;width:100%;">											 											<i class=" far fa-frown fa-2x"></i>										</button>									</center>								</div>								<div class="reaccion col-3 denunciar_'+a[i]['id']+'" reaccion="denunciar" id_pub="'+a[i]['id']+'" style="padding:0;'+color_denunciada+'">									<center>										<button data-toggle="tooltip" data-placement="top" title="Denunciar" class="btn btn-link" style="height:100%;width:100%;">											 											<i class=" far fa-tired fa-2x"></i>										</button>									</center>								</div>							</div>						</div>					</div>				</div>			</div>		');
	}
	$('[data-toggle="tooltip"]').tooltip();
	$('.reaccion').off('click');
	$('.reaccion').click(function(e){

		var boton = $(this);
		setear_reacciones(boton);

	});

	var paginacion = $('#pag');
	var pag = parseInt(paginacion.attr('pag'));
	paginacion.attr('pag',pag+1);

}
function pubs_error(){
	alert('no funca');
}
function cargar_pubs(){
	var pagination=$('#pag');
	var pag = pagination.attr('pag');
	var id_max = pagination.attr('id_max');
	ETFGetJson({
		'ajax_dir'	:'pagina',
		'code_id'	:'pagina',
		'pag'		:pagination.attr('pag'),
		'id_max'	:pagination.attr('id_max')
	},pubs_hecho,pubs_error);
}
function setear_reacciones(boton){

	var id_pub=boton.attr('id_pub');
	if(boton.attr('reaccion')=='buena'){

		boton.css('background','#B3FF91');
		$('.regular_'+id_pub).css('background','grey');
		$('.mala_'+id_pub).css('background','grey');
		$('.denunciar_'+id_pub).css('background','grey');

		ETFPost({
			'ajax_dir':'reaccion',
			'code_id':'reaccionar',
			'id_pub':id_pub,
			'cod_critica':'b'

		},hecho,error);
	}else if(boton.attr('reaccion')=='regular'){

		boton.css('background','#F4FF87');
		$('.buena_'+id_pub).css('background','grey');
		$('.mala_'+id_pub).css('background','grey');
		$('.denunciar_'+id_pub).css('background','grey');
		ETFPost({
			'ajax_dir':'reaccion',
			'code_id':'reaccionar',
			'id_pub':id_pub,
			'cod_critica':'r'

		},hecho,error);

	}else if(boton.attr('reaccion')=='mala'){

		boton.css('background','salmon');
		$('.buena_'+id_pub).css('background','grey');
		$('.regular_'+id_pub).css('background','grey');
		$('.denunciar_'+id_pub).css('background','grey');

		ETFPost({
			'ajax_dir':'reaccion',
			'code_id':'reaccionar',
			'id_pub':id_pub,
			'cod_critica':'m'

		},hecho,error);
	}else if(boton.attr('reaccion')=='denunciar'){

		boton.css('background','#FC9C2A');
		$('.buena_'+id_pub).css('background','grey');
		$('.regular_'+id_pub).css('background','grey');
		$('.mala_'+id_pub).css('background','grey');

		ETFPost({
			'ajax_dir':'reaccion',
			'code_id':'reaccionar',
			'id_pub':id_pub,
			'cod_critica':'d'

		},hecho,error);
	}
}
$(function(){
	$('[data-toggle="tooltip"]').tooltip();
	$('#refrescar').click(function(){
		location.href = url('main/critico');
	});
	$('.reaccion').click(function(e){

		var boton = $(this);
		setear_reacciones(boton);

	});

	$(window).scroll(function() {

		if($(window).scrollTop() + $(window).height() == $(document).height()) {
			
			if($('#ver-mas').length!==0){

				cargar_pubs();
			}
		}
	});
	$('#cargar-pubs').click(function(){
		cargar_pubs();
	});

})