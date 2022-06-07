<?php 
require_once'../../modelos/usuarios.php';
$maqv_data=new usuarios(); 
?>
<select style="width: 100%" class="form-control" id="cmb-rol" name="rol">
	<option value="0">Seleccionar</option>
	<?php echo $maqv_data->ListarRoles(); ?>
</select>
<script type="text/javascript">
	$('#cmb-rol').select2({});
</script>