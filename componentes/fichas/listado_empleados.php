<?php 
require_once'../../modelos/fichas.php';
$maqv_data=new fichas(); 
?>
<label for="cmb-empleado">Usuarios del Servicio</label>
<select style="width: 100%" class="form-control" id="cmb-empleado" name="empleado">
	<option value="0">Seleccionar</option>
	<?php if (isset($_POST['id'])): ?>
			<?php echo $maqv_data->ListarEmpleados($_POST['id']); ?>
	<?php endif ?>

</select>