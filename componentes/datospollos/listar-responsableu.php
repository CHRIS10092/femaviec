<?php
require_once '../../modelos/datospollos.php';
$maqv_data = new datospollos();
?>
<select style="width: 100%" class="form-control" id="cmb-responsableu" name="responsableu">
    <option value="0">Seleccionar</option>
    <?php echo $maqv_data->ListarResponsable(); ?>
</select>