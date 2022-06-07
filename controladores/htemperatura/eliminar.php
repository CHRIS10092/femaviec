<?php
require_once '../../modelos/htemperatura.php';
$obj = new htemperatura();
echo $obj->Eliminar($_POST['id']);