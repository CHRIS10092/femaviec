<?php 
session_start();
require_once'../../modelos/usuarios.php';
$maqv_obj=new usuarios();
echo $maqv_obj->cambiar_clave($_POST['clave'],$_SESSION['usuario_temp'][0]);

 ?>