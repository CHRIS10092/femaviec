<?php 
require_once'../../modelos/usuarios.php';
$maqv_obj=new usuarios();
$temporal=$maqv_obj->temporal_existente($_POST['temporal']);
if ($temporal>0) {
	$usuario=$maqv_obj->temporal_usuario($_POST['temporal']);
	$maqv_obj->Acceder($usuario);
	echo 1;
}else{
	echo 2;
}

 ?>