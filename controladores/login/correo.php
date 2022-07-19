<?php 
require_once '../../modelos/usuarios.php';
require_once '../../vistas/servidor_correos/servicioCorreos.php';
$maqv_obj=new usuarios();
$servicos_correo= new ServicioCorreos();
if (isset($_POST['correo'])) {
	$maqv_num_row=$maqv_obj->correo_existente($_POST['correo']);

	if($maqv_num_row>0){
		$usuario=$maqv_obj->id_usuario($_POST['correo']);
		$codigo=rand(100,900);
		$clave_temporal="XSFR".$codigo;
		$maqv_obj->temporal($usuario,$clave_temporal);

		$mensaje="clave de recuperacion es: ".$clave_temporal;
		$servicos_correo->enviar_email($_POST['correo'],$mensaje);
		echo 1;
	}else{
		echo 2;
	}
}

 ?>