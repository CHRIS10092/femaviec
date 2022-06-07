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
                        <h4><i class="fa fa-user"></i> Registro de Actividades </h4>
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
        <h4 class="box-title">Listado De Alimentación</h4>
        <button class="btn btn-default btn-group-lg pull-right" data-toggle="modal" data-target="#m-servicio">
            <i class="fa fa-plus"></i> Nuevo
        </button>
        <a href="../controladores/pdf/alimentacion.php" class="btn btn-danger" target="_blank">
                <i class="fa fa-print">Pdf</i>
            </a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="listado"></div>
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
                        <div class="col-md-6">
                            <label>Galpon</label>
                            <div id="listar-galpon" >
                                
                            </div>
                            <label>fecha</label>
                             <input class="form-control"  type="date" min="2018-07-19"
                                id="txtFecha" name="fecha" value="<?php echo $fecha; ?>" class="form-control input-sm">
                            <label>Comedero</label>
                            <select name="comedero" id="cmb-comedero" class="form-control input-sm">
                                
                               
                                <option value="Lleno">Lleno</option>
                                <option value="Vacio">Vacio</option>
                                

                            </select>
                            <label>Estado</label>
                            <select name="estado" id="cmb-estado" class="form-control input-sm">
                                
                                   <option value="0">Seleccionar</option>
                                <option value="Limpio">Limpio</option>
                                <option value="Sucio">Sucio</option>
                                

                            </select>

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
                            <label>id</label>
                            <input class="form-control" type="text" name="id" id="txt-id"
                                class="form-control input-sm">
                           <label>Galpon</label>
                            <div id="listar-galponu" >
                                
                            </div>
                            <label>fecha</label>
                            <input class="form-control"  type="date" min="2018-07-19"
                                id="txtFechau" name="fechau" class="form-control input-sm">
                            <label>Comedero</label>
                            <select name="comederou" id="cmb-comederou" class="form-control input-sm">
                                
                                <option value="Lleno">lleno</option>
                                <option value="Vacio">vacio</option>
                                

                            </select>
                            <label>Estado</label>
                            <select name="estadou" id="cmb-estadou" class="form-control input-sm">
                                
                                <option value="Limpio">Limpio</option>
                                <option value="Sucio">Sucio</option>
                                

                            </select>
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

    

<script src="../helpers/alimentacion.js"></script>
<?php } else {
    header("location: ../");
}
?>
