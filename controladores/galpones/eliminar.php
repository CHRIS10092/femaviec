<?php
require_once '../../modelos/galpones.php';

$obj = new galpones();


if($_POST['estado']=="Ina") {
	echo $obj->Eliminar($_POST['id'],$_POST['estado']);
	//echo 2;
}else if ($_POST['estado']=="Act"){
	echo 3;
}else{
	echo 4;
}



//print_r($_POST['estado']);
//print_r($_POST['id']);