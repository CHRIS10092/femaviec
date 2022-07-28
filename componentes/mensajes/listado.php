<?php
require_once '../../modelos/mensajes.php';
$maqv_data = new mensajes();
$data=$maqv_data->Listar(); 
//print_r($data)?>

<table id="tbl-insumop" class="table table-striped table-hover">
    <thead>
        <tr class="info">
            <th>Id</th>
            <th>Mensaje</th>
            <th>Fecha</th>
                       
        </tr>

    </thead>
    <tbody>
        <?php foreach($data as $row){ ?>
        <tr>
            <th><?php echo $row['id_mensaje']?></th>
            <th><?php echo $row['descripcion']?></th>
            <th><?php echo $row['fecha']?></th>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script type="text/javascript">
$('#tbl-insumop').DataTable({
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