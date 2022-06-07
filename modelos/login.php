<?php 

require_once'conexion.php';
class login extends conexion{

	private $maqv_dbh;

	function __construct(){
		$this->maqv_dbh=conexion::Abrir();
	}


    public function Verificar($maqv_datos){
		if(self::VerificarAcceso($maqv_datos)>0){

			//echo self::ingresarIntentos($maqv_datos);
			echo self::Acceder($maqv_datos);
		}else{
			echo 1;
		}
    }

	public function VerificarAcceso($maqv_datos){

		$maqv_sql="SELECT * FROM maqv_tblusuario WHERE usuario=? AND clave=? AND estado='Act' ";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
	    $maqv_stmt->bindParam(1,$maqv_datos[0]);
	    $maqv_stmt->bindParam(2,$maqv_datos[1]);
	    $maqv_stmt->execute();
	    $maqv_datos=$maqv_stmt->rowCount();
	    return $maqv_datos;
    }

	public function Intentos($maqv_datos){
		$sql="SELECT COUNT(*) `usuario` from intentos where usuario=?";
		$maqv_stmt=$this->maqv_dbh->prepare($sql);
		$maqv_stmt->bindParam(1,$maqv_datos[0]);

	    //echo $sql;
	    $maqv_stmt->execute();
	    $maqv_datos=$maqv_stmt->rowCount();
	    return $maqv_datos;
	    
	}

	public function Ir($maqv_datos){
		
		try{
			$sql="UPDATE maqv_tblusuario SET estado='Ina' WHERE usuario=?";
		$maqv_stmt=$this->maqv_dbh->prepare($sql);
		$maqv_stmt->bindParam(1,$maqv_datos);

	    
	    $maqv_stmt->execute();
	    echo 3 ;
	    }catch(Exception $e){
	echo $e->getMessage();
		}
	    
	    
	}

public function ingresarIntentos($maqv_datos){
	
	try{
		$sql="INSERT INTO intentos(usuario) values(?)";
		$stmt=$this->maqv_dbh->prepare($sql);
		$stmt->bindParam(1,$maqv_datos[0]);
		$stmt->execute();
		echo 1;
	}catch(Exception $e){
	echo $e->getMessage();
}

}
    public function Acceder($maqv_datos){

		$maqv_sql="SELECT u.id,nombre,apellido,rol,idrol FROM maqv_tblusuario u ,maqv_tblrol r WHERE r.id=idrol AND usuario=? AND clave=?";
		$maqv_stmt=$this->maqv_dbh->prepare($maqv_sql);
	    $maqv_stmt->bindParam(1,$maqv_datos[0]);
	    $maqv_stmt->bindParam(2,$maqv_datos[1]);
	    $maqv_stmt->execute();
	    $maqv_datos=$maqv_stmt->fetchAll();
	    //session_start();
	    foreach ($maqv_datos as $maqv_k) {
	    	$_SESSION['usuarios']=[
                $maqv_k[0],
	    	    $maqv_k[1],
	    	    $maqv_k[2],
	    	    $maqv_k[3],
	    	    $maqv_k[4]
	    	    	
	    	];
	    }

	    echo 2;
	    
    }


}