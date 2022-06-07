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
                        <h4><i class="fa fa-user"></i> Datos de Pollo</h4>
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
        <button class="btn btn-default btn-group-lg pull-right" data-toggle="modal" data-target="#m-servicio">
            <i class="fa fa-plus"></i> Nuevo
        </button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="historial"></div>
    </div>
    <!-- /.box-body -->
    <button class="accordion">Section 1</button>
    <div class="panel">
        <p>Lorem ipsum...</p>
    </div>

    <button class="accordion">Section 2</button>
    <div class="panel">
        <p>Lorem ipsum...</p>
    </div>

    <button class="accordion">Section 3</button>
    <div class="panel">
        <p>Lorem ipsum...</p>
    </div>

</div>
<style>
/* Style the buttons that are used to open and close the accordion panel */
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active,
.accordion:hover {
    background-color: #ccc;
}

/* Style the accordion panel. Note: hidden by default */
.panel {
    padding: 0 18px;
    background-color: white;
    display: none;
    overflow: hidden;
}
</style>

<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/historial.js"></script>
<?php } else {
    header("location: ../");
}
?>