<?php
require_once '../../modelos/alimentacion.php';

$obj = new alimentacion();
$datos = [

    $_POST['id'],
    $_POST['galponu'],
    $_POST['fechau'],
    $_POST['comederou'],
    $_POST['estadou'],
        '3',


];

echo $obj->Editar($datos);