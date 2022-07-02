<?php
session_start();
date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");
if (isset($_SESSION['usuarios'])) {
?>
<?php require_once '../contenido/head.php' ;
require_once "../modelos/ptemperatura.php";
$cones  = new ptemperatura();
$dato    = $cones->Listar_Galpon2('26');

?>

<div class="row">
   
 <?php echo $dato->galpon?>/<?php echo $dato->maximotemp?>/<?php echo $dato->minimotemp?>/<?php echo $dato->maximohum?>

<!--cierro panel-->


</div>
<br>


<?php require_once '../contenido/foot.php' ?>

    


<?php } else {
    header("location: ../");
}
?>
