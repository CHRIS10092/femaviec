<?php
require_once 'conexion.php';
class galpones extends conexion
{

    private $maqv_dbh;
    function __construct()
    {
        $this->maqv_dbh = conexion::Abrir();
    }

    public function ListarGalpones()
    {
        $maqv_sql = "SELECT * FROM galpones";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
        $maqv_stmt->execute();
        while ($maqv_row = $maqv_stmt->fetch()) {
            echo '<option value="' . $maqv_row->numero . '" >' . $maqv_row->numero . '</option>';
        }
    }


    public function ListarLotes($idgalpon)
    {
        $maqv_sql = "SELECT g.*,dt.* FROM galpones g, alimentacion dt
        where g.numero=dt.galpon
        AND g.numero=?";
        $stmt = $this->maqv_dbh->prepare($maqv_sql);
        $stmt->bindParam(1, $idgalpon);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    public function listar_datospollos($idgalpon, $idlote)
    {
        $maqv_sql = "SELECT g.*,pt.* FROM galpones g,  parametrostemperatura pt
        where g.numero=pt.galpon
        AND g.numero=?
        AND g.lote=?
        GROUP BY g.numero
        LIMIT 1";
        $stmt = $this->maqv_dbh->prepare($maqv_sql);
        $stmt->bindParam(1, $idgalpon);
        $stmt->bindParam(2, $idlote);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
public function listar_bebederos($idgalpon, $idlote)
    {
        $maqv_sql = "SELECT r.*,g.* from registros r, galpones g
        WHERE r.idgalpon=g.numero
        AND r.idgalpon=?
        AND g.lote=?
        ";
        $stmt = $this->maqv_dbh->prepare($maqv_sql);
        $stmt->bindParam(1, $idgalpon);
        $stmt->bindParam(2, $idlote);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }



    public function Registrar($maqv_datos)
    {
        if (self::VerificarGalpon($maqv_datos) > 0) {
            echo 2;
        } else {
            echo self::VerificarRegistro($maqv_datos);
        }
    }


    public function VerificarRegistro($maqv_datos)
    {
        try {

            $maqv_sql = "INSERT INTO `galpones`( `numero`, `medidas`, `n_pollos`, `lote`, `rango`, `estado`, `idempresa`) VALUES (?,?,?,?,?,?,?)";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_datos[0]);
            $maqv_stmt->bindParam(2, $maqv_datos[1]);
            $maqv_stmt->bindParam(3, $maqv_datos[2]);
            $maqv_stmt->bindParam(4, $maqv_datos[3]);
            $maqv_stmt->bindParam(5, $maqv_datos[4]);
            $maqv_stmt->bindParam(6, $maqv_datos[5]);
            $maqv_stmt->bindParam(7, $maqv_datos[6]);


            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function VerificarGalpon($maqv_datos)
    {

        $maqv_sql = "SELECT numero FROM galpones WHERE numero=? ";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->bindParam(1, $maqv_datos[0]);
        $maqv_stmt->execute();
        $maqv_datos = $maqv_stmt->rowCount();
        return $maqv_datos;
    }
        public function VerificarGalponu($galpon)
    {

        $maqv_sql = "SELECT numero FROM galpones WHERE numero=? ";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->bindParam(1, $galpon);
        $maqv_stmt->execute();
        $maqv_datos = $maqv_stmt->rowCount();
        return $maqv_datos;
    }

    public function Listar()
    {
        $maqv_sql = "SELECT * FROM galpones";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
        $maqv_stmt->execute();
        while ($maqv_row = $maqv_stmt->fetch()) {
            $data = $maqv_row->codigo . '||' . $maqv_row->numero . '||' . $maqv_row->medidas . '||' . $maqv_row->n_pollos  . '||' . $maqv_row->lote . '||' . $maqv_row->rango . '||' . $maqv_row->estado;
            $datas=$maqv_row->codigo . '||' . $maqv_row->estado;
            echo '<tr>';
            echo '<td>' .  $maqv_row->codigo . '</td>';
            echo '<td>' . $maqv_row->numero . '</td>';
            echo '<td>' . $maqv_row->medidas . '</td>';
            echo '<td>' . $maqv_row->n_pollos . '</td>';
            echo '<td>' . $maqv_row->lote . '</td>';
            echo '<td>' . $maqv_row->rango . '</td>';

            echo '<td>' . $maqv_row->estado . ' </td>';

            echo '<td>
    <div class="btn-group pull-left">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-espanded="false">
            <i class="fa fa-cog"></i> Acciones <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a data-toggle="modal" data-target="#m-serviciou" onclick="capturar(\'' . $data . '\')">Editar <i
                        class="fa fa-edit"></i></a>
            </li>
            <li>
                <a onclick="confirmar(' .$maqv_row->codigo . '||' . $maqv_row->estado. ')">Eliminar <i class="fa fa-trash"></i></a>
            </li>
        </ul>
    </div>
</td>';
            echo '</tr>';
        }
    }


 

    public function Editar($maqv_datos)
    {
        

        try {

            $maqv_sql = "UPDATE `galpones` SET `numero`=?,`medidas`=?,`n_pollos`=?,`lote`=?,`rango`=?,`estado`=?,`idempresa`=? WHERE codigo=?";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_datos[1]);
            $maqv_stmt->bindParam(2, $maqv_datos[2]);
            $maqv_stmt->bindParam(3, $maqv_datos[3]);
            $maqv_stmt->bindParam(4, $maqv_datos[4]);
            $maqv_stmt->bindParam(5, $maqv_datos[5]);
            $maqv_stmt->bindParam(6, $maqv_datos[6]);
            $maqv_stmt->bindParam(7, $maqv_datos[7]);
            $maqv_stmt->bindParam(8, $maqv_datos[0]);
            
            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function Eliminar($maqv_id,$estado)
    {
        try {

            $maqv_sql = "DELETE FROM galpones WHERE codigo=? AND estado=? ";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_id);
            $maqv_stmt->bindParam(2, $estado);
            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    //listar los galpones en vista vergalpones

}