$('#parametro').load('../componentes/ptemperatura/listado.php')
$('#galpon').load('../componentes/ptemperatura/listargalpon.php')
$('#galponu').load('../componentes/ptemperatura/listargalponu.php')


$('#btn-registrar').click(function(){
	
    galpon=$('#cmb-galpon');
    max=$('#txtMax');
    min=$('#txtMin');
    hum=$('#txtHum');

    if(!max.val()){
    	avisos('max campo vacio',max);
    
    }else if(max.val()==0){
    avisos('el max debe ser mayor a 0',max);
    }else if(!min.val()){
    	avisos('min campo vacio',min);
    }else if(min.val()==0){
      avisos('min campo debe ser mayor a 0',min);
    }else if(!hum.val()){
    	avisos('humedad campo vacio',hum);
    }else if(hum.val()==0){
      avisos('humedad campo debe ser mayor a 0',hum);
    }else if(galpon.val()==0){
    	avisos('Seleccione una galpon',galpon);
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
    url: '../controladores/ptemperatura/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#parametro').load('../componentes/ptemperatura/listado.php');
    }else if(r==2){
      toastr.warning('Registro Duplicado');
    }else if(r==3){
      toastr.warning('La temperatura Maxima debe ser mayor a la Temperatura Minima');
    }else{
      alertify.alert(r);
    }
  });
  
}

function capturar(datos){
  d=datos.split('||');
  $('#txt-id').val(d[0]);
  $('#txtMaxu').val(d[1]);
  $('#txtMinu').val(d[2]);
  $('#txtHumu').val(d[3]);
  
}

$('#btn-editar').click(function(){
galponu=$('#txtGalponu');
    maxu=$('#txtMaxu');
    minu=$('#txtMinu');
    humu=$('#txtHumu');

    if(!maxu.val()){
    	avisos('max campo vacio',maxu);
    
    }else if(!minu.val()){
    	avisos('min campo vacio',minu);
    }else if(!humu.val()){
    	avisos('min campo vacio',humu);
    }else if(galponu.val()==0){
    	avisos('Seleccione una galpon',galponu);
    }else{
    	editar();
    }
})

function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/ptemperatura/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#parametro').load('../componentes/ptemperatura/listado.php');
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
    url: '../controladores/ptemperatura/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#parametro').load('../componentes/ptemperatura/listado.php');
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
