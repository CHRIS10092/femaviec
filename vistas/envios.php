<?php

$res     = false;
$mensaje = "";

$ok = 0;
session_start();
if (isset($_SESSION['usuarios'])) {
?>

<?php require_once '../contenido/head.php' ?>
<div class="box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title"><i class="fa fa-home"></i> INICIO</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="responsive" id="listado-datos"> </div>

    </div>

    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php';
    ?>
<script src="../helpers/envio.js"></script>
<?php } else {
    header("location: ../");
}
?>

<?php

$hora = date_default_timezone_set('America/Lima');
$fecha = date('y-m-d');
if (!empty($_GET)) {
    if (isset($_GET["idg"]) && isset($_GET["t"]) && isset($_GET["hg"]) && isset($_GET["b1"]) && isset($_GET["b2"]) && isset($_GET["b3"]) && isset($_GET["b4"]) && isset($_GET["bo1"]) && isset($_GET["bo2"]) && isset($_GET["bo3"]) && isset($_GET["bo4"]) && isset($_GET["v"])) {

        if ($_GET["idg"] != "" && $_GET["t"] != "" && $_GET["hg"] != "" && $_GET["b1"] != "" && $_GET["bo1"] != "" && $_GET["b2"] != "" && $_GET["bo2"] != "" && $_GET["b3"] != "" && $_GET["bo3"] != "" && $_GET["b4"] != "" && $_GET["bo4"] != "" && $_GET["v"] != "") {


            $idgalpon = $_GET['idg'];
            $temperatura = $_GET['t'];
            $humedadgalpon = $_GET['hg'];
            
            $bebedero1 = $_GET['b1'];
            $bebedero2 = $_GET['b2'];
            $bebedero3 = $_GET['b3'];
            $bebedero4 = $_GET['b4'];
            $bomba1 = $_GET['bo1'];
            $bomba2 = $_GET['bo2'];
            $bomba3 = $_GET['bo3'];
            $bomba4 = $_GET['bo4'];

            $ventilador = $_GET['v'];


           
            $host = "116.202.115.200";
            $user = "femavico_wp";
            $password = "LhEWo8xLkNtT";
            $db = "femavico_femavi";
            $con = mysqli_connect($host, $user, $password, $db);

            $sql = "INSERT INTO `registros`(`fecha`, `idgalpon`, `temperatura`, `humedadgalpon`, `bebedero1`,`bebedero2`,`bebedero3`,`bebedero4`, `bomba1`,`bomba2`,`bomba3`,`bomba4`, `ventilador`) VALUES ('$fecha','$idgalpon','$temperatura','$humedadgalpon','$bebedero1','$bebedero2','$bebedero3','$bebedero4','$bomba1','$bomba2','$bomba3','$bomba4','$ventilador')";

              $query = $con->query($sql);
            if ($query != null) {
                
                require_once '../vistas/servidor_correos/servicioCorreos1.php';
                
                $servicio = new ServicioCorreos;
                $correo='alexander.roberto1999@hotmail.com';
                $correo1='Pablo.tenelema.m@gmail.com';
                $correo2='jessicasayay34@gmail.com';
                //$correo3='Christian.Salas@hotmail.com';
                $correo3='koriche001@gmail.com';

                $mensaje1="Saludos Cordiales el galpon ".$idgalpon." con una  temperatura de ".$temperatura."  su ventilador se encuentra en estado ".$ventilador." Mensaje de Femavi Agrícola " ;
                
                $servicio->enviar_email($correo1, $mensaje1);
                $servicio->enviar_email($correo2, $mensaje1);
                
                                print "<script>
alert(\"Agregado exitosamente\"+\"$idgalpon\"+\"$temperatura\"+\"$humedadgalpon\" );window.location='envios.php';
</script>";
            } else {

                print "<script>
alert(\"No se pudo registrar debe ingresar el galpon corecto y el id correcto.\");window.location='envios.php';
</script>";
            }
        }
    } else {
        print "<script>
alert(\"No se pudo registrar debe ingresar la temperatura y el id correcto y .\");window.location='envios.php';
</script>";
    }
}
?>
