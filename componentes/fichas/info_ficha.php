<?php 
require_once'../../modelos/fichas.php';
$maqv_data=new fichas(); 
$row=$maqv_data->Ficha($_POST['id']);
?>
<ul class="list-group">
	<li class="list-group-item active">FICHA OCUPACIONAL</li>
	<?php foreach ($row as $k): ?>
	<li class="list-group-item"><label>HISTORIA CLINICA</label> <?php echo $k[14]; ?></li>
	<li class="list-group-item"><label>FECHA DE INICIO</label> <?php echo $k[1]; ?></li>
	<li class="list-group-item"><label>PUESTO DE TRABBAJO</label> <?php echo $k[2]; ?></li>
	<li class="list-group-item"><label>AREA DE TRABAJO</label> <?php echo $k[3]; ?></li>
	<li class="list-group-item"><label>RELIGION</label> <?php echo $k[4]; ?></li>
	<li class="list-group-item"><label>GRUPO SANGUINEO</label> <?php echo $k[5]; ?></li>
	<li class="list-group-item"><label>LATERALIDAD</label> <?php echo $k[6]; ?></li>
	<li class="list-group-item"><label>ORIENTACION SEXUAL</label> <?php echo $k[7]; ?></li>
	<li class="list-group-item"><label>IDENTIDAD DE GENERO</label> <?php echo $k[8]; ?></li>
	<li class="list-group-item"><label>ACTIVIDAD DEL TRABAJO</label> <?php echo $k[9]; ?></li>
	<li class="list-group-item"><label>DISCAPACIDAD</label> <?php echo $k[10]; ?></li>
	<li class="list-group-item"><label>TIPO DE DISCAPACIDAD</label> <?php echo $k[11]; ?></li>
	<li class="list-group-item"><label>PORCENTAJE DE DISCAPACIDAD</label> <?php echo $k[12]; ?></li>
	<?php endforeach ?>
</ul>