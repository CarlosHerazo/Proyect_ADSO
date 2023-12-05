<?php
require '../model/config.php';
require '../model/conexion.php';
require '../controllers/logicacarrito.php';


$total = 0;

// ... tu código PHP ...
$json = file_get_contents('php://input');
$datos = json_decode($json, true);
print_r ($datos);

if (is_array($datos)) {
    echo $datos;
    $id_transaccion = $datos['detalles']['id'];
    $monto = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];


    $sentencia = $pdo->prepare("INSERT INTO `pedido`(`clave_transacion`, `fecha`, `correo`, `id_cliente`, `total`, `status`) 
    VALUES (:claveTransacion,:fecha,:correo,:idCliente,:total,:estado)");

    $sentencia->bindParam(":claveTransacion", $id_transaccion);
    $sentencia->bindParam(":correo",  $email);
    $sentencia->bindParam(":total", $monto);
    $sentencia->bindParam(":fecha",  $fecha_nueva);
    $sentencia->bindParam(":idCliente",  $id_cliente);
    $sentencia->bindParam(":estado",  $status);
  echo  $idVenta = $pdo->lastInsertId();
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





    foreach ($_SESSION['carrito'] as $indice => $producto) {
        $sentencia = $pdo->prepare("SELECT `codigo`, `nombre`, `precio` FROM `productos` WHERE codigo = ? AND estado ='Activo'");
        $sentencia->execute([$idProducto]);

        $row_proc = $sentencia->fetch(PDO::FETCH_ASSOC);


        $nombre = $row_proc['nombre'];
        $cantidad = $producto['cantidad'];
        $precioUnitario = $row_proc['precio'];


        // Verificar que $idProducto no sea nulo antes de ejecutar la consulta

        $sentencia = $pdo->prepare("INSERT INTO `detallepedido`( `id_venta`, `id_producto`, `nombre`, `precio_unitario`, `cantidad`, `descargado`) 
            VALUES (:idVenta,:idProducto,:nombreP,:precioUnitario,:cantidad,NULL");

        $sentencia->bindParam(":idVenta", $idVenta);
        $sentencia->bindParam(":idProducto", $idProducto);
        $sentencia->bindParam(":nombreP", $nombre);
        $sentencia->bindParam(":precioUnitario", $precioUnitario);
        $sentencia->bindParam(":cantidad", $cantidad);
        $sentencia->execute();
    }

    // unset($_SESSION['carrito']);
}
