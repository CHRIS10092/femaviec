<?php 
require_once '../../modelos/usuarios.php';
$maqv_obj=new usuarios();
if (isset($_POST['correo'])) {
	$maqv_num_row=$maqv_obj->correo_existente($_POST['correo']);

	if($maqv_num_row>0){
		$usuario=$maqv_obj->id_usuario($_POST['correo']);
		$codigo=rand(100,900);
		$clave_temporal="XSFR".$codigo;
		$maqv_obj->temporal($usuario,$clave_temporal);

		$mensaje="clave de recuperacion es: ".$clave_temporal;
		$maqv_obj->enviar_correo($_POST['correo'],$mensaje);
		echo 1;
	}else{
		echo 2;
	}
}

 ?>