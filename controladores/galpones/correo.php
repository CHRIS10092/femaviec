<?php 
require_once'../../modelos/usuarios.php';
$maqv_obj=new usuarios();
$to = $_POST['correo'];
$subject = "Asunto del email";
$message = "Este es mi primer envío de email con PHP";
 
//mail($to, $subject, $message);
 $maqv_obj->enviar_correo($_POST['correo'],$message);

		echo 1;
?>