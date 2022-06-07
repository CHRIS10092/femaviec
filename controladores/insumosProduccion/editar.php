<?php
require_once '../../modelos/insumosproduccion.php';

$obj = new insumosproduccion();
$datos = [
    $_POST['id'],
    $_POST['articulou'],
    $_POST['cantidadu'],
    $_POST['fechau'],
    $_POST['precioUniu'],
    $_POST['precioTotu'],
    '3',
    $_POST['tipou'],


];

echo $obj->Editar($datos);