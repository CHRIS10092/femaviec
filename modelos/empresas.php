<?php 
require_once'conexion.php';
class empresas extends conexion{

	private $maqv_dbh;
	function __construct(){
		$this->maqv_dbh=conexion::Abrir();
	}

	public function Registrar($maqv_datos){
		if(self::VerificarRuc($maqv_datos)>0){
			echo 2;
		}else{
			echo self::VerificarRegistro($maqv_datos);
		}
	}


	public function VerificarRegistro($maqv_datos){
		try {

			$maqv_sql="INSERT INTO maqv_tblempresa(ruc,nombre,ciudad)VALUES(?,?,?)";
			$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1,$maqv_datos[0]);
			$maqv_stmt->bindParam(2,$maqv_datos[1]);
			$maqv_stmt->bindParam(3,$maqv_datos[2]);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}

	private function VerificarRuc($maqv_datos){

			$maqv_sql="SELECT ruc FROM maqv_tblempresa WHERE ruc=? ";
			$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1,$maqv_datos[0]);
			$maqv_stmt->execute();
			$maqv_datos=$maqv_stmt->rowCount();
			return $maqv_datos;
	}

	public function Listar(){
		$maqv_sql="SELECT * FROM maqv_tblempresa";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
		$maqv_stmt->execute();
		while($maqv_row=$maqv_stmt->fetch()){
			$data=$maqv_row->id.'||'.$maqv_row->ruc.'||'.$maqv_row->nombre.'||'.$maqv_row->ciudad;
			echo '<tr>';
			echo '<td>'.$maqv_row->ruc.'</td>';
			echo '<td>'.$maqv_row->nombre.'</td>';
			echo '<td>'.$maqv_row->ciudad.'</td>';
			echo '<td>
			         <div class="btn-group pull-left">
		    		    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-espanded="false">   
		    		        <i class="fa fa-cog"></i> Acciones <span class="caret"></span>
		    	        </button>
		    	        <ul class="dropdown-menu">
		    		        <li>
		    			        <a data-toggle="modal" data-target="#m-serviciou" onclick="capturar(\''.$data.'\')">Editar <i class="fa fa-edit"></i></a>
		    		        </li>
		    		        <li>
		    			        <a onclick="confirmar('.$maqv_row->id.')">Eliminar <i class="fa fa-trash"></i></a>
		    		        </li>
		    	        </ul>
		             </div>
			      </td>';
			echo '</tr>';

		}

	}

	
	public function Editar($maqv_datos){
		try {

			$maqv_sql="UPDATE maqv_tblempresa SET ruc=?,nombre=?,ciudad=? WHERE id=?";
			$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1,$maqv_datos[0]);
			$maqv_stmt->bindParam(2,$maqv_datos[1]);
			$maqv_stmt->bindParam(3,$maqv_datos[2]);
			$maqv_stmt->bindParam(4,$maqv_datos[3]);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}

	public function Eliminar($maqv_id){
		try {

			$maqv_sql="DELETE FROM maqv_tblempresa WHERE id=?";
			$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1,$maqv_id);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}
}