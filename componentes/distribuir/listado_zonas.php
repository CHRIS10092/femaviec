<?php
require_once "../../modelos/distribuir.php";
$obj=new  distribuir();
$datos = $obj->listar_zonas();
?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Galpón</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($datos as $dato):?>
		<?php 
		$data=$dato["numero"]."||".$_GET["articulo"]."||".$_GET["stock"];
		?>	
		<tr>
			<td><?php echo  $dato["numero"]?>	</td>
			<td>
				<input type="radio" name="zonas" onchange="mostrar_cantidad('<?php echo $data  ?>');">
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>