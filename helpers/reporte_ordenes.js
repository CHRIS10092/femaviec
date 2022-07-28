$('#btn-buscar').click(function(){
	mes=$('#txt-mes').val();
	if(mes==''){
		mensajes('Seleccionar un mes del anio');
	}else{
		buscar_listado(mes);
		
	}
})

function buscar_listado($mes){
	$.ajax({
		url:'../componentes/reportes/reporte_ordenes_listado.php',
		type: 'POST',
		data: {mes:mes},
	})
	.done(function(r) {
		$('#resultado1').html(r);
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



