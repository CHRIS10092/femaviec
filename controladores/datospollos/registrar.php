<?php
require_once '../../modelos/datospollos.php';

$obj = new datospollos();
$datos = [

    $_POST['caso'],
    $_POST['cantidad'],
    $_POST['rango'],
    $_POST['galpon'],
    $_POST['lote'],
    $_POST['responsable'],
    $_POST['observacion'],
    '3',


];

echo $obj->Registrar($datos);