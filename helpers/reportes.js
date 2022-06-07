$('#btn-generar').click(function(){
	
	if(!verificar_opcion())
	{
		toastr.warning("Seleccionar una Opcion para Generar Reporte");
	}
	else
	{
		generar_reporte();
		generar_grafico();
	}

})

function generar_grafico()
{
	datos=$('#frm-opcion').serialize();
	$.ajax({
		url: '../componentes/reportes/grafico.php',
		type: 'POST',
		data: datos,
	})
	.done(function(r) {
		$('#grafico').html(r);
	});
	
}

function generar_reporte()
{
	datos=$('#frm-opcion').serialize();
	$.ajax({
		url: '../componentes/reportes/listado.php',
		type: 'POST',
		data: datos,
	})
	.done(function(r) {
		$('#listado').html(r);
	});
	
}

function verificar_opcion()
{
	opcion=document.getElementsByName('reportes');
	cont=false;
	for (var i = 0; i < opcion.length; i++) 
	{
		if(opcion[i].checked)
		{
			cont=true;
		}
	}

	return cont;
}



  
    //Initialize Select2 Elements
 
    //iCheck for checkbox and radio inputs
  
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    
  
