<?php 
require_once 'conexion.php';
class reporte extends conexion{

	private $inv_dbh;
	function __construct(){
		$this->inv_dbh=conexion::Abrir();
	}
	public function ReporteOrdenesMensuales1($anio,$mes){
		$inv_sql="SELECT * FROM insumoproduccion WHERE
		             YEAR(fecha)=?
		            AND MONTH(fecha)=?
		           ";
		$inv_stmt=$this->inv_dbh->prepare($inv_sql);
		$inv_stmt->bindParam(1,$anio);
		$inv_stmt->bindParam(2,$mes);
		$inv_stmt->execute();
		$datos=$inv_stmt->fetchAll();
		return $datos;
	}
	public function FechasCompras($inv_desde,$inv_hasta){
		$inv_sql="SELECT ip.codigo, ip.articulo, ip.cantidad, ip.fecha, ip.precioUni, ip.precioTot, ip.idempresa, e.id, e.ruc ,e.nombre FROM insumoproduccion ip, maqv_tblempresa e WHERE e.id=ip.idempresa AND ip.fecha BETWEEN ? AND ?";
		$inv_stmt=$this->inv_dbh->prepare($inv_sql);
		$inv_stmt->bindParam(1,$inv_desde);
		$inv_stmt->bindParam(2,$inv_hasta);
		$inv_stmt->setFetchMode(PDO::FETCH_OBJ);
		$inv_stmt->execute();
		while($inv_row=$inv_stmt->fetch()){
			echo '<tr>';
			echo '<td style="text-align:left">'.$inv_row->codigo.'</td>';
			echo '<td style="text-align:left">'.$inv_row->articulo.'</td>';
			echo '<td>'.$inv_row->cantidad.'</td>';
			echo '<td  style="text-align: left;">'.$inv_row->fecha.'</td>';
			echo '<td style="text-align: left;">'.($inv_row->precioTot).'</td>';
			echo '<td style="text-align: left;">'.($inv_row->precioUni).'</td>';
			
			echo '</tr>';

		}

	}

	


	


}
?>

