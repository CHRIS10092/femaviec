<?php
require_once '../../modelos/htemperatura.php';
$obj = new htemperatura();
$multi=$_POST['cantidadu']*$_POST['valorUniu'];
$datos = [
    $_POST['id'],
    $_POST['articulou'],
    $_POST['cantidadu'],
    $_POST['parametrou'],
    $_POST['fechau'],
    $_POST['valorUniu'],
    $multi,
    $_POST['observacionu'],
    $_POST['estadou'],
    '3',


];

echo $obj->Editar($datos);