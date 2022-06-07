<?php 
error_reporting(0);
session_start();
require_once  '../../modelos/login.php';


$maqv_obj=new login();
$maqv_datos=[
	$_POST['usuario'],
	$_POST['clave'],
	
];
/*
if(isset($_POST['usuario'])) {

		echo 32;

        $mensaje = "Error! Es probable que la contraseña o usuario ingresado son incorrectos o bien su usaurio esta inactivo";
        echo "<script type='text/javascript'>alert('$mensaje');</script>";
        header( "refresh:0.2;url=../inicio.php" );

        // =============================================================== AUMENTAMOS EL CONTADOR DEL LOGIN ==================
            $_SESSION['contadorLogin'] = $_SESSION['contadorLogin'] + 1; 

 // =================================================== SE DESACTIVA LA CUENTA DEL USUARIO =============================
             if ($_SESSION['contadorLogin']>3) {
                echo $maqv_obj->Ir($_POST['usuario']);
                $mensaje2 = "Lo sentimos, su usaurio ha sido desactivado";
                echo "<script type='text/javascript'>alert('$mensaje2');</script>";
                header( "refresh:0.2;url=../login_agro.php" );
            }

    }
/*

 */
if(isset($_POST['usuario'])){
echo $maqv_obj->Verificar($maqv_datos);	
echo $maqv_obj->Intentos($maqv_datos);
}else{
//print_r($maqv_datos);

echo $maqv_obj->Intentos($maqv_datos);	
}




