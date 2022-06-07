<?php 
require_once'../../modelos/empresas.php';

$maqv_obj=new empresas();
$maqv_datos=[
	$_POST['ruc'],
	$_POST['nombre'],
	$_POST['ciudad'],
	$_POST['id']
];

echo $maqv_obj->Editar($maqv_datos);


 ?>