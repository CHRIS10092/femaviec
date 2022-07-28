
<?php 
require_once'../modelos/reporte.php';
$adchb_data=new reporte(); 
?>
<style type="text/css">
	*{
		margin: 0;
		padding-right: 10px;
		padding-left: 10px;
	}
	table {
   width: 100%;
   border: 1px solid #999;
   text-align: left;
   border-collapse: collapse;
   margin: 0 0 1em 0;
   caption-side: top;
}
caption, td, th {
   padding: 0.3em;
}
th, td {
   border-bottom: 1px solid #999;
   width: 25%;
}
caption {
   font-weight: bold;
   font-style: italic;
}
img{
    width: 220px;
    heigth: 12px;
    margin-left:253px;
}
.centro{
    float:center;
    
     /*border: 1px solid #999;*/
    }
.derecha{
    float:right;
    
     /*border: 1px solid #999;*/
    }
    .izquierda{
        float:left;
        font-size:12px;
        margin-top:0px;
    margin-bottom: 0px;
    padding-left:40px;

        /*border: 1px solid #999;*/
    }
</style>

<div class="row">

<div class="derecha">
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Dirección:Bucay</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Página Web:Femavi.com.ec</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Correo:correo@femavi.com.ec</p>
</div>
<div class="centro">
<img src="../../img/f.png">

</div>
<div class="izquierda">
<p style="font-size:16px;padding-top: 1px;margin-top:-3px;">RUCCI:1725261521001</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Teléfono:0980073905</p>

</div>
</div>
<br>
<br>
<br>
<br>
<br>

<span style="display:block;text-align: right;font-size: 18px;color: #F73E07;margin-bottom:75px; ">Reporte  Por Fechas</span>
<center><h3>FECHAS <?php echo $_GET['desde'] ?> al <?php echo $_GET['hasta'] ?></h3></center><br>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Articulo</th>
			<th>Cantidad</th>
			<th >Fecha</th>
			<th >Costo</th>
			<th>Total</th>
			<th>Ruc</th>
			

		</tr>
	</thead>
	<tbody>
		<?php echo $adchb_data->FechasCompras($_GET['desde'],$_GET['hasta']); ?>
	</tbody>
</table>
<hr style="border: 1px solid blue;">
