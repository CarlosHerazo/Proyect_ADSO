<?php
include '../model/config.php';
include '../model/conexion.php';
include '../controllers/logicacarrito.php';
?>
<?php

    $total = 0;
   
    foreach ($_SESSION['carrito'] as $indice => $producto) {
        $total = $total + ($producto['precio'] * $producto['cantidad']);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .jumbotron {
            background-color: #17a2b8;
            color: white;
        }

        .alert-success {
            background-color: #d4edda;
        }
    </style>

</head>


<body>

    <br><br><br>

    <div class="jumbotron text-center container">
        <h1 class="display-4">¡Paso Final!</h1>
        <hr class="my-2">
        <p class="lead">Estas a punto de pagar la cantidad de:
        <h4>$<?php echo number_format($total, 2) ?></h4>
        </p>

        <p class="lead">
            <strong>(Para aclaraciones: agroadonai@gmail.com)</strong>
        </p>
    </div>

    <main>
        <div class="container  alert alert-success ">
            <h4>Detalles del Pago</h4>
            <div class="row">

                <!-- <div class="col-md">
                    <form>
                        <div class="form-group">
                            <label for="celular">Número de Celular</label>
                            <input type="tel" class="form-control" id="celular" placeholder="Ingrese su número de celular" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Ingrese su dirección" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Ingrese su apellido" required>
                        </div>
                    </form>

                </div> -->

                <div class="col">

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="thead-dark">
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
                        </tbody>
                    </table>
                </div>



                <div class="col">

                    <div id="paypal-button-container" data-total="<?php echo $total; ?>"></div>
                </div>
            </div>
            <a href="./carrito.php" class="position-absolute bottom-1 end-0 m-5 btn btn-danger">Regresar al Carrito</a>
        </div>
        <div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>

    <script src="../javascript/pago.js"></script>
</body>

</html>