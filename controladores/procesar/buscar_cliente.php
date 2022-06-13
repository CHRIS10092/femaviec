<?php

require_once '../../clases/procesar.php';

$obj = new Procesar;

$respuesta = $obj->buscar_cliente($_POST['rucci'], $_SESSION['empresa']['idempresa']);

print_r(json_encode($respuesta));
