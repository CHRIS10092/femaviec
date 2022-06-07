<?php 
require_once  '../../modelos/rol.php';

$maqv_obj=new rol();
$maqv_datos=[
	$_POST['descripcion'],
	
];


echo $maqv_obj->Verificar($maqv_datos);
