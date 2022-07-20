<?php
require_once '../../modelos/reportes.php';
$obj = new reportes();
?>
<?php if ($_POST['reportes'] == 1) { ?>
<?php
  $titulo = 'USUARIOS ACTIVOS';
  $valoresY = array();
  $valoresX = array();
  $row = $obj->grafico_usuarios();
  foreach ($row as $k) {
    $valoresY[] = $k["cont"];
    $valoresX[] = $k["estado"];
  }

  $datosX = json_encode($valoresX);
  $datosY = json_encode($valoresY);
  ?>
<?php } ?>

<script type="text/javascript">
function crearBarras(json) {
    var parsed = JSON.parse(json);
    var arr = [];
    for (var x in parsed) {
        arr.push(parsed[x]);
    }
    return arr;
}
</script>

<script type="text/javascript">
datosX = crearBarras('<?php echo $datosX ?>');
datosY = crearBarras('<?php echo $datosY ?>');
var layout = {
    title: '<?php echo $titulo; ?>',
    plot_bgcolor: '#F5F3FA',
    paper_bgcolor: '#F5F3FA',
    width: 650,
    height: 250,
    margin: {
        l: 150,
        r: 30,
        t: 70,
        b: 40
    }
};
var data = [{
    y: datosX,
    x: datosY,
    type: 'bar',
    marker: {
        color: '#19d3f3'
    },
    text: ' usuarios',
    orientation: 'h'
}];

Plotly.newPlot('grafico', data, layout);
</script>