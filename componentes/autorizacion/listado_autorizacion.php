<?php
session_start();
require_once '../../modelos/NotasCredito.php';
$adchb_data = new NotasCredito();
$datos=$adchb_data->repor('3');
//print_r($datos);
?>

<?php foreach($datos as $obj) : ?>
<tr>
		<td><?php echo $obj['numero'] ?></td>
		<td><?php echo $obj['estado'] ?></td>
		<td><?php echo $obj['medidas'] ?></td>
		<td><?php echo $obj['estado'] ?></td>
	<td>
		<a class="btn btn-primary btn-xs" href="notascredito.php?id=<?php echo $obj['numero'] ?>">
			Ver Datos Reportes
		</a>
	</td>
	</tr>
<?php endforeach ?>

<script type="text/javascript">
	$('#tbl-articulo').DataTable({});
</script>