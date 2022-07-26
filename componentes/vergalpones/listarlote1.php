<?php
require_once '../../modelos/galpones.php';
$maqv_data = new galpones();
?>
<select name="lote" id="cmb-lote" class="form-control">
    <option value="0">Todos</option>
    <?php echo $maqv_data->ListarArticulos(); ?>
</select>