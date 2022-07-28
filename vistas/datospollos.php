<?php
session_start();
date_default_timezone_set("America/Guayaquil");
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
                        <h4><i class="fa fa-user"></i> Registro de Datos de Pollo por Enfermedad o Tratamiento</h4>
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
        <h4 class="box-title">Listado Datos Pollos</h4>
        <button class="btn btn-warning btn-group-lg" data-toggle="modal" data-target="#m-servicio">
            <i class="fa fa-plus"></i> Nuevo
        </button>
        <a href="../controladores/pdf/datospollos.php" class="btn btn-danger" target="_blank">
                <i class="fa fa-print">Pdf</i>
            </a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="datospollos"></div>
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
                            <label>Caso</label>
                            <select name="caso" id="txtCaso" class="form-control input-sm">
                                <option value="Mortalidad">Mortalidad</option>
                                <option value="Enfermedad">Enfermedad</option>
                                <option value="Tratamiento">Tratamiento</option>

                            </select>
                            
                          <!--  <label>Cantidad</label>
                            <input max="1000000" min="0"  class="form-control" type="number" name="cantidad"
                                id="txtCantidad" class="form-control input-sm">
-->
                            <label>Rango</label>
                            <select name="rango" id="txtRango" class="form-control input-sm">
                                <option value="Pequeno">Pequeno</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Grande">Grande</option>

                            </select>
            <label for="">Galpón</label>
            <div id="galpon"> </div>
        


        
                        </div>
                        <div class="col-md-6">
                        
            <label for="">Lote</label>
            <div id="lotes"></div>
            <br>
        
                            <label>Responsable</label>
                            <div id="listar-responsable"></div>
                            <label>Observación</label>
                            <input class="form-control" type="text" name="observacion" id="txtObservacion"
                                class="form-control input-sm">

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
                            <label>Caso</label>
                            <select name="casou" id="txtCasou" class="form-control input-sm">
                                <option value="Mortalidad">Mortalidad</option>
                                <option value="Enfermedad">Enfermedad</option>
                                <option value="Tratamiento">Tratamiento</option>

                            </select>
                            <label>Cantidad</label>
                            <input max="1000000" min="0" class="form-control" type="number" name="cantidadu"
                                id="txtCantidadu" class="form-control input-sm">
                              <label>Rango</label>
                            <select name="rangou" id="txtRangou" class="form-control input-sm">
                                <option value="Pequeno">pequeño</option>
                                <option value="Mediano">mediano</option>
                                <option value="Grande">grande</option>

                            </select>
                         
                          
                        </div>
                        <div class="col-md-6">
                              <label>Galpón</label>
                            <select name="galponu" id="txtGalponu" class="form-control input-sm">
                                <option value="1">1</option>
                                <option value="23">23</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="100">100</option>

                            </select>
                               <label>Lote</label>
                            <select name="loteu" id="txtLoteu" class="form-control input-sm">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">1</option>
                                <option value="4">2</option>
                                

                            </select>
                            <label>Responsable</label>
                            <div id="listar-responsableu"></div>
                            <label>Observación</label>
                            <input class="form-control" type="text" name="observacionu" id="txtObservacionu"
                                class="form-control input-sm">

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
<script src="../helpers/datospollos.js"></script>
<?php } else {
    header("location: ../");
}
?>