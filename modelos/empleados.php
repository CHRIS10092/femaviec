<?php 
require_once'conexion.php';
class empleados extends conexion{

	private $maqv_dbh;
	function __construct(){
		$this->maqv_dbh=conexion::Abrir();
	}

		public function ListarEmpresas(){
		$maqv_sql="SELECT * FROM maqv_tblempresa";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
		$maqv_stmt->execute();
		while($maqv_row=$maqv_stmt->fetch()){
			echo '<option value="'.$maqv_row->id.'" >'.$maqv_row->ruc.'-'.$maqv_row->nombre.'</option>';
		}
	}


	public function Registrar($maqv_datos){
		try {

			$maqv_sql="INSERT INTO maqv_tblempleado(primer_nombre,segundo_nombre,apellido_paterno,apellido_materno,fecha,sexo,idEmpresa)VALUES(?,?,?,?,?,?,?)";
			$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1,$maqv_datos[0]);
			$maqv_stmt->bindParam(2,$maqv_datos[1]);
			$maqv_stmt->bindParam(3,$maqv_datos[2]);
			$maqv_stmt->bindParam(4,$maqv_datos[3]);
			$maqv_stmt->bindParam(5,$maqv_datos[4]);
			$maqv_stmt->bindParam(6,$maqv_datos[5]);
			$maqv_stmt->bindParam(7,$maqv_datos[6]);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}


	public function Listar(){
		$maqv_sql="SELECT e.id AS k,primer_nombre,segundo_nombre,apellido_paterno,apellido_materno, CONCAT(primer_nombre,' ',segundo_nombre,' ',apellido_paterno,' ',apellido_materno) AS usuario,idEmpresa,sexo,fecha,nombre FROM maqv_tblempleado e , maqv_tblempresa em WHERE em.id=idEmpresa";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
		$maqv_stmt->execute();
		while($maqv_row=$maqv_stmt->fetch()){
			$data=$maqv_row->k.'||'.$maqv_row->primer_nombre.'||'.$maqv_row->segundo_nombre.'||'.$maqv_row->apellido_paterno.'||'.$maqv_row->apellido_materno.'||'.$maqv_row->fecha.'||'.$maqv_row->sexo.'||'.$maqv_row->idEmpresa;
			echo '<tr>';
			echo '<td>'.$maqv_row->usuario.'</td>';
			echo '<td>'.$maqv_row->fecha.'</td>';
			echo '<td>'.$maqv_row->sexo.'</td>';
			
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
		    			        <a onclick="confirmar('.$maqv_row->k.')">Eliminar <i class="fa fa-trash"></i></a>
		    		        </li>
		    	        </ul>
		             </div>
			      </td>';
			echo '</tr>';

		}

	}


	public function Editar($maqv_datos){
		try {

			$maqv_sql="UPDATE maqv_tblempleado SET primer_nombre=?,segundo_nombre=?,apellido_paterno=?,apellido_materno=?,fecha=?,sexo=?,idEmpresa=?
			           WHERE id=?";
			$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1,$maqv_datos[0]);
			$maqv_stmt->bindParam(2,$maqv_datos[1]);
			$maqv_stmt->bindParam(3,$maqv_datos[2]);
			$maqv_stmt->bindParam(4,$maqv_datos[3]);
			$maqv_stmt->bindParam(5,$maqv_datos[4]);
			$maqv_stmt->bindParam(6,$maqv_datos[5]);
			$maqv_stmt->bindParam(7,$maqv_datos[6]);
			$maqv_stmt->bindParam(8,$maqv_datos[7]);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}

	public function Eliminar($maqv_id){
		try {

			$maqv_sql="DELETE FROM maqv_tblempleado WHERE id=?";
			$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1,$maqv_id);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}
}