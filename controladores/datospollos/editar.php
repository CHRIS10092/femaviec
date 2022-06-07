<?php
require_once '../../modelos/datospollos.php';

$obj = new datospollos();
$datos = [

    $_POST['id'],
    $_POST['casou'],
    $_POST['cantidadu'],
    $_POST['rangou'],
    $_POST['galponu'],
    $_POST['loteu'],
    $_POST['responsableu'],
    $_POST['observacionu'],
    '3',


];

echo $obj->Editar($datos);