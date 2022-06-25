<?php
error_reporting(0);
session_start();
require_once 'conexion.php';


class Procesar extends config
{

    private $db;

    public function __construct()
    {

        $this->db = config::Abrir();
    }


 public function buscar_cliente($rucci)
    
    {

        $res     = false;
        $cliente = null;

        $sql = "SELECT * FROM insumoproduccion WHERE cli_rucci = :rucci";
        $ps  = $this->db->prepare($sql);
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
}