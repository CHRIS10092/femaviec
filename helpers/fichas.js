$('#listado').load('../componentes/fichas/listado.php');
$('#listado-empresas').load('../componentes/fichas/listado_empresas.php');
$('#listado-empleados').load('../componentes/fichas/listado_empleados.php');
$('#btn-guardar').click(function(e){
	e.preventDefault();
    discapacidad=document.getElementsByName('discapacidad');
	finicio=$('#txt-fecha-inicio');
	puesto=$('#txt-puesto');
	area=$('#txt-area');
	religion=$('#cmb-religion');
	grupo=$('#txt-sanguineo');
	lateralidad=$('#txt-lateralidad');
	orientacion=$('#cmb-orientacion');
	identidad=$('#cmb-identidad');
	actividad=$('#txt-actividad');

	tipo=$('#cmb-tipo');
	porcentaje=$('#txt-porcentaje');

	empleado=$('#cmb-empleado');

	if(!finicio.val()){
		avisos('fecha de inicio al trabajo campo vacio',finicio);
	}else if(!puesto.val()){
		avisos('puesto de trabajo campo vacio',puesto);
	}else if(!area.val()){
		avisos('area de trabajo campo vacio',area);
	}else if(religion.val()==0){
		avisos('Seleccionar la religion',religion);
	}else if(!grupo.val()){
		avisos('grupo sanguineo campo vacio',area);
	}else if(!lateralidad.val()){
		avisos('lateralidad campo vacio',lateralidad);
	}else if(orientacion.val()==0){
		avisos('Seleccionar la orientacion sexual',orientacion);
	}else if(identidad.val()==0){
		avisos('Seleccionar la identidad de genero',identidad);
	}else if(!actividad.val()){
		avisos('actividad relevante de trabajo campo vacio',actividad);
	}else if(!verificar_discapacidad()){
		avisos('elegir si tiene discapacidad',area);
	}else if(discapacidad[0].checked && tipo.val()==0){
		avisos('elegir el tipo de discapacidad',tipo);
	}else if(discapacidad[0].checked && !porcentaje.val()){
		avisos('porcentaje de discapacidad campo vacio',porcentaje);
	}else if(empleado.val()==0){
		avisos('Seleccionar empleado',empleado);
	}else{
		preguntar();
	}
})

function preguntar(){

	alertify.confirm('Confirmar','Listo para registrar ?',
                   function(){
                    registrar();
                   },
                   function(){alertify.error('ACCION CANCELADA')}
                  );
}

function registrar(){

  datos=$('#frm-servicios').serialize();
  $.ajax({
    url: '../controladores/fichas/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
   
      $('#frm-servicios')[0].reset();
      $('#listado').load('../componentes/fichas/listado.php');
    }else if(r==2){
    	toastr.warning('EL EMPLEADO YA CUENTA CON UNA FICHA OCUPACIONAL');
    }else{
      alertify.alert(r);
    }
  });
  
}


function verificar_discapacidad(){
	discapacidad=document.getElementsByName('discapacidad');
	cont=false;
	for (var i = 0; i < discapacidad.length; i++) {

		if(discapacidad[i].checked){
			cont=true;
		}
		
	}

	return cont;
}

function avisos(mensaje,campo){

	toastr.warning(mensaje);
	campo.css("border","solid 1px red");

}


function listar_empleados(){
	id=$('#cmb-empresa').val();

  $.ajax({
    url: '../componentes/fichas/listado_empleados.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    $('#listado-empleados').html(r);
  });

}


function capturar(id){
	

  $.ajax({
    url: '../componentes/fichas/info_ficha.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    $('#fichas').html(r);
  });

}