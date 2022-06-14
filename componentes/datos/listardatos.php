<?php
require_once "../../modelos/datos.php";
$obj = new datos();

?>
<div class="table-responsive">
<table id="tbl-tenedorm" class="table table-responsive table-hover dataTable no-footer" style="height: 100%; width: 100%;">



<thead>
<tr>

	<th>ID</th>
	<th>GALPON</th>
	<th>MEDIDAS</th>

	<th>ACCION</th>

</tr>
</thead>

	<tbody>

	<?php echo $obj->listadoempresasventas(); ?>
	</tbody>

</table>
</div>
<script type="text/javascript">
	$('#tbl-tenedorm').DataTable({});

</script>