<?php 
require_once'../../modelos/datospollos.php';

$maqv_obj=new datospollos();


echo $maqv_obj->Eliminar($_POST['id']);