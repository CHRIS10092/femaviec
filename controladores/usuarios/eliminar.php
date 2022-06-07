<?php 
require_once'../../modelos/usuarios.php';

$maqv_obj=new usuarios();


echo $maqv_obj->Eliminar($_POST['id']);


 ?>