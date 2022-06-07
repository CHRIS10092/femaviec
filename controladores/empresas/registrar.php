<?php 
require_once'../../modelos/empresas.php';

$maqv_obj=new empresas();
$maqv_datos=[
	$_POST['ruc'],
	$_POST['nombre'],
	$_POST['ciudad']
];

echo $maqv_obj->Registrar($maqv_datos);


 ?>