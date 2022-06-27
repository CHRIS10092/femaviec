<?php
session_start();
date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");
if (isset($_SESSION['usuarios'])) {
?>
<?php require_once '../contenido/head.php' ?>
<div class="row">
    <div class="col-md-12">
     
        <!-- /.box -->
    </div>
</div>
<div class="row">
<span> 2/4/20</span>


<!--cierro panel-->


</div>
<br>


<?php require_once '../contenido/foot.php' ?>

    


<?php } else {
    header("location: ../");
}
?>
