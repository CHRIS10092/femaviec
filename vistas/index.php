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
                        <h4><i class="fa fa-user"></i> </h4>
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
        <h4 class="box-title">Descargar Respaldos Base de datos</h4>
        <?php
        if ($_POST)
{
	if ($_POST["backup"])
	{
		require("backup.php");
		$backupdb = new backupdb();
		echo "<a target='_blank' class='btn btn-success' href='{$backupdb->getRuta()}'>Descargar archivo .sql</a>";
	}
}
?>
<form method="post">
	<input type="hidden" value="true" name="backup">
	<input type="submit" value="Realizar copia de respaldo.">
</form>
    </div>
  
</div>

<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/historial.js"></script>
<?php } else {
    header("location: ../");
}
?>
<?php
