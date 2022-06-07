<?php 
require_once'../../modelos/fichas.php';
$maqv_data=new fichas(); 
?>
<label for="cmb-empresa">Empresa</label>
<select style="width: 100%" class="form-control" id="cmb-empresa" onchange="listar_empleados()">
	<option value="0">Seleccionar</option>
	<?php echo $maqv_data->ListarEmpresas(); ?>
</select>
<script type="text/javascript">
	$('#cmb-empresa').select2({});
</script>