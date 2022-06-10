<?php
session_start();
date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");
if (isset($_SESSION['usuarios'])) {
?>
<?php require_once '../contenido/head.php' ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-danger alert-dismissible">
                    <center>
                        <h4><i class="fa fa-user"></i> </h4>
                    </center>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
   
<div class="inner">

    <?php
    require_once "../modelos/ptemperatura.php";
    $cones  = new ptemperatura();
    $maqv_stmt    = $cones->listar_g();

    //print_r($maqv_stmt);

    ?>

</div>



<table id="tbl-cliente" class="table table-striped table-hover">
    <thead>
        <tr class="info">
         

        </tr>
    </thead>
    <tbody>
        <?php 
       $iconos= array('fa fa-heartbeat fa-5x','fa fa-tasks fa-5x','fa fa-support fa-5x','fa fa-comments fa-5x','fa fa-tasks fa-5x','fa fa-support fa-5x','fa fa-comments fa-5x','fa fa-tasks fa-5x','fa fa-support fa-5x');
       $colores= array('panel panel-danger','panel panel-warning','panel panel-default','panel panel-warning class','panel panel-danger','panel panel-warning','panel panel-default','panel panel-warning class');?>
        <?php $cont=0; ?>
        <?php $color=0; ?>
        <?php foreach ($maqv_stmt as $resultado):?>
            <div class="col-lg-3 col-md-6">
            <div class="<?php echo $colores[$color++]?>">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="<?php echo $iconos[$cont++]?>"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>
                        
                    </div>
                </div>
            </div> 
           <a href="#">
                <div class="panel-footer">
                    <span class="pull-left"><?php
            echo '<a href="pruebas'.$resultado['codigo'].'.php?idg=' . $resultado['galpon'] . '&tmax=' . $resultado['maximotem'] . '&tmin=' . $resultado['minimotem'] . '&hum=' . $resultado['maximohum'] . '">Galpon' . $resultado['galpon'] . '</a>';?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <?php echo  $resultado['minimotem']?>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
        </div>
        <?php endforeach ?>
    
</table>

<!--cierro panel-->


</div>
<br>


<?php require_once '../contenido/foot.php' ?>

    


<?php } else {
    header("location: ../");
}
?>
