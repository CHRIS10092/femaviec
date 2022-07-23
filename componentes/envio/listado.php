<?php
require_once '../../modelos/datospollos.php';
$maqv_data = new datospollos();
?>
<table id="datos-pollos" class="table table-striped table-hover">
    <thead>
        <tr class="info">
            <th>Id</th>
            <th>Hora</th>
            <th>Fecha</th>
            <th>Galpón</th>
            <th>Tem</th>
            <th>Húmedad</th>
            <th>B1</th>
            <th>B2</th>
            <th>B3</th>
            <th>B4</th>
            <th>Bomb1</th>
            <th>Bomb2</th>
            <th>Bomb3</th>
            <th>Bomb4</th>
            <th>Ventilador</th>



        </tr>
    </thead>
    <tbody>
        <?php echo $maqv_data->ListarRegistros(); ?>
    </tbody>
</table>
<script type="text/javascript">
$('#datos-pollos').DataTable({
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