<?php
require_once '../../modelos/galpones.php';
$maqv_data = new galpones();
?>
<select name="lote" id="cmb-lote" class="form-control">
    <option value="0">Seleccionar</option>
    <?php echo $maqv_data->ListarArticulos(); ?>
</select>