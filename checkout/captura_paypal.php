<?php
require '../model/config.php';
require '../model/conexion.php';



$total = 0;

// ... tu código PHP ...
$json = file_get_contents('php://input');
$datos = json_decode($json, true);


$resultados = []; // Inicializa un array para almacenar los resultados o errores
if (is_array($datos)) {
    $id_transaccion = $datos['detalles']['id'];
    $monto = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $_SESSION['correo'] = $email;
    
    $id_cliente = $datos['detalles']['payer']['payer_id'];


    $sentencia = $pdo->prepare("INSERT INTO `pedido`(`clave_transacion`, `fecha`, `correo`, `id_cliente`, `total`, `status`) 
    VALUES (:claveTransacion,:fecha,:correo,:idCliente,:total,:estado)");

    $sentencia->bindParam(":claveTransacion", $id_transaccion);
    $sentencia->bindParam(":correo",  $email);
    $sentencia->bindParam(":total", $monto);
    $sentencia->bindParam(":fecha",  $fecha_nueva);
    $sentencia->bindParam(":idCliente",  $id_cliente);
    $sentencia->bindParam(":estado",  $status);

    try {
        $sentencia->execute();
        $idVenta = $pdo->lastInsertId();
        $_SESSION["idVenta"] = $idVenta;
        if ($sentencia->rowCount() > 0) {
            $resultados[] = ["mensaje" => "consulta exitosa"];
        } else {
            $resultados[] = ["mensaje" => "no se inserto ninguna fila"];
        }
    } catch (PDOException $e) {

        $resultados[] = ["error" => $e->getMessage()];
    }
}

foreach ($_SESSION['carrito'] as $indice => $producto) {
    $cantidad = $producto['cantidad'];
    $idProducto = $producto['id'];
    $idVenta = $_SESSION['idVenta'];

    $sentenciaProducto = $pdo->prepare("SELECT `codigo`, `nombre`, `precio`, `cantidad` FROM `productos` WHERE codigo = ?");
    $sentenciaProducto->execute([$idProducto]);
    $row_proc = $sentenciaProducto->fetch(PDO::FETCH_ASSOC);

    if ($row_proc) {
        $nombre = $row_proc['nombre'];
        $precioUnitario = $row_proc['precio'];
        $cantidadDisponible = $row_proc['cantidad'];

        // Insertar detalle del pedido
        $sentenciaDetalle = $pdo->prepare("INSERT INTO `detallepedido`(`id_venta`, `id_producto`, `nombre`, `precio_unitario`, `cantidad`) VALUES (:idVenta, :idProducto, :nombreP, :precioUnitario, :cantidad)");
        $sentenciaDetalle->bindParam(":idVenta", $idVenta);
        $sentenciaDetalle->bindParam(":idProducto", $idProducto);
        $sentenciaDetalle->bindParam(":nombreP", $nombre);
        $sentenciaDetalle->bindParam(":precioUnitario", $precioUnitario);
        $sentenciaDetalle->bindParam(":cantidad", $cantidad);

        try {
            $pdo->beginTransaction();

            $sentenciaDetalle->execute();

            // Actualizar la cantidad disponible del producto
            $nuevaCantidad = $cantidadDisponible - $cantidad;
            $sentenciaActualizar = $pdo->prepare("UPDATE `productos` SET `cantidad` = :nuevaCantidad WHERE `codigo` = :idProducto");
            $sentenciaActualizar->bindParam(":nuevaCantidad", $nuevaCantidad);
            $sentenciaActualizar->bindParam(":idProducto", $idProducto);
            $sentenciaActualizar->execute();

            $pdo->commit();

            $resultados[] = ["mensaje" => "Datos enviados con éxito"];
        } catch (PDOException $e) {
            $pdo->rollBack();
            $resultados[] = ["error" => "Error en la consulta: " . $e->getMessage()];
        }
    }
}


// Destruir solo la parte del carrito
unset($_SESSION['carrito']);



// Enviar la respuesta
echo json_encode($resultados);
