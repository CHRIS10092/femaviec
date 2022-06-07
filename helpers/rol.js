$('#listado').load('../componentes/rol/listar.php');
$('#btn-registrar').click(function(){
  
    descripcion=$('#txt-descripcion');
    

    if(!descripcion.val()){
      avisos('Ruc campo vacio',descripcion);
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
    url: '../controladores/rol/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#listado').load('../componentes/rol/listar.php');
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
  $('#txt-descripcionu').val(d[1]);
  
}

$('#btn-editar').click(function(){
  id=$('#txt-id');
  descripcionu=$('#txt-descripcionu');
    
    if(!descripcionu.val()){
      avisos('Ruc campo vacio',descripcionu);
   }else{
      editar();
      //debuger();
      //alert(descripcionu.val(),id.val());
    }
})

function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/rol/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#listado').load('../componentes/rol/listar.php');
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
    url: '../controladores/rol/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#listado').load('../componentes/rol/listar.php');
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
