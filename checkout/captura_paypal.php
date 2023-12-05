<?php
require '../model/config.php';
require '../model/conexion.php';
require '../controllers/logicacarrito.php';
// ... tu código PHP ...
$json = file_get_contents('php://input');
$datos = json_decode($json, true);
// print_r($datos);
if(is_array($datos)){
    echo "HOLA";
    $id_transaccion = $datos['detalles']['id'];
    $monto = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    
    foreach ($_SESSION['carrito'] as $indice => $producto) {
     echo   $idProducto = $producto['id'];
    }

    $sentencia = $pdo->prepare("INSERT INTO `pedido`(`clave_transacion`, `id_producto`, `fecha`, `correo`, `id_cliente`, `total`, `status`) 
    VALUES (:claveTransacion,1,:fecha,:correo,:idCliente,:total,:estado)");

    $sentencia->bindParam(":claveTransacion", $id_transaccion);
    $sentencia->bindParam(":correo",  $email);
    $sentencia->bindParam(":total", $monto);
    // $sentencia->bindParam(":idProducto",  $idProducto);
    $sentencia->bindParam(":fecha",  $fecha_nueva);
    $sentencia->bindParam(":idCliente",  $id_cliente);
    $sentencia->bindParam(":estado",  $status);
    $sentencia->execute();
    try {
        $sentencia->execute();
        if ($sentencia->rowCount() > 0) {
            echo "consulta exitosa";
        } else {
            echo "ninguna fila insertada";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        print_r($sentencia->errorInfo());
    }

    // aquí obtenemos los detalles de la compra como
    // id_compra, id_producto, nombre, precio, cantidad
    // $sentencia->execute();
    // $idVenta = $pdo->lastInsertId();

    // foreach ($_SESSION['carrito'] as $indice => $producto) {
    //     $idProducto = $producto['id'];
    //     $nombre = $producto['nombre'];
    //     $precioUnitario = $producto['precio'];
    //     $cantidad = $producto['cantidad'];

    //     // Verificar que $idProducto no sea nulo antes de ejecutar la consulta
    //     if (!is_null($idProducto)) {
    //         $sentencia = $pdo->prepare("INSERT INTO `detallepedido`( `id_venta`, `id_producto`, `nombre`, `precio_unitario`, `cantidad`, `descargado`) 
    //         VALUES (:idVenta,:idProducto,:nombreP,:precioUnitario,:cantidad,NULL");

    //         $sentencia->bindParam(":idVenta", $idVenta);
    //         $sentencia->bindParam(":idProducto", $idProducto);
    //         $sentencia->bindParam(":nombreP", $nombre );
    //         $sentencia->bindParam(":precioUnitario", $precioUnitario);
    //         $sentencia->bindParam(":cantidad", $cantidad);
    //         $sentencia->execute();
    //     }
    // }


}




    







