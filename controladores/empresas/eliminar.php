<?php 
require_once'../../modelos/empresas.php';

$maqv_obj=new empresas();


echo $maqv_obj->Eliminar($_POST['id']);


 ?>