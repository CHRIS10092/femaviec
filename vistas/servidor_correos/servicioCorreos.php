<?php
require_once '../../modelos/conexion.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class ServicioCorreos extends conexion
{

    private $host_correo     = "mail.femavi.com.ec";
    private $correo_origen   = "correo@femavi.com.ec";
    private $password_correo = "i81DU)9h7?BN";

    private $db;

    public function __construct()
    {

        $this->db = conexion::Abrir();
    }

    private function servicio($correo_destino, $mensaje_destino)
    {

        $res = false;

        require_once '../../vistas/PHPMailer/Exception.php';
        require_once '../../vistas/PHPMailer/PHPMailer.php';
        require_once '../../vistas/PHPMailer/SMTP.php';

        $mail = new PHPMailer(true);

        try {

            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = $this->host_correo;
            $mail->SMTPAuth   = true;
            $mail->Username   = $this->correo_origen;
            $mail->Password   = $this->password_correo;
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom($this->correo_origen, ' Femavi');
            $mail->addAddress($correo_destino, 'Usuario');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Control De Alertas y Envio';
            $mail->Body    = $mensaje_destino;

            $mail->send();
            $res = true;
        } catch (Exception $e) {
            //print $e->getMessage();
        }

        return $res;
    }

  

    public function enviar_email($cuenta_correo, $mensaje)
    {

        return self::servicio($cuenta_correo, $mensaje);
    }

    public function verificar_correo($correo)
    {

        $res = false;

        $sql = "SELECT * FROM tbl_usuarios WHERE usu_correo = :correo";

        $ps = $this->db->prepare($sql);
        $ps->execute([
            "correo" => $correo,
        ]);

        if ($ps->rowCount() > 0) {
            $res = true;
        }

        return $res;
    }
}