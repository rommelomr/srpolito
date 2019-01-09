function set_data(data){
	var suf = '';
	if(data['code_id']!=undefined){
		var suf = '_'+data['code_id'];
	}
	if($('#_code_form'+suf).val()!=undefined){
		data['code']=$('#_code_form'+suf).val();
	}
	var ajax_dir = $('#'+data['ajax_dir']);
	data['controller']=ajax_dir.attr('controller');
	data['method']=ajax_dir.attr('method');
	return data;
}
function ETFPost(data,done_function,error_function){
	data = set_data(data);
	$.post("ajax.php",data).done(done_function).fail(error_function)

}
function ETFGet(data,done_function,error_function){

	data = set_data(data);

	$.get("ajax.php",data,done_function).fail(error_function)

}
function ETFPostJson(data,done_function,error_function){
	
	data = set_data(data);
	$.ajax({
		url:"ajax.php",
		type:'post',
		dataType:'json',
		data:data,
		success:done_function
	})
	.fail(error_function)

}
function ETFGetJson(data,done_function,error_function){
	data = set_data(data);
	$.ajax({
		url:"ajax.php",
		type:'get',
		dataType:'json',
		data:data,
		success:done_function
	})
	.fail(error_function);
}
function soloNumeros(){
	
	$('.soloNumeros').keyup(function (){
    	this.value = (this.value + '').replace(/[^0-9]/g, '');
	});
}
function url(dir){

	return './?mod='+dir;
}
function fade_out_alerts(time){
	if($('.et_alert').length!=0){
		setTimeout(function(){
			$('.et_alert').fadeOut(600);
		},time);
	}
}