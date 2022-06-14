<?php
require_once 'conexion.php';
class datos extends conexion
{

    private $maqv_dbh;
    function __construct()
    {
        $this->maqv_dbh = conexion::Abrir();
    }

    public function listadoempresasventas1()
    {
        $maqv_sql = "SELECT * FROM galpones";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
        $maqv_stmt->execute();
        while ($maqv_row = $maqv_stmt->fetch()) {
            echo '<option value="' . $maqv_row->numero . '" >' . $maqv_row->numero . '</option>';
        }
    }

    public function listadoempresasventas()
    {
        $sql="SELECT g.*,dt.*,pt.*,ht.* FROM galpones g, alimentacion dt, parametrostemperatura pt, herramientastemperatura ht ,insumoproduccion ip
        where g.numero=dt.galpon
        AND g.numero=23
        AND g.numero=pt.galpon
        AND g.idempresa=ht.idempresa
        AND ip.idempresa=g.idempresa";

        //ejecuto la sentencia sql
        $maqv_sql = "SELECT * from galpones ";
        //preparo la consulto
        $inv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        //le trasnformo a obj

        $inv_stmt->setFetchMode(PDO::FETCH_OBJ);
        //ejecuto
        $inv_stmt->execute();
        //comparo si estan las mismas columnas en la base de datos
        while ($maqv_row = $inv_stmt->fetch()) {
            # code...
            $data = $maqv_row->codigo . '||' . $maqv_row->numero . '||' . $maqv_row->medidas . '||' . $maqv_row->n_pollos  . '||' . $maqv_row->lote . '||' . $maqv_row->rango . '||' . $maqv_row->estado;
            echo '<tr>';

            echo '<td>' . $maqv_row->codigo . '</td>';
            echo '<td>' . $maqv_row->numero . '</td>';
            echo '<td>' . $maqv_row->medidas . '</td>';

            echo '<td>

            <button class="btn btn-success"  onclick="capturarempresa(\'' . $data . '\')">
            <i class="glyphicon glyphicon-edit"></i>
            </button>


            </td>';
            echo '</tr>';
        }
    }
}