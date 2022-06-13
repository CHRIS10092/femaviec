<?php 
error_reporting(0);
session_start();
require_once  '../../modelos/login.php';


$maqv_obj=new login();
$maqv_datos=[
	$_POST['usuario'],
	$_POST['clave'],
	
];
//$con=$_POST['cont']+1;
if(isset($_POST['usuario'])){
echo $maqv_obj->Verificar($maqv_datos);	
//echo $maqv_obj->Intentos($maqv_datos);	
}else{
//print_r($maqv_datos);

//echo $maqv_obj->Intentos($maqv_datos);	
}




