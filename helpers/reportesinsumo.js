$('#list-compras').load('../data/reportes/list_compras.php');
$('#list-proveedores').load('../data/reportes/list_proveedores.php');

$('#list-inv-todos').load('../data/reportes/list_inv_medicamentos.php');

$('#btn-reporte-fecha').click(function(){
	desde=$('#txt-desde').val();
	hasta=$('#txt-hasta').val();
	if(!desde){
		mensajes('Definir la fecha de inicio para el reporte');
	}else if(!hasta){
		mensajes('Definir la fecha de fin para el reporte');
	}else{
		generar_compras(desde,hasta);
	}
})

function generar_compras(desde,hasta){
	$.ajax({
		url: '../componentes/reportes/list_compras_fechas.php',
		type: 'POST',
		data: {desde:desde,hasta:hasta},
	})
	.done(function(r) {
		$('#list-compras-fechas').html(r);
	});
	
	
}

function mensajes(info){
	mensaje='<div class="alert alert-danger">'+
	        '<button type="button" class="close" data-dismiss="alert">'+
	               '<i class="ace-icon fa fa-times"></i>'+
      				'</button>'+
      				'<strong>'+
      					'<i class="ace-icon fa fa-warning"></i>'+'  '+
      				'</strong>'+
      				  info+
      				'<br>'+
      			'</div>';
	$('#alertas').html(mensaje);
}

function buscar_compras(){
	proveedor=$('#cmb-proveedor').val();
	$.ajax({
		url: '../data/reportes/list_compras_proveedor.php',
		type: 'POST',
		data: {proveedor:proveedor},
	})
	.done(function(r) {
		$('#list-compras-proveedor').html(r);
	});
	
}

$('#btn-buscar').click(function(e){
	e.preventDefault();
	buscar=$('#txt-buscar').val();
	if(!verificar_criterio()){
		mensajesinv('Debe escojer un criterio de busqueda');
	}else if(!buscar){
		mensajesinv('La busqueda no puede ser vacia');
	}else{
		busqueda();
	}

})

function busqueda(){
	datos=$('#frm-busqueda').serialize();
	$.ajax({
		url: '../controladores/reportes.php',
		type: 'POST',
		data: datos,
	})
	.done(function(r) {
		$('#list-inv-busqueda').html(r);
	});
}

function verificar_criterio(){
  bus=document.getElementsByName('busqueda');
  cont=0;
  for (var i = 0; i < bus.length; i++) {
      if(bus[i].checked){
              cont++;
      }
    
  }
   
   if(cont==1){
    return true;
   }else{
    return false;
   }



}

function mensajesinv(info){
	mensaje='<div class="alert alert-danger">'+
	        '<button type="button" class="close" data-dismiss="alert">'+
	               '<i class="ace-icon fa fa-times"></i>'+
      				'</button>'+
      				'<strong>'+
      					'<i class="ace-icon fa fa-warning"></i>'+'  '+
      				'</strong>'+
      				  info+
      				'<br>'+
      			'</div><br>';
	$('#alertasinv').html(mensaje);
}