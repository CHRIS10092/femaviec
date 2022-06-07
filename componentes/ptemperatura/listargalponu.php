<?php
require_once '../../modelos/alimentacion.php';
$maqv_data = new alimentacion();
?>
<select style="width: 100%" class="form-control" id="cmb-galponu" name="galponu">
    <option value="0">Seleccionar</option>
    <?php echo $maqv_data->ListarGalpon(); ?>
</select>