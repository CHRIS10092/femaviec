<?php

date_default_timezone_set("America/Guayaquil");
//$fecha = date("Y-m-d");
require_once '../../clases/procesar.php';
require_once '../servidor_correos/servicioCorreos.php';

$obj = new Procesar;


$factura         = json_decode($_POST['factura']);
$factura_cliente = $factura->cliente;
$cliente         = [
    "rucci"     => $factura_cliente->rucci,
    "nombre"    => $factura_cliente->nombre,
    "apellido"  => $factura_cliente->apellido,
    "direccion" => $factura_cliente->direccion,
    "correo"    => $factura_cliente->correo,
    "celular"   => $factura_cliente->celular,
    "empresa"   => $_SESSION['empresa']['idempresa'],

];

$venta = [

    "numero"     => $factura->numero,
    "fecha"      => $factura->fecha,
    "subtotal"   => $factura->subtotal,
    "iva"        => $factura->iva,
    "total"      => $factura->total,
    "cliente"    => $factura_cliente->rucci,
    "empresa"    => $_SESSION['empresa']['idempresa'],
    "idsucursal" => $_SESSION['sucursal']['codigo'],
    "estado"        => 1,
    "xml"           => 1, //CrearXml($factura, $cliente, $factura->fecha),
    "numeroEmision" => 1, //CrearNumeroEmision($factura->fecha, $factura->numero),
];


if ($obj->verificar_cliente($factura_cliente->rucci, $_SESSION['empresa']['idempresa'])) {
    $obj->actualizar_cliente($cliente);
} else {
    $obj->registrar_cliente($cliente);
}

$items = $factura->detalle;
$obj->registrar_venta($venta);



for ($i = 0; $i < count($items); $i++) {
    $total = $items[$i]->cantidad * $items[$i]->precio;

    $detalle = [
        "cantidad" => $items[$i]->cantidad,
        "precio"   => $items[$i]->precio,
        "total"    => $total,
        "venta"    => $factura->numero,
        "articulo" => $items[$i]->articulo,
    ];

    $cantidad_actual = $obj->stock_actual($items[$i]->articulo, $_SESSION['empresa']['idempresa']);
    $cantidad_nueva  = $cantidad_actual - $items[$i]->cantidad;
    $obj->registrar_detalle($detalle);
    $obj->actualizar_stock($cantidad_nueva, $items[$i]->articulo, $_SESSION['empresa']['idempresa']);
}

$res     = true;
$mensaje = "Venta Realizada Correctamente";

envio_cliente($factura_cliente, $factura);
envio_admin($items, $factura_cliente);

$respuesta = [
    "mensaje" => $mensaje,
    "res"     => $res,

];

print_r(json_encode($respuesta));

function envio_cliente($cliente, $factura)
{

    $servicio = new ServicioCorreos;
    $sms      = "Cliente Reciba un cordial saludo de parte de la empresa Mascota Urbana,su venta de chips para el RUC/CI:" . $cliente->rucci . "Nombre:" . $cliente->nombre . "Apellido:" . $cliente->apellido . "Direccion:" . $cliente->direccion . "Telefono:" . $cliente->celular . "Correo:" . $cliente->correo . "Factura:" . $factura->numero;

    $servicio->enviar_email($cliente->correo, $sms);
}

function envio_admin($items, $cliente)
{



    $servicio = new ServicioCorreos;
    $sms      = "La empresa" . $_SESSION['empresa']['nombre'] . " ha vendido los siguientes productos:";

    for ($i = 0; $i < count($items); $i++) {

        $sms .= "Cantidad" . $items[$i]->cantidad;
        $sms .= "Precio" . $items[$i]->precio;
        $sms .= "CodigoProducto" . $items[$i]->articulo;
    }

    $sms .= "al cliente RUC/CI:" . $cliente->rucci . "Nombre:" . $cliente->nombre . "Apellido:" . $cliente->apellido . "Direccion:" . $cliente->direccion . "Telefono:" . $cliente->celular . "Correo:" . $cliente->correo . "se ha realizado de manera correcta";

    $servicio->enviar_email("koriche001@gmail.com", $sms);
}

/*

function formato_fecha($fecha)
{
    $fecha = explode("-", $fecha);
    $fecha = array_reverse($fecha);
    $fecha = implode("", $fecha);
    return $fecha;
}

function CrearNumeroEmision($fecha, $secuencia)
{
    date_default_timezone_set("America/Guayaquil");
    $fecha = date("Y-m-d");

    $fecha             = explode("-", $fecha);
    $fecha             = array_reverse($fecha);
    $fecha             = implode("", $fecha);
    $tipoComprobante   = "01";
    $numeroRuc         = $_SESSION['empresa']['ruc'];
    $tipoAmbiente      = $_SESSION['empresa']['ambiente'];
    $serie             = $_SESSION['sucursal']['numest_suc'] . $_SESSION['sucursal']['numfact_suc'];
    $secuencial        = $secuencia;
    $codigoNumerico    = "12345678";
    $tipoEmision       = 1;
    $claveAcceso       = $fecha . $tipoComprobante . $numeroRuc . $tipoAmbiente . $serie . $secuencial . $codigoNumerico . $tipoEmision;
    $digitoVerificador = modulo_11($claveAcceso);
    $numeroEmision     = $claveAcceso . $digitoVerificador;
    return $numeroEmision;
}
function modulo_11($claveAcceso)
{

    while ($claveAcceso[0] == "0") {
        $claveAcceso = substr($claveAcceso, 1);
    }
    $factor = 2;
    $suma   = 0;
    for ($i = strlen($claveAcceso) - 1; $i >= 0; $i--) {
        $suma += $factor * $claveAcceso[$i];
        $factor = $factor % 7 == 0 ? 2 : $factor + 1;
    }
    $digitoVerificador = 11 - $suma % 11;
     --Por alguna razón me daba que 11 % 11 = 11. Esto lo resuelve. 
    $digitoVerificador = $digitoVerificador == 11 ? 0 : ($digitoVerificador == 10 ? 1 : $digitoVerificador);
    return $digitoVerificador;
}
*/
/*function CrearXml($factura, $cliente, $fecha)
{

    $formatoXml = '<?xml version="1.0" encoding="UTF-8"?>

<factura version="1.0.0" id="comprobante">
    <infoTributaria>
        <ambiente>1</ambiente>
        <tipoEmision>1</tipoEmision>
        <razonSocial>' . $_SESSION['empresa']['nombre'] . '</razonSocial>
        <nombreComercial>' . $_SESSION['empresa']['nombre'] . '</nombreComercial>
        <ruc>' . $_SESSION['empresa']['ruc'] . '</ruc>
        <claveAcceso>01</claveAcceso>
        <codDoc>01</codDoc>
        <estab>' . $_SESSION['sucursal']['numest_suc'] . '</estab>
        <ptoEmi>' . $_SESSION['sucursal']['numfact_suc'] . '</ptoEmi>
        <secuencial>' . $factura->numero . '</secuencial>
        <dirMatriz>' . $_SESSION['empresa']['direccion'] . '</dirMatriz>
    </infoTributaria>
    <infoFactura>
        <fechaEmision>' . $fecha . '</fechaEmision>
        <obligadoContabilidad>NO</obligadoContabilidad>
        <tipoIdentificacionComprador>04</tipoIdentificacionComprador>
        <razonSocialComprador>' . $cliente["nombre"] . " " . $cliente["apellido"] . '</razonSocialComprador>
        <identificacionComprador>' . $cliente["rucci"] . '</identificacionComprador>
        <direccionComprador>' . $cliente["direccion"] . '</direccionComprador>
        <totalSinImpuestos>' . $factura->total . '</totalSinImpuestos>
        <totalDescuento>0.00</totalDescuento>
        <totalConImpuestos>
            <totalImpuesto>
                <codigo>2</codigo>
                <codigoPorcentaje>2</codigoPorcentaje>
                <descuentoAdicional>0.00</descuentoAdicional>
                <baseImponible>' . $factura->subtotal . '</baseImponible>
                <tarifa>12.00</tarifa>
                <valor>' . $factura->iva . '</valor>
            </totalImpuesto>
        </totalConImpuestos>
        <propina>0.00</propina>
        <importeTotal>' . $factura->total . '</importeTotal>
        <moneda>DOLAR</moneda>
        <pagos>
            <pago>
                <formaPago>01</formaPago>
                <total>' . $factura->total . '</total>
            </pago>
        </pagos>
    </infoFactura>
    <detalles>';

        foreach ($_SESSION['ventas'] as $datos) {
        $detalle = explode('||', $datos);
        $iva = $detalle[4] * 0.12;
        $subtotal = $detalle[4] - $iva;
        $formatoXml .= '<detalle>

            <codigoPrincipal>' . $detalle[5] . '</codigoPrincipal>
            <codigoAuxiliar>' . $detalle[5] . '</codigoAuxiliar>
            <descripcion>' . $detalle[1] . '</descripcion>
            <cantidad>' . $detalle[3] . '</cantidad>
            <precioUnitario>' . $detalle[3] * $detalle[4] . '</precioUnitario>
            <descuento>0</descuento>
            <precioTotalSinImpuesto>' . $subtotal . '</precioTotalSinImpuesto>';

            $formatoXml .= '<impuestos>
                <impuesto>
                    <codigo>2</codigo>
                    <codigoPorcentaje>2</codigoPorcentaje>
                    <tarifa>12.00</tarifa>
                    <baseImponible>' . $subtotal . '</baseImponible>
                    <valor>' . $iva . '</valor>
                </impuesto>
            </impuestos>
        </detalle>';
        }
        $formatoXml .= '</detalles>
    <infoAdicional>
        <campoAdicional nombre="DIRECCION">CDLA IBARRA 000</campoAdicional>
        <campoAdicional nombre="AgentedeRetención">No.Resolución: 1</campoAdicional>
    </infoAdicional>
</factura>';
return $formatoXml;
}


$xmlDocumento = [
"fechaEmision" => formato_fecha($factura->fecha),
"total" => $factura->total,
"claveAcceso" => CrearNumeroEmision($factura->fecha, $factura->numero),
"secuencial" => $factura->numero,
"iva" => $factura->iva,
"xml" => CrearXml($factura, $cliente, $factura->fecha),

];
//print_r($xmlDocumento);

$xmlCliente = [
"direccion" => $factura_cliente->direccion,
"tipoIdentificacion" => '04',
"razonSocial" => $factura_cliente->nombre,
"ruc" => $factura_cliente->rucci,
];


require_once '../../clases/nueva_venta.php';
$artobj = new nueva_venta;
*/
//$detalle = $artobj->detalle_art($_SESSION['empresa']['idempresa'], $_SESSION['sucursal']['codigo_suc'],
//$factura->numero);
/*print_r($factura->numero);*/