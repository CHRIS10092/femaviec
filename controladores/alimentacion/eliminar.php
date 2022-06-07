<?php
require_once '../../modelos/alimentacion.php';

$obj = new alimentacion();


echo $obj->Eliminar($_POST['id']);