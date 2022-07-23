<?php
session_start();
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
                        <h4><i class="fa fa-user"></i> Registro de Parámetro de Temperatura y Húmedad</h4>
                    </center>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title">Listado Parámetros Temperatura</h4>
        <button class="btn btn-warning btn-group-lg" data-toggle="modal" data-target="#m-servicio">
            <i class="fa fa-plus"></i> Nuevo
        </button>
        <a href="../controladores/pdf/parametrosTemperatura.php" class="btn btn-danger" target="_blank">
                <i class="fa fa-print">Pdf</i>
            </a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="parametro"></div>
    </div>
    <!-- /.box-body -->
</div>

<!-- Modal registro -->
<div class="modal fade" id="m-servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="exampleModalLabel">Nuevo Dato</h4>
            </div>
            <div class="modal-body">
                <form id="frm-servicios">
                    <div class="row">
                        <div class="col-md-7">
                            <label>Galpón</label>
                           <div id="galpon"></div>
                            <label>Temperatura Máxima</label>
                            <input max="50" min="30" class="form-control" onkeypress="return solo_numeros(event)"  type="number"  name="max"
                                id="txtMax" class="form-control input-sm" alt="">
                            <label>Temperatura Mínima </label>
                            <input class="form-control" max="50" min="30" type="number" name="min" onkeypress="return solo_numeros(event)" id="txtMin"
                                class="form-control input-sm" alt="">
                            <label>Húmedad Máxima</label>
                            <input class="form-control" type="number" max="100" min="10" onkeypress="return solo_numeros(event)"   name="hum"
                                id="txtHum" class="form-control input-sm" alt="">
                            
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-registrar">
                    Guardar <i class="glyphicon glyphicon-floppy-disk"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="m-serviciou" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="exampleModalLabel">Editar Datos</h4>
            </div>
            <div class="modal-body">
                <form id="frm-serviciosu">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Código</label>
                            <input class="form-control" readonly type="text" name="id" id="txt-id"
                                class="form-control input-sm">
                            <label>Galpón</label>
                           <div id="galponu"></div>
                            <label>Temperatura Máxima</label>
                            <input max="50" min="30" class="form-control" onkeypress="return solo_numeros(event)"  type="number" value="0.00" name="maxu"
                                id="txtMaxu" class="form-control input-sm" alt="">
                            <label>Temperatura Mínima </label>
                            <input class="form-control" type="text" name="minu" id="txtMinu"
                                class="form-control input-sm" alt="">
                            <label>Húmedad Máxima </label>
                            <input class="form-control" type="text" onkeypress="return solo_numeros(event)"   name="humu"
                                id="txtHumu" class="form-control input-sm" alt="">
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-editar">
                    Editar <i class="glyphicon glyphicon-floppy-disk"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/ptemperatura.js"></script>
<?php } else {
    header("location: ../");
}
?>