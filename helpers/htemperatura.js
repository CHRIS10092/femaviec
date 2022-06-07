$('#htemperatura').load('../componentes/htemperatura/listar.php')
    
  function calcular(){
 cantidad=parseInt(document.getElementById('txtCantidad').value)
    precioUn=parseInt(document.getElementById('txtValorUni').value)
    precioTot=cantidad*precioUn;
    
    $('#txtValorTot').val(precioTot.toFixed(2))

}

$('#btn-registrar').click(function(){
	
articulo=$('#txtArticulo');
cantidad=$('#txtCantidad');
parametro=$('#txtParametro');
fecha=$('#txtFecha');
valorUni=$('#txtValorUni');
valorTot=$('#txtValorTot');
observacion=$('#txtObservacion');
estado=$('#cmbEstado');

    if(!articulo.val()){
    	avisos('articulo campo vacio',articulo);
    
    }else if(!cantidad.val()){
    	avisos('cantidad campo vacio',cantidad);
    }else if(estado.val()==0){
    	avisos('Seleccione una estado',estado);
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
    url: '../controladores/htemperatura/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#htemperatura').load('../componentes/htemperatura/listar.php');
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
  $('#txtParametrou').val(d[3]);
  $('#txtFechau').val(d[4]);
  $('#txtValorUniu').val(d[5]);
  $('#txtValorTotu').val(d[6]);
  $('#txtObservacionu').val(d[7]);
  $('#cmbEstadou').val(d[8]);
}

$('#btn-editar').click(function(){
  articulo=$('#txtArticulou');
cantidad=$('#txtCantidadu');
parametro=$('#txtParametrou');
fecha=$('#txtFechau');
valorUni=$('#txtValorUniu');
valorTot=$('#txtValorTotu');
observacion=$('#txtObservacionu');
estado=$('#cmbEstadou');

    if(!articulo.val()){
      avisos('articulo campo vacio',articulo);
    
    }else if(!cantidad.val()){
      avisos('cantidad campo vacio',cantidad);
    }else if(estado.val()==0){
      avisos('Seleccione una estado',estado);
    }else{
      editar();
    }
})

function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/htemperatura/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#htemperatura').load('../componentes/htemperatura/listar.php');
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
    url: '../controladores/htemperatura/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#htemperatura').load('../componentes/htemperatura/listar.php');
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
