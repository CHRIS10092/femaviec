$('#listado').load('../componentes/usuarios/listado.php');
$('#listado-roles').load('../componentes/usuarios/listado_roles.php');
$('#listado-rolesu').load('../componentes/usuarios/listado_rolesu.php');
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

function verificar_correo(correo) {
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correo)) {
        return true;
    } else {
        return false;
    }
}

function avisos(mensaje,campo){

  toastr.error(mensaje);
  campo.css("border","solid 1px red");

}

$('#btn-guardar').click(function(){

	nombre=$('#txt-nombre');
	apellido=$('#txt-apellido');
	correo=$('#txt-correo');
	usuario=$('#txt-usuario');
	rol=$('#cmb-rol');

	if(!nombre.val()){
		avisos('Nombre campo vacio',nombre);
	}else if(!apellido.val()){
		avisos('Apellido campo vacio',apellido);
	}else if(!correo.val()){
		avisos('Correo campo vacio',correo);
	}else if(!verificar_correo(correo.val())){

		avisos('El formato del correo es incorrecto',correo);
	}else if(!usuario.val()){
		avisos('Usuario campo vacio',usuario);
	}else if(rol.val()==0){
		avisos('Seleccionar rol del usuario',rol);
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

  datos=$('#frm-usuarios').serialize();
  $.ajax({
    url: '../controladores/usuarios/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-usuario').modal('hide');
      $('#frm-usuarios')[0].reset();
      $('#listado').load('../componentes/usuarios/listado.php');
      $('#listado-roles').load('../componentes/usuarios/listado_roles.php');
    }else if(r==2){
      toastr.warning('El Usuario esta Duplicado');
    }else if(r==3){
      toastr.warning('El Correo Electronico esta Duplicado');
    }else{
      alertify.alert(r);
    }
  });
  
}



function capturar(datos){

	d=datos.split('||');
	$('#txt-id').val(d[0]);
	$('#txt-nombreu').val(d[1]);
	$('#txt-apellidou').val(d[2]);
	$('#txt-correou').val(d[3]);
	$('#txt-usuariou').val(d[4]);
	$('#cmb-rolu').val(d[5]);
  $('#txt-estadou').val(d[6]);

}


$('#btn-editar').click(function(){

	nombre=$('#txt-nombreu');
	apellido=$('#txt-apellidou');
	correo=$('#txt-correou');
	usuario=$('#txt-usuariou');
	rol=$('#cmb-rolu');

	if(!nombre.val()){
		avisos('Nombre campo vacio',nombre);
	}else if(!apellido.val()){
		avisos('Apellido campo vacio',apellido);
	}else if(!correo.val()){
		avisos('Correo campo vacio',correo);
	}else if(!verificar_correo(correo.val())){

		avisos('El formato del correo es incorrecto',correo);
	}else if(!usuario.val()){
		avisos('Usuario campo vacio',usuario);
	}else if(rol.val()==0){
		avisos('Seleccionar rol del usuario',rol);
	}else{
		editar();
	}

})


function editar(){

  datos=$('#frm-usuariosu').serialize();
  $.ajax({
    url: '../controladores/usuarios/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Actualizacion Correcta');
      $('#m-usuariou').modal('hide');
      $('#frm-usuariosu')[0].reset();
      $('#listado').load('../componentes/usuarios/listado.php');
      $('#listado-rolesu').load('../componentes/usuarios/listado_rolesu.php');
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
    url: '../controladores/usuarios/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#listado').load('../componentes/usuarios/listado.php');
    }else{
      alertify.alert(r);
    }
  });
  
}