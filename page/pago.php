<?php
include '../model/config.php';
include '../model/conexion.php';
include '../controllers/logicacarrito.php';
?>
<?php
if ($_POST) {
    $total = 0;
    $sid = session_id();
    $correo = $_POST['email'];
    foreach ($_SESSION['carrito'] as $indice => $producto) {
        $total = $total + ($producto['precio'] * $producto['cantidad']);
    }

    $sentencia = $pdo->prepare("INSERT INTO `pedido` (`id`, `clave_transacion`, `paypal_datos`, `fecha`, `correo`, `total`, `status`) 
    VALUES (NULL, :claveTransacion, '', NOW(), :correo, :total, 'pendiente');");

    $sentencia->bindParam(":claveTransacion", $sid);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->bindParam(":total", $total);
    $sentencia->execute();
    $idVenta = $pdo->lastInsertId();

    foreach ($_SESSION['carrito'] as $indice => $producto) {
        $idProducto = $producto['id'];
        $precioUnitario = $producto['precio'];
        $cantidad = $producto['cantidad'];

        // Verificar que $idProducto no sea nulo antes de ejecutar la consulta
        if (!is_null($idProducto)) {
            $sentencia = $pdo->prepare("INSERT INTO `detallepedido` (`id`, `id_venta`, `id_producto`, `precio_unitario`, `cantidad`, `descargado`)
            VALUES (NULL, :idVenta, :idProducto, :precioUnitario, :cantidad, '0');");

            $sentencia->bindParam(":idVenta", $idVenta);
            $sentencia->bindParam(":idProducto", $idProducto);
            $sentencia->bindParam(":precioUnitario", $precioUnitario);
            $sentencia->bindParam(":cantidad", $cantidad);
            $sentencia->execute();
        }
    }
}

// echo "<h3>$total</h3>";
?>

<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-2">
    <p class="lead">Estas a punto de pagar la cantidad de:
    <h4>$<?php echo number_format($total, 2) ?></h4>
    </p>


    <p class="lead"> <br />
        <strong>(Para aclaraciones: agroadonai@gmail.com)</strong>
    </p>

</div>