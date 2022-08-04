<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'conexion.php';
class usuarios extends conexion
{

	private $maqv_dbh;
	function __construct()
	{
		$this->maqv_dbh = conexion::Abrir();
	}



	public function ListarPollosTotales(){
		$sql="SELECT SUM(n_pollos) as cantidad from galpones";
		$stmt=$this->maqv_dbh->prepare($sql);
		$stmt->execute();
		$obj= new stdClass();
		while($row = $stmt->fetch()){
			$obj->cantidad=$row['cantidad'];
		}
		return $obj;
	}	
	public function Listar()
	{
		$maqv_sql = "SELECT u.id AS k ,nombre,apellido,correo,usuario,rol,idrol ,estado,cedula
		           FROM maqv_tblusuario u,maqv_tblrol r 
		           WHERE r.id=idrol ";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
		$maqv_stmt->execute();
		while ($maqv_row = $maqv_stmt->fetch()) {
			$data = $maqv_row->k . '||' . $maqv_row->nombre . '||' . $maqv_row->apellido . '||' . $maqv_row->correo . '||' . $maqv_row->usuario . '||' . $maqv_row->idrol.'||'.$maqv_row->estado.'||'.$maqv_row->cedula;
			echo '<tr>';
			echo '<td>' . $maqv_row->cedula . '</td>';
			echo '<td>' . $maqv_row->nombre . '</td>';
			echo '<td>' . $maqv_row->apellido . '</td>';
			echo '<td>' . $maqv_row->correo . '</td>';
			echo '<td>' . $maqv_row->usuario . '</td>';
			echo '<td>' . $maqv_row->rol . '</td>';
			echo '<td>' . $maqv_row->estado . '</td>';
			
			echo '<td>
			         <div class="btn-group pull-left">
		    		    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-espanded="false">   
		    		        <i class="fa fa-cog"></i> Acciones <span class="caret"></span>
		    	        </button>
		    	        <ul class="dropdown-menu">
		    		        <li>
		    			        <a data-toggle="modal" data-target="#m-usuariou" onclick="capturar(\'' . $data . '\')">Editar <i class="fa fa-edit"></i></a>
		    		        </li>
		    		        <li>
		    			        <a onclick="confirmar(' . $maqv_row->k . ')">Eliminar <i class="fa fa-trash"></i></a>
		    		        </li>
						
		    	        </ul>
		             </div>
			      </td>';
			echo '</tr>';
		}
	}


	public function ListarRoles()
	{
		$maqv_sql = "SELECT * FROM maqv_tblrol";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->setFetchMode(PDO::FETCH_OBJ);
		$maqv_stmt->execute();
		while ($maqv_row = $maqv_stmt->fetch()) {
			echo '<option value="' . $maqv_row->id . '" >' . $maqv_row->rol . '</option>';
		}
	}


	public function Registrar($maqv_datos)
	{
		if (self::VerificarUsuario($maqv_datos) > 0) {
			echo 2;
		} else if (self::VerificarCorreo($maqv_datos) > 0) {
			echo 3;
		} else {
			echo self::VerificarRegistro($maqv_datos);
		}
	}


	public function VerificarRegistro($maqv_datos)
	{
		try {

			$maqv_sql = "INSERT INTO maqv_tblusuario(nombre,apellido,correo,usuario,clave,idrol,estado,cedula)VALUES(?,?,?,?,?,?,?,?)";
			$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1, $maqv_datos[0]);
			$maqv_stmt->bindParam(2, $maqv_datos[1]);
			$maqv_stmt->bindParam(3, $maqv_datos[2]);
			$maqv_stmt->bindParam(4, $maqv_datos[3]);
			$maqv_stmt->bindParam(5, $maqv_datos[4]);
			$maqv_stmt->bindParam(6, $maqv_datos[5]);
			$maqv_stmt->bindParam(7, $maqv_datos[6]);
			$maqv_stmt->bindParam(8, $maqv_datos[7]);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	private function VerificarUsuario($maqv_datos)
	{

		$maqv_sql = "SELECT usuario FROM maqv_tblusuario WHERE usuario=? ";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1, $maqv_datos[3]);
		$maqv_stmt->execute();
		$maqv_datos = $maqv_stmt->rowCount();
		return $maqv_datos;
	}

	public function VerificarCorreo($maqv_datos)
	{

		$maqv_sql = "SELECT cedula FROM maqv_tblusuario WHERE cedula=? ";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1, $maqv_datos[7]);
		$maqv_stmt->execute();
		$maqv_datos = $maqv_stmt->rowCount();
		return $maqv_datos;
	}


	public function Editar($maqv_datos)
	{
		try {

			$maqv_sql = "UPDATE maqv_tblusuario SET nombre=?,apellido=?,correo=?,usuario=?,idrol=?,estado=?,cedula=? WHERE id=?";
			$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1, $maqv_datos[0]);
			$maqv_stmt->bindParam(2, $maqv_datos[1]);
			$maqv_stmt->bindParam(3, $maqv_datos[2]);
			$maqv_stmt->bindParam(4, $maqv_datos[3]);
			$maqv_stmt->bindParam(5, $maqv_datos[4]);
			$maqv_stmt->bindParam(6, $maqv_datos[5]);
			$maqv_stmt->bindParam(7, $maqv_datos[6]);
			$maqv_stmt->bindParam(8, $maqv_datos[7]);
			
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function Eliminar($maqv_id)
	{
		try {

			$maqv_sql = "DELETE FROM maqv_tblusuario WHERE id=?";
			$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1, $maqv_id);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function informacion_usuario($maqv_id)
	{

		$maqv_sql = "SELECT nombre,apellido,correo,rol,usuario,clave 
		FROM maqv_tblusuario u ,maqv_tblrol r 
		WHERE r.id=idrol
		AND u.id=?";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1, $maqv_id);
		$maqv_stmt->execute();
		$maqv_result = $maqv_stmt->fetchAll();
		return $maqv_result;
	}

	public function cambiar_usuario($maqv_usuario, $maqv_idusuario)
	{
		try {

			$maqv_sql = "UPDATE maqv_tblusuario SET usuario=? WHERE id=?";
			$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1, $maqv_usuario);
			$maqv_stmt->bindParam(2, $maqv_idusuario);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function cambiar_clave($maqv_clave, $maqv_idusuario)
	{
		try {

			$maqv_sql = "UPDATE maqv_tblusuario SET clave=? WHERE id=? And estado='Act'";
			$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1, $maqv_clave);
			$maqv_stmt->bindParam(2, $maqv_idusuario);
			$maqv_stmt->execute();
			echo 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function correo_existente($maqv_correo)
	{

		$maqv_sql = "SELECT correo FROM maqv_tblusuario WHERE correo=? ";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1, $maqv_correo);
		$maqv_stmt->execute();
		$maqv_datos = $maqv_stmt->rowCount();
		return $maqv_datos;
	}

	public function id_usuario($maqv_correo)
	{

		$maqv_sql = "SELECT id
		FROM maqv_tblusuario
		WHERE correo=?";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1, $maqv_correo);
		$maqv_stmt->execute();
		$maqv_result = $maqv_stmt->fetchAll();
		foreach ($maqv_result as $k) {
			$usuario = $k['id'];
		}

		return $usuario;
	}

	public function temporal($maqv_usuario, $maqv_temporal)
	{
		try {

			$maqv_sql = "INSERT INTO maqv_tblclaves(idusuario,temporal)VALUES(?,?)";
			$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
			$maqv_stmt->bindParam(1, $maqv_usuario);
			$maqv_stmt->bindParam(2, $maqv_temporal);
			$maqv_stmt->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function temporal_existente($maqv_temporal)
	{

		$maqv_sql = "SELECT temporal FROM maqv_tblclaves WHERE temporal=? ";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1, $maqv_temporal);
		$maqv_stmt->execute();
		$maqv_datos = $maqv_stmt->rowCount();
		return $maqv_datos;
	}

	public function temporal_usuario($maqv_temporal)
	{

		$maqv_sql = "SELECT idusuario FROM maqv_tblclaves WHERE temporal=? ";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1, $maqv_temporal);
		$maqv_stmt->execute();
		$maqv_stmt->execute();
		$maqv_result = $maqv_stmt->fetchAll();
		foreach ($maqv_result as $k) {
			$usuario = $k['idusuario'];
		}

		return $usuario;
	}

	public function Acceder($maqv_usuario)
	{

		$maqv_sql = "SELECT u.id,nombre,apellido,rol,idrol FROM maqv_tblusuario u ,maqv_tblrol r WHERE r.id=idrol AND u.id=?";
		$maqv_stmt = $this->maqv_dbh->prepare($maqv_sql);
		$maqv_stmt->bindParam(1, $maqv_usuario);
		$maqv_stmt->execute();
		$maqv_datos = $maqv_stmt->fetchAll();
		session_start();
		foreach ($maqv_datos as $maqv_k) {
			$_SESSION['usuario_temp'] = [
				$maqv_k[0],
				$maqv_k[1],
				$maqv_k[2],
				$maqv_k[3],
				$maqv_k[4]

			];
		}
	}



	/*public function enviar_correo($correo, $mensaje)
	{

		require_once '../../vistas/PHPMailer/Exception.php';
		require_once '../../vistas/PHPMailer/PHPMailer.php';
		require_once '../../vistas/PHPMailer/SMTP.php';
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'mail.femavi.com.ec';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'correo@femavi.com.ec';                     // SMTP username
			$mail->Password   = 'i81DU)9h7?BN';                               // SMTP password
			$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('correo@femavi.com.ec', 'Web');
			$mail->addAddress($correo, 'Proveedor');     // cliente

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Notificacion';
			$mail->Body    = $mensaje;

			$mail->send();
			//echo 'Correo se Envio Correctamente';
		} catch (Exception $e) {
			//echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}*/
}