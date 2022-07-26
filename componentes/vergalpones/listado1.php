<?php
//print_r($_GET);
require_once "../../modelos/distribuir.php";
$obj = new  distribuir();
$lote=$_GET['lote']==0;
if( $lote) {


//echo "dato33";
$datos = $obj->listar_stock1($_GET['galpon']);
?>
<br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Código</th>
            <th>Id Artículo</th>
            <th>Nombre</th>
            <th>Galpón</th>
            <th>Cantidad Distribuidos</th>
           
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>

        <tr>
            <td> <?php echo  $dato["id_distri"] ?> </td>
            <td> <?php echo  $dato["id_articulo"] ?> </td>
            <td> <?php echo  $dato["articulo"] ?> </td>
            <td> <?php echo  $dato["id_subzonas"] ?> </td>
            <td> <?php echo  $dato["sumados"] ?> </td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php } else {
    //echo "dato1";
    $datos = $obj->listar_stock($_GET['lote'],$_GET['galpon']);
    ?>
    <br>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Stock Actual</th>
                <th>Id Artículo</th>
                <th>Artículo</th>
                <th>Cantidad Distribuidos</th>
                <th>Galpón</th>
                
                <th>Medidas</th>
                
                <th>Estado</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato) : ?>
    
            <tr>
                <td> <?php echo  $dato["stock"] ?> </td>
                <td> <?php echo  $dato["codigo"] ?> </td>
                <td> <?php echo  $dato["articulo"] ?> </td>
                <td> <?php echo  $dato["cantidad_distribuidos"] ?> </td>
                <td> <?php echo  $dato["numero"] ?> </td>
                <td> <?php echo  $dato["medidas"] ?> </td>
                
                <td> <?php echo  $dato["estado"] ?> </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php } ?>


 