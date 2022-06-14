$('#list-empresas').load('../componentes/datos/listardatos.php');

function recargar(e){
    e.preventDefault();
    
    }
    function capturarempresa(datos){

		d=datos.split('||');
	
	$('#txt-codigo').val(d[0]);
	$('#txt-numero').val(d[1]);
	$('#txt-medidas').val(d[2]);
	$('#txt-lote').val(d[3]);
	$('#txt-rango').val(d[4]);
    $('#txt-estado').val(d[5]);
  $("#n-empresas").modal('hide');
}