<?php
/**
 * 
 */
require_once "conexion.php";
class distribuir extends conexion
{
	private $maqv_dbh;
	function __construct()
	{
		$this->maqv_dbh = conexion::Abrir();
	}

	public function listar_tipos(){
		$sql="SELECT * FROM insumoproduccion ";
		$ps = $this->maqv_dbh->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}

	public function listar_articulos($tipo){
		$sql="SELECT * FROM insumoproduccion WHERE tipo=:tipo";
		$ps = $this->maqv_dbh->prepare($sql);
		$ps->execute(["tipo"=>$tipo]);
		$rs = $ps->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}

	public function listar_stock($codigo,$galpon){
		$sql="SELECT s.cantidad as stock , SUM(d.cantidad) as cantidad_distribuidos,d.id_subzonas ,s.codigo,s.articulo,g.numero,g.medidas,g.n_pollos,g.rango,g.estado from insumoproduccion s,tbldistribucion d,galpones g
		where d.id_articulo=s.codigo
		AND g.numero=d.id_subzonas
		AND s.codigo=:codigo
		AND d.id_subzonas=:idgalpon";
	$stmt=$this->maqv_dbh->prepare($sql);
	$stmt->execute([
		"codigo"=>$codigo,
		"idgalpon"=>$galpon,
	]);

	$rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $rs;
	}
	public function listar_stock1($galpon){
		$sql="SELECT sum(d.cantidad) as sumados,d.*,i.* FROM tbldistribucion d, insumoproduccion i WHERE d.id_subzonas=:idgalpon
		AND d.id_articulo=i.codigo GROUP by `id_articulo`";
	$stmt=$this->maqv_dbh->prepare($sql);
	$stmt->execute([
	
		"idgalpon"=>$galpon,
	]);

	$rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $rs;
	}
	public function  listar_distribucion(){
		$sql="SELECT * FROM tbldistribucion";
		$stmt=$this->maqv_dbh->prepare($sql);
		$stmt->execute();
		$rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}

	public function listar_zonas(){
		$sql="SELECT * FROM galpones";
		$ps = $this->maqv_dbh->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}

	public function listar_subzonas($zona){
		$sql="SELECT * FROM registros WHERE idgalpon=:zona";
		$ps = $this->maqv_dbh->prepare($sql);
		$ps->execute(["zona"=>$zona]);
		$rs = $ps->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}


	public function insertardistri($datos){
		$sql="INSERT INTO tbldistribucion(id_articulo,id_subzonas,cantidad) values (?,?,?)";
		$ps = $this->maqv_dbh->prepare($sql);
		$ps->bindParam(1,$datos[0]);
		$ps->bindParam(2,$datos[1]);
		$ps->bindParam(3,$datos[2]);
		
		$d=$ps->execute();
		return $d;
		
	}

	public function stock_articulo($id){
		$sql="SELECT cantidad FROM insumoproduccion WHERE codigo=:id";
		$ps = $this->maqv_dbh->prepare($sql);
		$ps->execute(["id"=>$id]);
		$articulo =new stdClass();
		while($row = $ps->fetch()){
			$articulo->cantidad = $row["cantidad"];
		}

		return $articulo;
	}

	public function actualizar_stock($articulo,$cantidad){
		$sql="UPDATE insumoproduccion  SET cantidad=:cantidad WHERE codigo=:articulo ";
		$ps = $this->maqv_dbh->prepare($sql);
		$ps->execute([
			            "cantidad"=>$cantidad,
			            "articulo"=>$articulo
		            ]);
		
	}

}

?>