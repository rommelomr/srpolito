function ETFPost(datos,hecho,error){
	if($('#_code').val()!=undefined){
		datos['code']=$('#_code').val();

	}
	datos['con']=$('#met').val();
	
	$.post("ajax.php",datos).done(hecho).fail(error)

}
function ETFGet(datos,hecho,error){
	if($('#_code').val()!=undefined){
		datos['code']=$('#_code').val();

	}
	
	datos['con']=$('#met').val();

	$.get("ajax.php",datos,hecho).fail(error)

}
function ETFPostJson(datos,hecho,error){
	
	if($('#_code').val()!=undefined){
		datos['code']=$('#_code').val();
	}

	datos['con']=$('#met').val();
	//recibe 'login/prueba'
	$.ajax({
		url:"ajax.php",
		type:'post',
		dataType:'json',
		data:datos,
		success:hecho
	})
	.fail(error)

}
function ETFGetJson(datos,hecho,error){
	
	if($('#_code').val()!=undefined){
		datos['code']=$('#_code').val();

	}
	datos['con']=$('#met').val();
	
	$.ajax({
		url:"ajax.php",
		type:'get',
		dataType:'json',
		data:datos,
		success:hecho
	})
	.fail(error)

}
function soloNumeros(){
	
	$('.soloNumeros').keyup(function (){
    	this.value = (this.value + '').replace(/[^0-9]/g, '');
	});
}
