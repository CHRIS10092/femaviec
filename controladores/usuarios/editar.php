<?php 
require_once'../../modelos/usuarios.php';

$maqv_obj=new usuarios();
$maqv_datos=[
	$_POST['nombreu'],
	$_POST['apellidou'],
	$_POST['correou'],
	$_POST['usuariou'],
	$_POST['rolu'],
	$_POST['estadou'],
	$_POST['id'],
	

];
//print_r($maqv_datos);

echo $maqv_obj->Editar($maqv_datos);


 ?>