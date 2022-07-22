<?php
require_once "../../modelos/distribuir.php";
$obj=new  distribuir();
$datos = $obj->listar_articulos($_GET["tipo"]);
?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Fecha</th>
			<th>Tipo</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($datos as $dato):?>
				<?php 
		$data=$dato["codigo"]."||".$dato["cantidad"];
		?>
		<tr>
			<td><?php echo  $dato["codigo"]?>	</td>
			<td><?php echo  $dato["articulo"]?>	</td>
			<td><?php echo  $dato["cantidad"]?>	</td>
			<td><?php echo  $dato["fecha"]?>	</td>
			<td><?php echo  $dato["tipo"]?>	</td>
			<td>
				<button class="btn btn-primary" onclick="listar_zonas('<?php echo $data  ?>')">Distribuir</button>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>