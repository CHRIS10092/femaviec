<?php
require_once "../../modelos/distribuir.php";
$obj=new  distribuir();
$datos = $obj->listar_subzonas($_GET["zona"]);
?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Bebedero</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($datos as $dato):?>
			<?php 
		$data=$dato["id_galpon"]."||".$_GET["articulo"]."||".$_GET["stock"];
		?>	
		<tr>
			<td><?php echo  $dato["bebedero1"]?>	</td>
			<td>
				<input type="radio" name="subzonas" onchange="mostrar_cantidad('<?php echo $data  ?>');">
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>