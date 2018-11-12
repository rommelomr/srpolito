$(function(){
	attr = 1;
	meth = 1;

	$('#agregarAtributo').click(function(){

		$('#atributos').append('<input class="form-control col-6" name="a'+attr+'[nombre]" id="atributo'+attr+'" type="text" placeholder="Nuevo Atributo"></br><input id="attrPrivado'+attr+'" name="a'+attr+'[visibilidad]" type="radio" value="privado" checked>Privado <input id="attrPublico'+attr+'" name="a'+attr+'[visibilidad]" type="radio" value="publico">Público <input id="attrProtegido'+attr+'" name="a'+attr+'[visibilidad]" type="radio" value="protegido">Protegido </br><input id="attrEstatico'+attr+'" name="a'+attr+'[estatico]" type="checkbox" value="1">Estático <input id="set'+attr+'" name="a'+attr+'[set]" type="checkbox" value="1">Crear Set <input id="get'+attr+'" name="a'+attr+'[get]" type="checkbox" value="1">Crear Get</br></br>');
			attr++;

	});
			
	$('#agregarMetodo').click(function(){

		$('#metodos').append('<input class="form-control col-6" name="m'+meth+'[nombre]" id="metodo'+meth+'" type="text" placeholder="Nuevo Método"></br><input id="metodoPrivado'+meth+'" name="m'+meth+'[visibilidad]" type="radio" checked value="privado">Privado <input id="metodoPublico'+meth+'" name="m'+meth+'[visibilidad]" type="radio" value="publico">Público <input id="metodoProtegido'+meth+'" name="m'+meth+'[visibilidad]" type="radio" value="protegido">Protegido</br><input id="metodoEstatico'+meth+'" name="m'+meth+'[estatico]" type="checkbox" value="1">Estático <input id="metodoAbstracto'+meth+'" name="m'+meth+'[abstracto]" type="checkbox" value="abstracto">Abstracto </br></br>');
		meth++;

	});



			
});