<?php
require_once "../../modelos/distribuir.php";
$obj=new  distribuir();
$datos = $obj->listar_tipos();
?>
<select id="cmbTipo" class="form-control">
	<option value="0">seleccionar</option>
	<?php foreach($datos as $dato):?>
		<option value="<?php echo  $dato["tipo"]?>">
			<?php echo  $dato["tipo"]?>		
		</option>
	<?php endforeach;?>
</select>