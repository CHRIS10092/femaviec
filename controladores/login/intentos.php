<?php 
require_once  '../../modelos/login.php';

$maqv_obj=new login();

$intento=[

	$_POST['usuario'],
	1
];

$intentos=$maqv_obj->Intentos($intento);
echo 2;