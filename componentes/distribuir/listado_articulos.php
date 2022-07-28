<?php
require_once "../../modelos/distribuir.php";
$obj=new  distribuir();
$datos = $obj->listar_articulos($_GET["tipo"]);
?>

<table class="table table-striped" id="td">
	<thead>
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Fecha</th>
			<th>Tipo</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($datos as $dato):?>
				<?php 
		$data=$dato["codigo"]."||".$dato["cantidad"];
		?>
		<tr>
			<td><?php echo  $dato["codigo"]?>	</td>
			<td><?php echo  $dato["articulo"]?>	</td>
			<td><?php echo  $dato["cantidad"]?>	</td>
			<td><?php echo date_format(new \DateTime($dato["fecha"]),'d-m-Y')?>	</td>
			<td><?php echo  $dato["tipo"]?>	</td>
			<td>
				<button class="btn btn-primary" onclick="listar_zonas('<?php echo $data  ?>')">Distribuir</button>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
<script type="text/javascript">
	$('#td').DataTable({
     language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
});
</script>