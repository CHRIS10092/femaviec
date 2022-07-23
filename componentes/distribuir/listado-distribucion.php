<?php
require_once "../../modelos/distribuir.php";
$obj=new  distribuir();
$datos = $obj->listar_stock($_GET['lote'],$_GET['galpon']);
?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Articulo</th>
			<th>Galpón</th>
			<th>Cantidad</th>
			
			
		</tr>
	</thead>
	<tbody>
		<?php foreach($datos as $dato):?>
		
		<tr>
			<td><?php echo  $dato["id_distri"]?>	</td>
			<td><?php echo  $dato["id_articulo"]?>	</td>
			<td><?php echo  $dato["id_subzonas"]?>	</td>
			<td><?php echo  $dato["cantidad"]?>	</td>
			
			
		</tr>
		<?php endforeach;?>
	</tbody>
</table>