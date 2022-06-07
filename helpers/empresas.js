$('#listado').load('../componentes/empresas/listar.php');

$('#btn-registrar').click(function(){
	ruc=$('#txt-ruc');
    nombre=$('#txt-nombre');
    ciudad=$('#cmb-ciudad');

    if(!ruc.val()){
    	avisos('Ruc campo vacio',ruc);
    }else if(!verificar_ruc(ruc.val())){
    	avisos('El ruc es incorrecto',ruc);
    }else if(!nombre.val()){
    	avisos('Nombre campo vacio',nombre);
    }else if(ciudad.val()==0){
    	avisos('Seleccione una ciudad',ciudad);
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
    url: '../controladores/empresas/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#listado').load('../componentes/empresas/listar.php');
    }else if(r==2){
      toastr.warning('Registro Duplicado');
    }else{
      alertify.alert(r);
    }
  });
  
}

function capturar(datos){
  d=datos.split('||');
  $('#txt-id').val(d[0]);
  $('#txt-rucu').val(d[1]);
  $('#txt-nombreu').val(d[2]);
  $('#cmb-ciudadu').val(d[3]);
}

$('#btn-editar').click(function(){
	ruc=$('#txt-rucu');
    nombre=$('#txt-nombreu');
    ciudad=$('#cmb-ciudadu');

    if(!ruc.val()){
    	avisos('Ruc campo vacio',ruc);
    }else if(!verificar_ruc(ruc.val())){
    	avisos('El ruc es incorrecto',ruc);
    }else if(!nombre.val()){
    	avisos('Nombre campo vacio',nombre);
    }else if(ciudad.val()==0){
    	avisos('Seleccione una ciudad',ciudad);
    }else{
    	editar();
    }
})

function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/empresas/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#listado').load('../componentes/empresas/listar.php');
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
    url: '../controladores/empresas/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#listado').load('../componentes/empresas/listar.php');
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

function verificar_ruc(documento) {

	var ruc=documento.substring(10,0);
  if (typeof(ruc) == 'string' && ruc.length == 10 && /^\d+$/.test(ruc)) {
    var digitos = ruc.split('').map(Number);
    var codigo_provincia = digitos[0] * 10 + digitos[1];

    if (codigo_provincia >= 1 && (codigo_provincia <= 24 || codigo_provincia == 30)) {
      var digito_verificador = digitos.pop();

      var digito_calculado = digitos.reduce(
        function (valorPrevio, valorActual, indice) {
          return valorPrevio - (valorActual * (2 - indice % 2)) % 9 - (valorActual == 9) * 9;
        }, 1000) % 10;
      return digito_calculado === digito_verificador;
}
  }
  return false;
}
