<?php 
require_once'../../modelos/empleados.php';
$maqv_data=new empleados(); 
?>
<table id="tbl-empleados" class="table table-striped table-hover">
	<thead>
		<tr class="info">
			<th>Usuario </th>
			<th>Fecha de Nacimiento</th>
			<th>Sexo</th>
			
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $maqv_data->Listar(); ?>
	</tbody>
</table>
<script type="text/javascript">
	$('#tbl-empleados').DataTable({ language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
});
</script>