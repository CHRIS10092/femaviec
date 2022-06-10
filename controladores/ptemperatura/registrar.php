<?php
require_once '../../modelos/ptemperatura.php';

$obj = new ptemperatura();
$datos = [

  $_POST['galpon'],
    $_POST['max'],
    $_POST['min'],
    $_POST['hum'],
    '3',


];

if($_POST['max']<$_POST['min']){
  echo 3;
}else{

echo $obj->Registrar($datos);
//echo 1;
}
//print_r($datos);