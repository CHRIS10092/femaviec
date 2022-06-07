<?php 
require_once'../../modelos/empleados.php';
$maqv_data=new empleados(); 
?>
<select style="width: 100%" class="form-control" id="cmb-empresau" name="empresa">
	<option value="0">Seleccionar</option>
	<?php echo $maqv_data->ListarEmpresas(); ?>
</select>