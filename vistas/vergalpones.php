<?php


session_start();
require '../contenido/head.php';

if (isset($_SESSION['usuarios'])) { ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-danger alert-dismissible">
                    <center>
                        <h4><i class="fa fa-user"></i> Registro de Encendido </h4>
                          <div class="row">
        <div class="form-group row">
            <div class="col-md-2" style="padding-left: 33px;">
            
            <img src="../img/encendido.gif" width="100" height="130">
            </div>
            <div class="col-md-8" style="border-color:red;border:solid 0px;padding-bottom: 55px;">

            <div class="col-md-4">
            <label for="">Galpón</label>
            <div id="galpon"> </div>
        </div>


        <div class="col-md-4">
            <label for="">Lote</label>
            <div id="lotes"></div>
        </div>
        <br>
        <div class="col-md-3">
            
            <div>
                <button id="ver" class="form control btn btn-success" style="border-radius: 33px;" name="ver" onclick="Ver();"><i class="fa fa-search"></i>Buscar</button>
            </div>

        </div>
            </div>
            <div class="col-md-2" style="padding-left: 33px;">

            
            <img src="../img/apagado.jpg" width="100" height="130">
            </div>
            </div>
    </div>


                    </center>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
  

        <div id="listado-articulos"></div>

      
    </div>
     

      
        

    

    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/vergalpones.js"></script>
<?php } else {
    header("location: ../");
}
?>