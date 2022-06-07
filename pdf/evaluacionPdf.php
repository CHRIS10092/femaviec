<?php 
require_once'../modelos/reportes.php';
$obj=new reportes();
$row=$obj->info_paciente($_GET['id']);
 ?>
 <center><h3 style="color: red;">EVALUACION OCUPACIONAL</h3></center>
 <h4>DATOS USUARIO</h4>
 <?php foreach ($row as $k): ?>
 	<strong>Usuario: </strong><?php echo $k['usuario']; ?>
 	<strong>Sexo: </strong><?php echo $k['sexo']; ?>
 	<strong>Fecha de Nacimiento: </strong><?php echo $k['fecha']; ?>
 <h4>DATOS EMPRESA</h4>
 	<strong>Ruc: </strong><?php echo $k['ruc']; ?>
 	<strong>Ciudad: </strong><?php echo $k['ciudad']; ?>
 	<strong>Nombre Empresa: </strong><?php echo $k['nombre']; ?>
 <?php endforeach ?>

 <center><h3 style="color: red;">FICHA OCUPACIONAL</h3></center>
 <?php 
$row1=$obj->info_ficha($_GET['id']);
 ?>

 <?php foreach ($row1 as $k): ?>
 	<strong>Fecha de Ingreso: </strong><?php echo $k['fecha_inicio']; ?>
 	<strong>Puesto: </strong><?php echo $k['puesto']; ?>
 	<strong>Area: </strong><?php echo $k['area']; ?>
 	<strong>Religion: </strong><?php echo $k['religion']; ?>
 	<strong>Grupo Sanguineo: </strong><?php echo $k['grupo']; ?>
 	<strong>Lateralidad: </strong><?php echo $k['lateralidad']; ?>

 	<strong>Orientacion Sexual: </strong><?php echo $k['orientacion']; ?>
 	<strong>Identidad de Genero: </strong><?php echo $k['identidad']; ?><br>
 	<strong>Actividad: </strong><?php echo $k['actividad']; ?>
 	<strong>Discapacidad: </strong><?php echo $k['discapacidad']; ?>
 	<strong>Tipo de Discapacidad: </strong><?php echo $k['tipo']; ?>
 	<strong>Porcentaje: </strong><?php echo $k['porcentaje']; ?><br>
 	<h4 style="color: blue;">HISTORIA CLINICA: <?php echo $k['historia']; ?></h4>
 <?php endforeach ?>
 <center><h3 style="color:red">EVALUACIONES</h3></center>
  <?php 
$row2=$obj->info_evaluacion($_GET['id']);
$i=1;
 ?>

 <?php foreach ($row2 as $k): ?>
 	<h4>Evaluacion Nro: <?php echo $i; ?></h4>
 	<strong>Motivo de Consulta: </strong><?php echo $k['motivo']; ?>
 	<strong>Actividad Extra: </strong><?php echo $k['actividad_extra']; ?>
 	<strong>Enfermedad Actual: </strong><?php echo $k['enfermedad']; ?><br>
 	<strong>Tipo de Diagnostico: </strong><?php echo $k['tipo_diagnostico']; ?>
 	<strong>Diagnostico: </strong><?php echo $k['diagnostico']; ?>
 	<strong>Tipo Aptitud: </strong><?php echo $k['tipo_aptitud']; ?>
 	<strong>Aptitud para Trabajo: </strong><?php echo $k['aptitud']; ?>
 	<strong>Recomendaciones: </strong><?php echo $k['recomendacion']; ?><br><br>
 	<?php $i++; ?>
 <?php endforeach ?>