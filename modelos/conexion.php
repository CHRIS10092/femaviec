<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class conexion
{
	private function Conectar()
	{

		try {


			$maqv_dbh = new PDO('mysql:host=localhost;dbname=femaviee', 'root', '');
			$maqv_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $maqv_dbh;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function Abrir()
	{
		$maqv_dbh = self::Conectar();
		return $maqv_dbh;
	}
}