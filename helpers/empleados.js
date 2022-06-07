$('#listar-empresas').load('../componentes/empleados/listar_empresas.php');
$('#listado').load('../componentes/empleados/listar.php');
$('#listar-empresasu').load('../componentes/empleados/listar_empresasu.php');

$('#btn-registrar').click(function(){
	primerNombre=$('#txt-primerNombre');
	segundoNombre=$('#txt-segundoNombre');
	paterno=$('#txt-paterno');
	materno=$('#txt-materno');
	fecha=$('#txt-fecha');
	edad=$('#txt-edad');
	sexo=$('#cmb-sexo');
	empresa=$('#cmb-empresa');

	if(!primerNombre.val()){
		avisos('Primer Nombre campo vacio',primerNombre);
	}else if(!segundoNombre.val()){
		avisos('Segundo Nombre campo vacio',segundoNombre);
	}else if(!paterno.val()){
		avisos('Apellido Paterno campo vacio',paterno);
	}else if(!materno.val()){
		avisos('Apellido Materno campo vacio',materno);
	}else if(!fecha.val()){
		avisos('Definir fecha de nacimiento',edad);
	}else if(edad.val()==0){
		avisos('Edad Incorrecta',edad);
	}else if(edad.val()<18){
		avisos('El usuario del servicio debe ser mayor de edad',edad);
	}else if(sexo.val()==0){
		avisos('Seleccione el sexo del usuario',sexo);
	}else if(empresa.val()==0){
		avisos('Seleccione la empresa a la cual pertenece el usuario',empresa);
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
    url: '../controladores/empleados/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#listado').load('../componentes/empleados/listar.php');
    }else{
      alertify.alert(r);
    }
  });
  
}

function capturar(datos){
  d=datos.split('||');
  $('#txt-id').val(d[0]);
  $('#txt-primerNombreu').val(d[1]);
  $('#txt-segundoNombreu').val(d[2]);
  $('#txt-paternou').val(d[3]);
  $('#txt-maternou').val(d[4]);
  $('#txt-fechau').val(d[5]);
  edad=calcular_edad(d[5]);
  $('#txt-edadu').val(edad);
  $('#cmb-sexou').val(d[6]);
  $('#cmb-empresau').val(d[7]);

}

$('#btn-editar').click(function(){
  primerNombre=$('#txt-primerNombreu');
  segundoNombre=$('#txt-segundoNombreu');
  paterno=$('#txt-paternou');
  materno=$('#txt-maternou');
  fecha=$('#txt-fechau');
  edad=$('#txt-edadu');
  sexo=$('#cmb-sexou');
  empresa=$('#cmb-empresau');

  if(!primerNombre.val()){
    avisos('Primer Nombre campo vacio',primerNombre);
  }else if(!segundoNombre.val()){
    avisos('Segundo Nombre campo vacio',segundoNombre);
  }else if(!paterno.val()){
    avisos('Apellido Paterno campo vacio',paterno);
  }else if(!materno.val()){
    avisos('Apellido Materno campo vacio',materno);
  }else if(!fecha.val()){
    avisos('Definir fecha de nacimiento',edad);
  }else if(edad.val()==0){
    avisos('Edad Incorrecta',edad);
  }else if(edad.val()<18){
    avisos('El usuario del servicio debe ser mayor de edad',edad);
  }else if(sexo.val()==0){
    avisos('Seleccione el sexo del usuario',sexo);
  }else if(empresa.val()==0){
    avisos('Seleccione la empresa a la cual pertenece el usuario',empresa);
  }else{
    editar();
  }

})


function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/empleados/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#listado').load('../componentes/empleados/listar.php');
    }else{
      alertify.alert(r);
    }
  });
  
}

function confirmar(id){

  alertify.confirm('Confirmar','Desea Eliminar el Registro ?',
                   function(){
                    eliminar(id);
                   },
                   function(){alertify.error('ACCION CANCELADA')}
                  );
}

function eliminar(id){

  
  $.ajax({
    url: '../controladores/empleados/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#listado').load('../componentes/empleados/listar.php');
    }else{
      alertify.alert(r);
    }
  });
  
}



function avisos(mensaje,campo){

  toastr.error(mensaje);
  campo.css("border","solid 1px red");

}

function solo_letras(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    //tecla para poder borrar
    if (tecla == 8) {
      return true;
  }
    // expresion para generar espacios \s|$
    patron = /[a-z-A-Z-\s|$]/;
    teclaFinal = String.fromCharCode(tecla);
    return patron.test(teclaFinal);
}



function solo_numeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    //tecla para poder borrar
    if (tecla == 8) {
      return true;
  }
  patron = /[0-9]/;
  teclaFinal = String.fromCharCode(tecla);
  return patron.test(teclaFinal);
}



function calcular_edad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();
    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
      edad--;
  }
  return edad;
}

$("#txt-fecha").keyup(function(event) {

  var fecha= $("#txt-fecha").val();
  if(fecha==''){
    $("#txt-edad").val('0');
}else{
 edad=calcular_edad(fecha);
 if(edad<0){
 	$("#txt-edad").val('0');
 }else if(edad>100){
 	$("#txt-edad").val('0');
 }else{
 	$("#txt-edad").val(edad);
 }
 
}
});

$("#txt-fecha").blur(function(event) {

  var fecha= $("#txt-fecha").val();
  if(fecha==''){
    $("#txt-edad").val('0');
}else{
 edad=calcular_edad(fecha);
 if(edad<0){
 	$("#txt-edad").val('0');
 }else if(edad>100){
 	$("#txt-edad").val('0');
 }else{
 	$("#txt-edad").val(edad);
 }
}
});


$("#txt-fechau").keyup(function(event) {

  var fecha= $("#txt-fechau").val();
  if(fecha==''){
    $("#txt-edadu").val('0');
}else{
 edad=calcular_edad(fecha);
 if(edad<0){
  $("#txt-edadu").val('0');
 }else if(edad>100){
  $("#txt-edadu").val('0');
 }else{
  $("#txt-edadu").val(edad);
 }
 
}
});

$("#txt-fechau").blur(function(event) {

  var fecha= $("#txt-fechau").val();
  if(fecha==''){
    $("#txt-edadu").val('0');
}else{
 edad=calcular_edad(fecha);
 if(edad<0){
  $("#txt-edadu").val('0');
 }else if(edad>100){
  $("#txt-edadu").val('0');
 }else{
  $("#txt-edadu").val(edad);
 }
}
});