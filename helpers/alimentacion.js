$('#listado').load('../componentes/alimentacion/listado.php');
$('#listar-galpon').load('../componentes/alimentacion/listargalpon.php');
$('#listar-galponu').load('../componentes/alimentacion/listargalponu.php');

       let today = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha")[0].setAttribute('max', today);
       let todayu = new Date().toISOString().split('T')[0];
    document.getElementsByName("fechau")[0].setAttribute('max', todayu);
$('#btn-registrar').click(function(){
	
    galpon=$('#cmb-galpon');
    fecha=$('#txtFecha');
    comedero=$('#cmb-comedero');
    estado=$('#cmb-estado');

 if(!fecha.val()){
    	avisos('fecha campo vacio',fecha);
    }else if(estado.val()==0){
    	avisos('Seleccione una res',estado);
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
    url: '../controladores/alimentacion/registrar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Correcto');
      $('#m-servicio').modal('hide');
      $('#frm-servicios')[0].reset();
      $('#listado').load('../componentes/alimentacion/listado.php');
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
  $('#cmb-galponu').val(d[1]);
  $('#txtFechau').val(d[2]);
  $('#txtComederou').val(d[3]);
  $('#txtEstado').val(d[4]);
  

}

$('#btn-editar').click(function(){
    fechau=$('#txtFechau');
    comederou=$('#cmb-comederou');
    estadou=$('#cmb-estadou');

     if(!fechau.val()){
    	avisos('fecha campo vacio',fechau);
    }else if(estadou.val()==0){
    	avisos('Seleccione una res',estadou);
    }else{
    	editar();
    }
})
function editar(){

  datos=$('#frm-serviciosu').serialize();
  $.ajax({
    url: '../controladores/alimentacion/editar.php',
    type: 'POST',
    data: datos,
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Editado');
      $('#m-serviciou').modal('hide');
      $('#listado').load('../componentes/alimentacion/listado.php');
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
    url: '../controladores/alimentacion/eliminar.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('Registro Eliminado');
      $('#listado').load('../componentes/alimentacion/listado.php');
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
