<?php
require_once '../../modelos/insumosproduccion.php';

$obj = new insumosproduccion();

echo $obj->Eliminar($_POST['id']);