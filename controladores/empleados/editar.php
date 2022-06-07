<?php 
require_once'../../modelos/empleados.php';

$maqv_obj=new empleados();
$maqv_datos=[
	$_POST['primerNombre'],
	$_POST['segundoNombre'],
	$_POST['paterno'],
	$_POST['materno'],
	$_POST['fecha'],
	$_POST['sexo'],
	$_POST['empresa'],
	$_POST['id']
];

echo $maqv_obj->Editar($maqv_datos);


 ?>