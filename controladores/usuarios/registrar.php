<?php 
require_once'../../modelos/usuarios.php';

$maqv_obj=new usuarios();
$maqv_datos=[
	$_POST['nombre'],
	$_POST['apellido'],
	$_POST['correo'],
	$_POST['usuario'],
	$_POST['correo'],
	$_POST['rol'],
	$_POST['estado']
];

echo $maqv_obj->Registrar($maqv_datos);


 ?>