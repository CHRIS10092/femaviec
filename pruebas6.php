<?php
require_once "modelos/ptemperatura.php";
$cones  = new ptemperatura();
$dato    = $cones->Listar_Galpon1('23');
$separador="/";
?>

<div class="row">
   
 <?php echo $dato->galpon?>/<?php echo $dato->maximotemp?>/<?php echo $dato->minimotemp?>/<?php echo $dato->maximohum?>

<!--cierro panel-->

</div>
<br>




