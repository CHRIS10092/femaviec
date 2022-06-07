<?php
require_once '../../modelos/insumosproduccion.php';

$obj = new insumosproduccion();
$datos = [

    $_POST['articulo'],
    $_POST['cantidad'],
    $_POST['fecha'],
    $_POST['precioUni'],
    $_POST['precioTot'],
    '3',


];

echo $obj->Registrar($datos);