<?php 
session_start();
require_once'../../modelos/usuarios.php';
$maqv_obj=new usuarios();
echo $maqv_obj->cambiar_usuario($_POST['usuario'],$_SESSION['usuarios'][0]);

 ?>