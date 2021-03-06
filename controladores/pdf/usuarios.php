<?php
require_once '../../template/assets/dompdf/autoload.inc.php';

use Dompdf\Dompdf;



function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

$html = file_get_contents_curl("https://femavi.com.ec/femaviec/pdf/usuariosPdf.php");


$pdf = new DOMPDF();

$pdf->set_paper("letter", "portrait");


$pdf->load_html($html, 'UTF-8');


$pdf->render();


$pdf->stream('usuarios.pdf', array('Attachment' => 0));