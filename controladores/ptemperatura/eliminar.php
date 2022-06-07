<?php
require_once '../../modelos/ptemperatura.php';
$obj = new ptemperatura();
echo $obj->Eliminar($_POST['id']);