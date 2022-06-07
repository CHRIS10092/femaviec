<?php 
require_once'../../modelos/empleados.php';

$maqv_obj=new empleados();


echo $maqv_obj->Eliminar($_POST['id']);


 ?>