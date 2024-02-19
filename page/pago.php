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
                    <div class="text-end">
                        <?php
                        $llaveSecreta = "4Vj8eK4rloUd272L48hsrarnUA";
                        $merchantId = "508029";
                        $referenceCode = "Adonai" . substr(md5(uniqid()), 0, 10);
                        $signature = hash('md5', "$llaveSecreta~$merchantId~$referenceCode~$total~COP");

                        ?>

                        <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                            <input name="merchantId" type="hidden" value="<?php echo $merchantId; ?>">
                            <input name="accountId" type="hidden" value="512321">
                            <input name="description" type="hidden" value="PAGO ADONAI">
                            <input name="referenceCode" type="hidden" value="<?php echo $referenceCode; ?>">
                            <input name="amount" type="hidden" value="<?php echo $total; ?>">
                            <input name="tax" type="hidden" value="0">
                            <input name="taxReturnBase" type="hidden" value="0">
                            <input name="currency" type="hidden" value="COP">
                            <input name="signature" type="hidden" value="<?php echo $signature; ?>">
                            <input name="test" type="hidden" value="1">
                            <input name="buyerEmail" type="hidden" value="">
                            <input name="shippingAddress" type="hidden" value="">
                            <input name="shippingCity" type="hidden" value="">
                            <input name="shippingCountry" type="hidden" value="">
                            <input name="responseUrl" type="hidden" value="http://localhost/proyect1/page/confirmacion.php">
                            <input name="confirmationUrl" type="hidden" value="http://localhost/proyect1/page/carrito.php">

                            <input class="btn btn-success" name="Submit" type="submit" value="Pagar con Payu">
                        </form>


                    </div>
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