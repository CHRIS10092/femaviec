<?php


session_start();
require '../contenido/head.php';
require_once '../modelos/NotasCredito.php';
$datos=new NotasCredito();
$data=$datos->GetById('3');
print_r($data);
if (isset($_SESSION['usuarios'])) { ?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<!-- /.box-header -->
			<div class="box-body">

				<div class="alert alert-danger alert-dismissible">
					<center><h4><i class="fa fa-pie-chart"></i> Generar Pdf</h4></center>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<h2 class="blue"><b>REPORTES GENERALES</b></h2>
<div class="row">
			<br>
			<div class="col-md-6">
		
				<label><b>Identificación:</b></label>
				<input type="text" readonly name="ruc" placeholder="identificacion" onkeypress="return solo_numeros(event);" id="identificacion" value="<?php echo $data->id?>" class="form-control input-sm">
				<input type="hidden" name="idcliente" id="idcliente">
			</div>
			<div class="col-md-6">
				<label><b>Fecha de Emision:</b></label>
				<input type="text" readonly name="fecha" id="fecha"  value="<?php echo $data->numero?>" placeholder="Fecha" class="form-control input-sm">
			</div>
			
	</div>
	<div class="row">
	<br>
			
		
            <div class="col-md-6">
				<label><b>Nombres:</b></label>
				<input type="text" readonly placeholder="Nombres Completos"  value="<?php echo $data->medidas?>" id="cliente" name="cliente" onkeypress="return solo_letras(event);" class="form-control input-sm">
			</div>
			<div class="col-md-6">
				<label><b>Comprobante que Modifica:</b></label>
				<input type="text" readonly name="comprobante" placeholder="Comprobante que modifica"  value="<?php echo $data->numero?>" onkeypress="return solo_numeros(event);" id="comprobante" class="form-control input-sm">

			</div>
			<div class="col-md-6">
				<label><b>Motivo que Modifica:</b></label>
				<input type="text" name="motivo" placeholder="Comprobante que modifica" value="<?php echo $data->lote?>" onkeypress="return solo_letras(event);" id="comprobante" class="form-control input-sm">

			</div>
			<br>
</div>
	</div>
	<br>


      
        

    

    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/notascredito.js"></script>
<?php } else {
    header("location: ../");
}
?>
 