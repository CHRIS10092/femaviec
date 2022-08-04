<?php 

require_once "conexion.php";
class htemperatura extends conexion
{
 private $maqv_dbh;
    function __construct()
    {
        $this->maqv_dbh = conexion::Abrir();
    }



public function ListarGalpon()
    {
        $maqv_sql = "SELECT * FROM galpones";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
        $maqv_stmt->execute();
        while ($maqv_row = $maqv_stmt->fetch()) {
            echo '<option value="' . $maqv_row->numero . '" >' . $maqv_row->numero . '</option>';
        }
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

            $maqv_sql = "INSERT INTO `herramientastemperatura`( `articulo`, `cantidad`, `parametro`, `fecha`, `valorUni`, `valorTot`, `observacion`, `estado`, `idempresa`) VALUES (?,?,?,?,?,?,?,?,?)";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_datos[0]);
            $maqv_stmt->bindParam(2, $maqv_datos[1]);
            $maqv_stmt->bindParam(3, $maqv_datos[2]);
            $maqv_stmt->bindParam(4, $maqv_datos[3]);
            $maqv_stmt->bindParam(5, $maqv_datos[4]);
            $maqv_stmt->bindParam(6, $maqv_datos[5]);
            $maqv_stmt->bindParam(7, $maqv_datos[6]);
            $maqv_stmt->bindParam(8, $maqv_datos[7]);
            $maqv_stmt->bindParam(9, $maqv_datos[8]);
            
            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function VerificarGalpon($maqv_datos)
    {

        $maqv_sql = "SELECT articulo FROM herramientastemperatura WHERE articulo=? ";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->bindParam(1, $maqv_datos[0]);
        $maqv_stmt->execute();
        $maqv_datos = $maqv_stmt->rowCount();
        return $maqv_datos;
    }

    public function Listar()
    {
        $maqv_sql = "SELECT * FROM herramientastemperatura";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
        $maqv_stmt->execute();
        while ($maqv_row = $maqv_stmt->fetch()) {
            $data = $maqv_row->codigo . '||' . $maqv_row->articulo . '||' . $maqv_row->cantidad . '||' . $maqv_row->parametro . '||' . $maqv_row->fecha . '||' . $maqv_row->valorUni.'||'.$maqv_row->valorTot.'||'.$maqv_row->observacion.'||'.$maqv_row->estado;
            echo '<tr>';
            echo '<td>' . $maqv_row->codigo . '</td>';
            echo '<td>' . $maqv_row->articulo . '</td>';
            echo '<td>' . $maqv_row->cantidad . '</td>';
            echo '<td>' . $maqv_row->parametro . '</td>';
            echo '<td>' . date_format(new \DateTime($maqv_row->fecha), 'd/m/Y' ) . '</td>';
            echo '<td>' . $maqv_row->valorUni . '</td>';
            echo '<td>' . $maqv_row->valorTot . '</td>';
            echo '<td>' . $maqv_row->observacion . '</td>';
            echo '<td>' . $maqv_row->estado . '</td>';


            echo '<td>
			         <div class="btn-group pull-left">
		    		    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-espanded="false">   
		    		        <i class="fa fa-cog"></i> Acciones <span class="caret"></span>
		    	        </button>
		    	        <ul class="dropdown-menu">
		    		        <li>
		    			        <a data-toggle="modal" data-target="#m-serviciou" onclick="capturar(\'' . $data . '\')">Editar <i class="fa fa-edit"></i></a>
		    		        </li>
		    		        <li>
		    			        <a onclick="confirmar(' . $maqv_row->codigo . ')">Eliminar <i class="fa fa-trash"></i></a>
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

            $maqv_sql = "UPDATE `herramientastemperatura` SET `articulo`=?,`cantidad`=?,`parametro`=?,`fecha`=?,`valorUni`=?,`valorTot`=?,`observacion`=?,`estado`=?,`idempresa`=? WHERE codigo=?";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_datos[1]);
            $maqv_stmt->bindParam(2, $maqv_datos[2]);
            $maqv_stmt->bindParam(3, $maqv_datos[3]);
            $maqv_stmt->bindParam(4, $maqv_datos[4]);
            $maqv_stmt->bindParam(5, $maqv_datos[5]);
            $maqv_stmt->bindParam(6, $maqv_datos[6]);
            $maqv_stmt->bindParam(7, $maqv_datos[7]);
            $maqv_stmt->bindParam(8, $maqv_datos[8]);
            $maqv_stmt->bindParam(9, $maqv_datos[9]);
            $maqv_stmt->bindParam(10, $maqv_datos[0]);
                        

            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function Eliminar($maqv_id)
    {
        try {

            $maqv_sql = "DELETE FROM herramientastemperatura WHERE codigo=?";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_id);
            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}