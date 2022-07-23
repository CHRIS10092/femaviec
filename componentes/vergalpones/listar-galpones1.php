<?php
require_once '../../modelos/galpones.php';
$maqv_data = new galpones();
?>
<select style="width: 100%" class="form-control" style="width: 248px;" id="cmb-galpon" name="galpon"
    >
    <option value="0">Seleccionar</option>
    <?php echo $maqv_data->ListarGalpones(); ?>
</select>