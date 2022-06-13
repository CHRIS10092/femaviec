<?php

class db
{
  
	private $servidor = "localhost";
	private $db = "femaviee";
	
	private $charset = "utf8";
	private $usuario = "root";
	private $contrasena = "";

	public $pdo = null;
	private $opciones = [PDO::ATTR_CASE => PDO::CASE_LOWER, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
	function __construct()
	{
		$this->pdo = new PDO("mysql:host={$this->servidor};dbname={$this->db};charset={$this->charset}", $this->usuario, $this->contrasena, $this->opciones);
	}

	public function getServidor():string
	{
		return $this->servidor;
	}

		public function getdb():string
	{
		return $this->db;
	}

		public function getPort():string
	{
		return $this->port;
	}

		public function getCharset():string
	{
		return $this->charset;
	}

		public function getUsuario():string
	{
		return $this->usuario;
	}

		public function getContrasena():string
	{
		return $this->contrasena;
	}

	public function getUnixSocket()
	{
		return $thi->unix_socket;
	}

} 


