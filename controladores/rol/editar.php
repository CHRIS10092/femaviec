<?php 
require_once  '../../modelos/rol.php';

$maqv_obj=new rol();
$datos=[
	$_POST['id'],
	$_POST['descripcionu'],
	
];
//print_r($datos);
echo $maqv_obj->Editar($datos);
