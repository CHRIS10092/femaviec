<?php
session_start();

require_once "../contenido/head.php"?>

<div class="row">

        <label>ESCOGER USUARIO</label>

</div>
<br>
<br>






<?php require_once "../contenido/foot.php"?>
<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$mensaje = "hola como estas es una prueba";
require "../contenido/librerias/PHPMailer/Exception.php";
require "../contenido/librerias/PHPMailer/SMTP.php";
require "../contenido/librerias/PHPMailer/PHPMailer.php";

$mail = new PHPMailer(true);

try {

    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host       = 'mail.femavi.com.ec'; // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = 'correo@femavi.com.ec'; // SMTP username
    $mail->Password   = ';+k7x(QWmJAL'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465; // TCP port to connect to

    //Recipients
    $mail->setFrom('correo@femavi.com.ec', 'M');
    $mail->addAddress('koriche001@gmail.com', 'femavi'); // Add a recipient
    $mail->addAddress('alexsalguero1999.al@gmail.com', 'femavi'); // Add a recipient
    

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'datos de prueba';
    $mail->Body    = 'ejemplo de sistema mascota urbana';

    $mail->send();
    echo 'el message se envio correctamente';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

//echo $factura->registrar_factura();

?>
