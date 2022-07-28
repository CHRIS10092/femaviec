<?php
require_once '../../modelos/galpones.php';
$maqv_data = new galpones();


?>



<?php 
if (isset($_POST['galpon'])) {

    $listarpro = $maqv_data->ListarLotes($_POST['galpon']);
?>

<select name="lote" id="cmb-lote" class="form-control">

    <?php foreach ($listarpro as $datos) : ?>
    <option value="<?php echo $datos['lote'] ?>"><?php echo $datos['lote']  ?></option>
    <?php endforeach ?>
</select>


<?php } else { ?>

<select name="lote" id="cmb-lote" class="form-control">
    <option value="0">Seleccionar</option>
</select>

<?php } 
require_once '../../modelos/datospollos.php';
$dat = new datospollos();
$datos=$dat->TraerCantidadPollosxGalpon($_POST['galpon']);
//print_r($datos->cantidad);

?>
<label>Cantidad</label><br>
<input type="text" id="txtCantidad" readonly="" class="form-control" name="cantidad" value="<?php echo $datos->cantidad ?>" > 
