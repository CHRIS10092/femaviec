<?php 
require_once'../../modelos/rol.php';

$maqv_obj=new rol();


echo $maqv_obj->Eliminar($_POST['id']);


 ?>