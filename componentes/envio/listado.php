<?php
require_once '../../modelos/datospollos.php';
$maqv_data = new datospollos();
$datos=$maqv_data->ListarRegistros();
//print_r($datos);
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
            <th>Bebedero</th>        
            <th>Bomba</th>
            <th>Ventilador</th>
            



        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $row) {?>
            <?php if ($row['idgalpon']==1): ?>
        <tr>
            <th><?php echo $row['id'] ?></th>
            <td> <?php echo date_format(new \DateTime($row['hora']), 'H:i:s' )?></td>
            <th><?php echo date_format(new \DateTime($row['fecha']), 'd/m/Y' )?></td>
            <th><?php echo $row['idgalpon'] ?></th>
            <th><?php echo $row['temperatura'] ?></th>
            <th><?php echo $row['humedadgalpon'] ?></th>
            <th><?php   if ($row["bebedero1"]==1) { ?>
                    <i style="color:blue" class="fa fa-circle" aria-hidden="true">Lleno</i>

                <?php } else if ($row["bebedero1"]==0) {?>
                    <i style="color:red" class="fa fa-circle-o" aria-hidden="true">Vacio</i>
                <?php } else { ?>
                    <i style="color:green" class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>
                <?php  } ?>
          
            <th><?php   if ($row["bomba1"]==1) { ?>
                <span style="color:green"> encendido</span>
                <?php } else {?>
                    <span style="color:red">apagado</span>
                <?php } ?> </th>
              
                <th><?php   if ($row["ventilador"]==1) { ?>
                <span style="color:green"> encendido</span>
                <?php } else {?>
                    <span style="color:red">apagado</span>
                <?php } ?> </th>
    </tr>
    <?php endif ?>
    <?php  } ?>
    <?php foreach ($datos as $row) {?>
            <?php if ($row['idgalpon']==2): ?>
        <tr>
            <th><?php echo $row['id'] ?></th>
            <td> <?php echo date_format(new \DateTime($row['hora']), 'H:i:s' )?></td>
            <th><?php echo date_format(new \DateTime($row['fecha']), 'd/m/Y' )?></td>
            <th><?php echo $row['idgalpon'] ?></th>
            <th><?php echo $row['temperatura'] ?></th>
            <th><?php echo $row['humedadgalpon'] ?></th>
          
            </th> <th><?php   if ($row["bebedero2"]==1) { ?>
                <i style="color:blue" class="fa fa-circle" aria-hidden="true">Lleno</i>

<?php } else if ($row["bebedero1"]==0) {?>
    <i style="color:red" class="fa fa-circle-o" aria-hidden="true">Vacio</i>
<?php } else { ?>
    <i style="color:green" class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>
<?php  } ?>          
          
                <th><?php   if ($row["bomba2"]==1) { ?>
                    <span style="color:green"> encendido</span>
                <?php } else {?>
                    <span style="color:red">apagado</span>
                <?php } ?> </th>
               
                <th><?php   if ($row["ventilador"]==1) { ?>
                <span style="color:green"> encendido</span>
                <?php } else {?>
                    <span style="color:red">apagado</span>
                <?php } ?> </th>
    </tr>
    <?php endif ?>
    <?php  } ?>
    <?php foreach ($datos as $row) {?>
            <?php if ($row['idgalpon']==2): ?>
        <tr>
            <th><?php echo $row['id'] ?></th>
            <td> <?php echo date_format(new \DateTime($row['hora']), 'H:i:s' )?></td>
            <th><?php echo date_format(new \DateTime($row['fecha']), 'd/m/Y' )?></td>
            <th><?php echo $row['idgalpon'] ?></th>
            <th><?php echo $row['temperatura'] ?></th>
            <th><?php echo $row['humedadgalpon'] ?></th>
          
             <th><?php   if ($row["bebedero3"]==1) { ?>
                <i style="color:blue" class="fa fa-circle" aria-hidden="true">Lleno</i>

<?php } else if ($row["bebedero1"]==0) {?>
    <i style="color:red" class="fa fa-circle-o" aria-hidden="true">Vacio</i>
<?php } else { ?>
    <i style="color:green" class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>
<?php  } ?>
          
          
                <th><?php   if ($row["bomba3"]==1) { ?>
                    <span style="color:green"> encendido</span>
                <?php } else {?>
                    <span style="color:red">apagado</span>
                <?php } ?> </th>
               
                <th><?php   if ($row["ventilador"]==1) { ?>
                <span style="color:green"> encendido</span>
                <?php } else {?>
                    <span style="color:red">apagado</span>
                <?php } ?> </th>
    </tr>
    <?php endif ?>
    <?php  } ?>
    <?php foreach ($datos as $row) {?>
            <?php if ($row['idgalpon']==4): ?>
        <tr>
            <th><?php echo $row['id'] ?></th>
            <td> <?php echo date_format(new \DateTime($row['hora']), 'H:i:s' )?></td>
            <th><?php echo date_format(new \DateTime($row['fecha']), 'd/m/Y' )?></td>
            <th><?php echo $row['idgalpon'] ?></th>
            <th><?php echo $row['temperatura'] ?></th>
            <th><?php echo $row['humedadgalpon'] ?></th>
          
            <th><?php   if ($row["bebedero4"]==1) { ?>
                <i style="color:blue" class="fa fa-circle" aria-hidden="true">Lleno</i>

<?php } else if ($row["bebedero1"]==0) {?>
    <i style="color:red" class="fa fa-circle-o" aria-hidden="true">Vacio</i>
<?php } else { ?>
    <i style="color:green" class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>
<?php  } ?>
          
          
                <th><?php   if ($row["bomba4"]==1) { ?>
                    <span style="color:green"> encendido</span>
                <?php } else {?>
                    <span style="color:red">apagado</span>
                <?php } ?> </th>
               
                <th><?php   if ($row["ventilador"]==1) { ?>
                <span style="color:green"> encendido</span>
                <?php } else {?>
                    <span style="color:red">apagado</span>
                <?php } ?> </th>
    </tr>
    <?php endif ?>
    <?php  } ?>
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