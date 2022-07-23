<?php
require_once '../../modelos/reporte.php';
$adchb_data = new reporte();
?>
<style>

	</style>
<table class="table table-hover">
	<thead>
		<tr class="">
			<th>Número</th>
			<th>Articulo</th>
			<th>Cantidad</th>
			<th>Fecha</th>
			<th>Precio Unitario</th>
			<th>Precio Total</th>
			<th>Ruc Avicola</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $adchb_data->FechasCompras($_POST['desde'], $_POST['hasta']); ?>
	</tbody>
</table>
<hr>
<a href="../controladores/pdf/fechas.php?desde=<?php echo $_POST['desde'] ?>&&hasta=<?php echo $_POST['hasta'] ?>" class="btn btn-danger" target="_blank">
	<i class="fa fa-file"></i> Pdf
</a>
</a>