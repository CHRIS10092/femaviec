<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class conexion
{
	private function Conectar()
	{

		try {

			$maqv_dbh = new PDO('mysql:host=116.202.115.200;dbname=femavico_femavi', 'femavico_wp', 'LhEWo8xLkNtT');
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