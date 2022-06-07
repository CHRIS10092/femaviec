<?php
require_once '../../modelos/datospollos.php';
$maqv_data = new datospollos();
?>
<table id="datos-pollos" class="table table-striped table-hover">
    <thead>
        <tr class="info">
            <th>id</th>
            <th>hora</th>
            <th>fecha</th>
            <th>galpon</th>
            <th>tem</th>
            <th>Humedad</th>
            <th>b1</th>
            <th>b2</th>
            <th>b3</th>
            <th>b4</th>
            <th>Bomb1</th>
            <th>Bomb2</th>
            <th>Bomb3</th>
            <th>Bomb4</th>
            <th>ventilador</th>



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