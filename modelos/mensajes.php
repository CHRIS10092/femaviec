<?php 
require_once 'conexion.php';

class mensajes extends conexion{
    private $inv;
    function __construct(){
    $this->inv=conexion::Abrir();
    }

    
    public function Listar(){
        $sql="SELECT * FROM mensajes";
        $stmt=$this->inv->prepare($sql);
        $stmt->execute();
        $rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

public function guardar($descripcion){
$sql="INSERT INTO mensajes(descripcion) values(?)";
$stmt=$this->inv->prepare($sql);
$stmt->bindParam(1,$descripcion);
$stmt->execute();
echo 1;
}

}
?>