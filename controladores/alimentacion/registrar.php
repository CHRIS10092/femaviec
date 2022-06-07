<?php
require_once '../../modelos/alimentacion.php';

$obj = new alimentacion();
$datos = [

    $_POST['galpon'],
    $_POST['fecha'],
    $_POST['comedero'],
    $_POST['estado'],
        '3',


];
//print_r($_POST);
echo $obj->Registrar($datos);