$('#datospollos').load('../componentes/datospollos/listar.php')
$('#listar-responsable').load('../componentes/datospollos/listar-responsable.php')
$('#listar-responsableu').load('../componentes/datospollos/listar-responsableu.php')
$('#galpon').load('../componentes/vergalpones/listar-galpones.php');
$('#lote').load('../componentes/vergalpones/listarlotes.php');
function listar_lotes(){
    galpon=$('#cmb-galpon').val();
    
    $.ajax({
    url:'../componentes/datospollos/listarlote.php',
    type:'POST',
    data:{galpon:galpon}
    
    })
    .done(function(r){
    
     $('#lotes').html(r);
    
    })
        
    }
    
function listar_cantidad(){
  $lote =$('#txtCantidad').val();
  $.ajax({
    url:'../componentes/datospollos/listarcantidad.php',
    type:'POST',
    data:{galpon:galpon,lote:lote}
  });
}

    function Ver(){
        galpon=$('#cmb-galpon').val();
   
        lote=$('#cmb-lote').val();
   
        $.ajax({
            url:'../componentes/datospollos/listar.php',
            type:'GET',
            data:{galpon:galpon,lote:lote},
            success:function(r){
                $("#listado-articulos").html(r);
            }
        })
    }

$('#btn-registrar').click(function(){
	
    caso=$('#txtCaso');
    lote=$('#cmb-lote');
    responsable=$('#cmb-responsable');

    if(!caso.val()){
    	avisos('caso campo vacio',caso);
    
    }else if(!lote.val()){
    	avisos('lote campo vacio',lote);
    }else if(responsable.val()==0){
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
    url: '../controladores/datospollos/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#datospollos').load('../componentes/datospollos/listar.php');
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
  $('#txtCasou').val(d[1]);
  $('#txtCantidadu').val(d[2]);
  $('#txtRangou').val(d[3]);
  $('#txtGalponu').val(d[4]);
  $('#txtLoteu').val(d[5]);
  $('#cmb-responsableu').val(d[6]);
  $('#txtObservacionu').val(d[7]);
}

$('#btn-editar').click(function(){
  casou=$('#txtCasou');
    loteu=$('#txtLoteu');
    responsableu=$('#cmb-responsableu');

    if(!casou.val()){
    	avisos('caso campo vacio',casou);
    
    }else if(!loteu.val()){
    	avisos('lote campo vacio',loteu);
    }else if(responsableu.val()==0){
    	avisos('Seleccione una res',responsableu);
    }else{
    	editar();
    }
})
function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/datospollos/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#datospollos').load('../componentes/datospollos/listar.php');
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
    url: '../controladores/datospollos/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#datospollos').load('../componentes/datospollos/listar.php');
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
