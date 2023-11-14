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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="jumbotron text-center container">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-2">
    <p class="lead">Estas a punto de pagar la cantidad de:
    <h4>$<?php echo number_format($total, 2) ?></h4>
    </p>


    <p class="lead"> <br />
        <strong>(Para aclaraciones: agroadonai@gmail.com)</strong>
    </p>
</div>
<div class="container">
<div class="row">
    <div class="col">
    <table class="table">
            <tbody>
                <tr>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Precio</th>
                </tr>
                <?php $total = 0; ?>
                <?php
                foreach ($_SESSION['carrito'] as $indice => $producto) {  ?>
                    <tr>
                        <td class="text-center"><?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="text-center"><?php echo $producto['cantidad'] ?></td>
                        <td class="text-center">$<?php echo number_format($producto['cantidad'] * $producto['precio'], 2) ?></td>
                        
                    </tr>
                    <?php $total = $total + ($producto['precio'] * $producto['cantidad']); ?>
                <?php } ?>
                <tr>
                    <td colspan="3" align="right">
                        <h3>Total</h3>
                    </td>
                    <td align="right">
                        <h3>$<?php echo number_format($total, 2); ?></h3>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<div class="col">

</div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>