<?php 

require_once "conexion.php";
class ptemperatura extends conexion
{
 private $maqv_dbh;
    function __construct()
    {
        $this->maqv_dbh = conexion::Abrir();
    }


public function listar_g()
    {

        
        $maqv_sql = 'SELECT * FROM parametrostemperatura';
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);        
        $maqv_stmt->execute();
        $rs = $maqv_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
        
    }
    

    public function Listar_Galpon1($num){
        $sql="SELECT * FROM parametrostemperatura WHERE galpon=? ";
        $stmt=$this->maqv_dbh->prepare($sql);
        $stmt->bindParam(1,$num);
        $stmt->execute();
        $obj=new StdClass();

        while($row = $stmt->fetch())
        
        {
            $obj->galpon=$row['galpon'];
            $obj->maximotemp=$row['maximotem'];
            $obj->minimotemp=$row['minimotem'];
            $obj->maximohum=$row['maximohum'];
           
        }

        return $obj;
    }
    public function Listar_Galpon2($num){
        $sql="SELECT * FROM parametrostemperatura WHERE galpon=? ";
        $stmt=$this->maqv_dbh->prepare($sql);
        $stmt->bindParam(1,$num);
        $stmt->execute();
        $obj=new StdClass();

        while($row = $stmt->fetch())
        
        {
            $obj->galpon=$row['galpon'];
            $obj->maximotemp=$row['maximotem'];
            $obj->minimotemp=$row['minimotem'];
            $obj->maximohum=$row['maximohum'];
           
        }

        return $obj;
    }
    public function Listar_Galpon3($num){
        $sql="SELECT * FROM parametrostemperatura WHERE galpon=? ";
        $stmt=$this->maqv_dbh->prepare($sql);
        $stmt->bindParam(1,$num);
        $stmt->execute();
        $obj=new StdClass();

        while($row = $stmt->fetch())
        
        {
            $obj->galpon=$row['galpon'];
            $obj->maximotemp=$row['maximotem'];
            $obj->minimotemp=$row['minimotem'];
            $obj->maximohum=$row['maximohum'];
           
        }

        return $obj;
    }
    public function Listar_Galpon4($num){
        $sql="SELECT * FROM parametrostemperatura WHERE galpon=? ";
        $stmt=$this->maqv_dbh->prepare($sql);
        $stmt->bindParam(1,$num);
        $stmt->execute();
        $obj=new StdClass();

        while($row = $stmt->fetch())
        
        {
            $obj->galpon=$row['galpon'];
            $obj->maximotemp=$row['maximotem'];
            $obj->minimotemp=$row['minimotem'];
            $obj->maximohum=$row['maximohum'];
           
        }

        return $obj;
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

            $maqv_sql = "INSERT INTO `parametrostemperatura`( `galpon`, `maximotem`, `minimotem`, `maximohum`,  `idempresa`) VALUES (?,?,?,?,?)";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_datos[0]);
            $maqv_stmt->bindParam(2, $maqv_datos[1]);
            $maqv_stmt->bindParam(3, $maqv_datos[2]);
            $maqv_stmt->bindParam(4, $maqv_datos[3]);
            $maqv_stmt->bindParam(5, $maqv_datos[4]);
            
            
            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function VerificarGalpon($maqv_datos)
    {

        $maqv_sql = "SELECT galpon FROM parametrostemperatura WHERE galpon=? ";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->bindParam(1, $maqv_datos[0]);
        $maqv_stmt->execute();
        $maqv_datos = $maqv_stmt->rowCount();
        return $maqv_datos;
    }

    public function Listar()
    {
        $maqv_sql = "SELECT * FROM parametrostemperatura";
        $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
        $maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
        $maqv_stmt->execute();
        while ($maqv_row = $maqv_stmt->fetch()) {
            $data = $maqv_row->codigo . '||' . $maqv_row->galpon . '||' . $maqv_row->maximotem . '||' . $maqv_row->minimotem . '||' . $maqv_row->maximohum.'||'.$maqv_row->idempresa;
            echo '<tr>';
            echo '<td>' . $maqv_row->codigo . '</td>';
            echo '<td>' . $maqv_row->galpon . '</td>';
            echo '<td>' . $maqv_row->maximotem . '</td>';
            echo '<td>' . $maqv_row->minimotem . '</td>';
            echo '<td>' . $maqv_row->maximohum . '</td>';


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

            $maqv_sql = "UPDATE `parametrostemperatura` SET `galpon`=?,`maximotem`=?,`minimotem`=?,`maximohum`=?,`idempresa`=? WHERE codigo=?";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_datos[1]);
            $maqv_stmt->bindParam(2, $maqv_datos[2]);
            $maqv_stmt->bindParam(3, $maqv_datos[3]);
            $maqv_stmt->bindParam(4, $maqv_datos[4]);
            $maqv_stmt->bindParam(5, $maqv_datos[5]);
            $maqv_stmt->bindParam(6, $maqv_datos[0]);
                        

            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function Eliminar($maqv_id)
    {
        try {

            $maqv_sql = "DELETE FROM parametrostemperatura WHERE codigo=?";
            $maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
            $maqv_stmt->bindParam(1, $maqv_id);
            $maqv_stmt->execute();
            echo 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}