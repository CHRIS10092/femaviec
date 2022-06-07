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
                        <h4><i class="fa fa-home"></i> Asignación de Rol</h4>
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
        <h4 class="box-title">Listado de Rol</h4>
        <button class="btn btn-default btn-group-lg pull-right" data-toggle="modal" data-target="#m-servicio">
            <i class="fa fa-plus"></i> Nuevo
        </button>
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
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="exampleModalLabel">Nuevo Rol</h4>
            </div>
            <div class="modal-body">
                <form id="frm-servicios">
                    <div class="form-group">
                        <label for="txt-descripcion" class="col-md-2 control-label">Descripcion:</label>
                        <div class="col-md-8">
                            <input type="text" name="descripcion" id="txt-descripcion" class="form-control input-sm"
                                onkeypress="return solo_letras(event)" maxlength="13">
                        </div>
                    </div><br><br>

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

                    <div class="form-group">
                        <label for="txt-rucu" class="col-md-2 control-label">Id:</label>
                        <div class="col-md-8">
                            <input type="text" readonly name="id" id="txt-id" class="form-control input-sm"
                                onkeypress="return solo_numeros(event)" maxlength="13">
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label for="txt-nombreu" class="col-md-2 control-label">Descripcion:</label>
                        <div class="col-md-8">
                           
                            <input type="text" name="descripcionu" id="txt-descripcionu" class="form-control input-sm"
                                onkeypress="return solo_letras(event)">
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
<script src="../helpers/rol.js"></script>
<?php } else {
    header("location: ../");
}
?>