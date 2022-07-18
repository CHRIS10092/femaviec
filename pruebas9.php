<?php
session_start();
date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");

require_once "modelos/ptemperatura.php";
$cones  = new ptemperatura();
$dato    = $cones->Listar_Galpon4('2');

?>

<div class="row">
   
 <?php echo $dato->galpon?>/<?php echo $dato->maximotemp?>/<?php echo $dato->minimotemp?>/<?php echo $dato->maximohum?>

<!--cierro panel-->


</div>
<br>

