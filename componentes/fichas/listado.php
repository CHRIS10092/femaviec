<?php 
require_once'../../modelos/fichas.php';
$maqv_data=new fichas(); 
?>
<table id="tbl-ficha" class="table table-striped table-hover">
	<thead>
		<tr class="info">
			<th>USUARIO</th>
			<th>EMPRESA</th>
			<th>INICIO TRABAJO</th>
			<th>PUESTO DE TRABAJO</th>
			<th>ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $maqv_data->Listar(); ?>
	</tbody>
</table>
<script type="text/javascript">
	$('#tbl-ficha').DataTable({});
</script>