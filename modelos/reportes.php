<?php 
require_once'conexion.php';
class reportes extends conexion{

	private $maqv_dbh;
	function __construct(){
		$this->maqv_dbh=conexion::Abrir();
	}

	public function grafico_usuarios()
	{
		$maqv_sql="SELECT COUNT(estado)AS cont,estado FROM maqv_tblusuario GROUP BY (estado)";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}
public function buscar_cliente($rucci)
    
    {

        $res     = false;
        $cliente = null;

        $sql = "SELECT * FROM tbl_clientes WHERE cli_rucci = :rucci";
        $ps  = $this->maqv_dbh->prepare($sql);
        $ps->execute([
            "rucci"      => $rucci,
            ]);

        if ($ps->rowCount() > 0) {

            $cliente = new stdClass();
            while ($rs = $ps->fetch()) {
                $cliente->nombre    = $rs['cli_nombre'];
                $cliente->apellido  = $rs['cli_apellido'];
                $cliente->direccion = $rs['cli_direccion'];
                $cliente->correo    = $rs['cli_correo'];
                $cliente->celular   = $rs['cli_celular'];
            }

            $res = true;
        }

        $respuesta = [
            "res"     => $res,
            "cliente" => $cliente,
        ];

        return $respuesta;
    }
	public function usuarios()
	{
		$maqv_sql="SELECT * FROM maqv_tblusuario ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}
	public function cuidador()
	{
		$maqv_sql="SELECT * FROM maqv_tblempleado ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}
	public function galpones()
	{
		$maqv_sql="SELECT * FROM galpones ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}
	public function alimentacion()
	{
		$maqv_sql="SELECT * FROM alimentacion ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}
	public function distribucion()
	{
		$maqv_sql="SELECT * FROM tbldistribucion ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}
	

public function insumoProduccion()
	{
		$maqv_sql="SELECT * FROM 	insumoproduccion ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}

public function datospollos(){
		$maqv_sql="SELECT * FROM 	datospollos ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;

	}

public function herramientastemperatura(){
$maqv_sql="SELECT * FROM 	herramientastemperatura ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
}
	
public function parametrosTemperatura(){
$maqv_sql="SELECT * FROM 	parametrostemperatura ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
}

public function contarpollos(){

		$sql="SELECT COUNT(A1.cantidad) as cantidad FROM datospollos A1";
        $stmt=$this->maqv_dbh->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;


}


	public function grafico_ingreso()
	{
		$maqv_sql="SELECT COUNT(idempleado) AS cont,fecha_inicio FROM maqv_tblficha GROUP BY(fecha_inicio)";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}


	public function ingresos()
	{
		$maqv_sql="SELECT primer_nombre,segundo_nombre,apellido_paterno,apellido_materno,fecha_inicio,historia,puesto FROM maqv_tblficha f , maqv_tblempleado e 
		WHERE e.id=f.idempleado";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}

	public function grafico_atenciones()
	{
		$maqv_sql="SELECT COUNT(idficha)AS cont,CONCAT(primer_nombre,' ',segundo_nombre,' ',apellido_paterno,' ',apellido_materno) AS usuario 
		FROM maqv_tblingreso i,maqv_tblficha f,maqv_tblempleado e 
		WHERE e.id=f.idempleado
		AND f.id=i.idficha
		GROUP BY (idficha)";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}

	public function atenciones()
	{
		$maqv_sql="SELECT COUNT(idficha)AS cont,CONCAT(primer_nombre,' ',segundo_nombre,' ',apellido_paterno,' ',apellido_materno) AS usuario ,historia,idficha
		FROM maqv_tblingreso i,maqv_tblficha f,maqv_tblempleado e 
		WHERE e.id=f.idempleado
		AND f.id=i.idficha
		GROUP BY (idficha)";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->execute();
		$result=$maqv_stmt->fetchAll();
		return $result;
	}

	public function info_paciente($maqv_id){

		$maqv_sql="SELECT CONCAT(primer_nombre,' ',segundo_nombre,' ',apellido_paterno,' ',apellido_materno) AS usuario,sexo,fecha,nombre,ruc,ciudad
		FROM maqv_tblempleado e , maqv_tblempresa em ,maqv_tblficha f
		WHERE em.id=idEmpresa
		AND f.idempleado=e.id
		AND f.id=?";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1,$maqv_id);
		$maqv_stmt->execute();
		$rows=$maqv_stmt->fetchAll();
		return $rows;

	}

	public function info_ficha($maqv_id){

		$maqv_sql="SELECT * FROM maqv_tblficha WHERE id=?";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1,$maqv_id);
		$maqv_stmt->execute();
		$rows=$maqv_stmt->fetchAll();
		return $rows;

	}

	public function info_evaluacion($maqv_id){

		$maqv_sql="SELECT * FROM maqv_tblingreso WHERE idficha=? ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1,$maqv_id);
		$maqv_stmt->execute();
		$rows=$maqv_stmt->fetchAll();
		return $rows;

	}

}