<?php

require '../controllers/logicacarrito.php';
require '../model/config.php';
require '../model/conexion.php';

$json = file_get_contents('php://input');
var_dump($json);
$datos = json_decode($json, true);

    $id_transaccion = $datos['detalles']['id'];
    $monto = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    // aquí obtenemos los detalles de la compra como
    // id_compra, id_producto, nombre, precio, cantidad


