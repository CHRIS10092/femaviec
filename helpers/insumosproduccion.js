$('#listado').load('../componentes/insumosproduccion/listar.php');

$('#btn-registrar').click(function(){
	
    articulo=$('#txtArticulo');
    cantidad=$('#txtCantidad');
    tipo=$('#cmb-tipo');
    

    if(!articulo.val()){
    	avisos('caso campo vacio',articulo);
    
    }else if(!cantidad.val()){
    	avisos('lote campo vacio',cantidad);
    }else if(tipo.val()==0){
    	avisos('tipo campo vacio',cantidad);
    }else{
    	preguntar();
    }
})

function calcular() {

    cantidad=parseInt(document.getElementById('txtCantidad').value)
    precioUn=parseInt(document.getElementById('txtPrecioUni').value)
    precioTot=cantidad*precioUn;
    
    $('#txtPrecioTot').val(precioTot.toFixed(2))

    

}
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
    url: '../controladores/insumosProduccion/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#listado').load('../componentes/insumosproduccion/listar.php');
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
  $('#txtArticulou').val(d[1]);
  $('#txtCantidadu').val(d[2]);
  $('#txtFechau').val(d[3]);
  $('#txtPrecioUniu').val(d[4]);
  $('#txtPrecioTotu').val(d[5]);
  $('#cmb-tipou').val(d[7]);
  
  
}

$('#btn-editar').click(function(){
    articulo=$('#txtArticulou');
    cantidad=$('#txtCantidadu');
    
    if(!articulo.val()){
    	avisos('articulo campo vacio',articulo);
    
    }else if(!cantidad.val()){
    	avisos('cantidad campo vacio',cantidad);
    }else{
    	editar();
    }
})
function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/insumosProduccion/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#listado').load('../componentes/insumosproduccion/listar.php');
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
    url: '../controladores/insumosProduccion/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#listado').load('../componentes/insumosproduccion/listar.php');
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
