<?php
require_once '../../modelos/galpones.php';

$obj = new galpones();
$datos = [
    $_POST['id'],
    $_POST['galponu'],
    $_POST['medidasu'],
    $_POST['n_pollosu'],
    $_POST['loteu'],
    $_POST['rangou'],
    $_POST['estadou'],
    '3',
  ];
//print_r($datos);
echo $obj->Editar($datos);
//echo $obj->VerificarGalponu($_POST['galponu']);