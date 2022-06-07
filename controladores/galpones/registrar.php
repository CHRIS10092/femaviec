<?php
require_once '../../modelos/galpones.php';

$obj = new galpones();
$datos = [

    $_POST['galpon'],
    $_POST['medidas'],
    $_POST['n_pollos'],
    $_POST['lote'],
    $_POST['rango'],
    $_POST['estado'],
    '3',


];

echo $obj->Registrar($datos);