<?php
include '../model/config.php';
include '../model/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Carrusel Cards Swiper</title>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="../css/style-productos.css">
    <link rel="stylesheet" href="../css/style-productos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    $sentencia = $pdo->prepare("SELECT * FROM productos WHERE estado ='Activo'");
    $sentencia->execute();
    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($listaproductos as $producto) { ?>
                <div class="swiper-slide">
                    <div class="div-product">
                        <div class="header-slaider">
                            <img src="<?php echo $producto['imagen']; ?>" alt="pizza">
                        </div>
                        <div class="body-slaider">
                            <h2><?php echo $producto['nombre']; ?></h2>
                            <p class="Precio">$<?php echo number_format($producto['precio'], 2); ?></p>
                            <p class="card-text">
                                <b> Bultos Disponibles: <?php echo $producto['cantidad'] ?></b>
                            </p>
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['codigo'], COD, KEY) ?>">
                                <input class="text-success" type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY) ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY) ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY) ?>">
                                <button class="btn-cafe" name="btn-action" id="comprar" value="agregar" type="submit">
                                    Agregar al carrito
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./../javascript/swiper.js"></script>
</body>

</html>