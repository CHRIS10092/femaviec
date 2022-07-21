$('#listado').load('../componentes/galpones/listar.php')
$('#btn-registrar').click(function(){
	
    medidas=$('#txtMedidas');
    lote=$('#txtLote');
    estado=$('#cmb-estado');

    if(!medidas.val()){
    	avisos('caso campo vacio',medidas);
    
    }else if(!lote.val()){
    	avisos('lote campo vacio',lote);
    }else if(estado.val()==0){
    	avisos('Seleccione una res',responsable);
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
    url: '../controladores/galpones/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#listado').load('../componentes/galpones/listar.php');
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
  $('#txtGalponu').val(d[1]);
  $('#txtMedidasu').val(d[2]);
  $('#txtNpollosu').val(d[3]);
    $('#txtLoteu').val(d[4]);
  $('#cmb-rangou').val(d[5]);
  $('#cmb-estadou').val(d[6]);
}

$('#btn-editar').click(function(){
    medidasu=$('#txtMedidasu');
    loteu=$('#txtLoteu');
    estadou=$('#cmb-estadou');


    if(!medidasu.val()){
    	avisos('caso campo vacio',medidasu);
    
    }else if(!loteu.val()){
    	avisos('lote campo vacio',loteu);
    }else if(estadou.val()==0){
    	avisos('Seleccione una res',estadou);
    }else{
    	editar();
    }
})
function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/galpones/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#listado').load('../componentes/galpones/listar.php');
    }else{
      alertify.alert(r);
    }
  });
  
}


function confirmar(id,estado){


    estado=$('#cmb-estadou');
  alertify.confirm('Confirmar','Desea Eliminar el Registro ?',
                   function(){
                    eliminar(id,estado.val());
                   },
                   function(){alertify.error('ACCION CANCELADA')}
                  );
}

function eliminar(id,estado){

  estado=$('#cmb-estadou').val();
  $.ajax({
    url: '../controladores/galpones/eliminar.php',
    type: 'POST',
    data: {id:id,estado:estado},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#listado').load('../componentes/galpones/listar.php');
    }else if(r==3){
      toastr.error('No se puede eliminar por que esta Activo');
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
