<?php
require_once '../../modelos/ptemperatura.php';
$obj = new ptemperatura();
$datos = [
    $_POST['id'],
    $_POST['galponu'],
    $_POST['maxu'],
    $_POST['minu'],
    $_POST['humu'],
    '3',


];

echo $obj->Editar($datos);