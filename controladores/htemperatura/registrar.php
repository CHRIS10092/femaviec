<?php
require_once '../../modelos/htemperatura.php';

$obj = new htemperatura();

$multi=$_POST['cantidad']*$_POST['valorUni'];
$datos = [

  $_POST['articulo'],
    $_POST['cantidad'],
    $_POST['parametro'],
    $_POST['fecha'],
    $_POST['valorUni'],
    $multi,
    $_POST['observacion'],
    $_POST['estado'],
    '3',


];

echo $obj->Registrar($datos);