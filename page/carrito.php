<?php
include '../model/config.php';
include '../controllers/logicacarrito.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,400;0,700;1,700&family=Open+Sans:wght@800&family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style-productos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&family=Roboto:ital,wght@0,100;0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Carrito</title>
</head>


<body>
    <?php include "../global/cabecera.php"; ?>
    <br><br><br><br><br>
    <div>
        <h1 id="titulo-carrito-producto">Carrito</h1>
    </div>
    <?php
    if (!empty($_SESSION['carrito'])) {
    ?>
        <table class="table">
            <tbody>
                <tr>
                    <th width="40%">Producto</th>
                    <th width="15%" class="text-center">Cantidad</th>
                    <th width="20%" class="text-center">Precio</th>
                    <th width="20%" class="text-center">Total</th>
                    <th width="5%"></th>
                </tr>
                <?php $total = 0; ?>
                <?php
                foreach ($_SESSION['carrito'] as $indice => $producto) {  ?>
                    <tr>
                        <td width="40%"><?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td width="15%" class="text-center"><?php echo $producto['cantidad'] ?></td>
                        <td width="20%" class="text-center">$<?php echo $producto['precio'] ?></td>
                        <td width="20%" class="text-center">$<?php echo number_format($producto['cantidad'] * $producto['precio'], 2) ?></td>
                        <td width="5%">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                                <button class="btn btn-danger" type="submit" name="btn-action" value="eliminar" href="../page/carrito.php">Eliminar</button>
                            </form>
                        </td>
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
        <br><br><br><br>
        <form action="./pago.php" method="post">
            <div class="alert alert-success" role="alert">
                <div class="form-group">
                    <label for="">Correo de contacto</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Por favor escribe tu correo" aria-describedby="helpId" required>
                </div>
                <small class="form-text text-muted">
                    Los productos se enviairan a este correo
                </small>
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="btn-action" value="proceder">
                Proceder a pagar
            </button>
            <a href="./productos.php" class="btn btn-primary btn-block" id="btn-elegirmasproductos">
                Elegir mas productos
            </a>
        </form>

    <?php } else { ?>

        <div class="alert alert-success">
            No hay productos en el carrito...
        </div>
        <button class="btn btn-primary btn-block" type="submit" id="btn-elegirmasproductos">
            Elegir mas productos
        </button>

    <?php } ?>

    <br><br><br><br><br><br><br><br>

    <?php include "../global/footer.php"; ?>

    <!--Termina el contenido-->
    <script src="../javascript/carrito.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>