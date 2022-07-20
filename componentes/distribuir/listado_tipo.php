<?php
require_once "../../modelos/distribuir.php";
$obj=new  distribuir();
$datos = $obj->listar_tipos();
?>
<select id="cmbTipo" class="form-control">
	<option value="0">seleccionar</option>
	<option value="Ingreso">Ingreso</option>
	<option value="Egreso">Egreso</option>
	
</select>