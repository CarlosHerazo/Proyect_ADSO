<?php
include '../model/config.php';
include '../model/conexion.php';
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

    <title>AgroAdonai</title>
</head>
<?php

include '../global/cabecera.php';

?>

<!--
<nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Tienda</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="../page/carrito.php">Carrito(<?php /*echo 
                    (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);*/ ?>)</a>
                </li>
            </ul>
        </div>
    </nav> -->

<body>

    <br>
    <?php if ($mensaje != "") { ?>
        <div class="alert alert-success" role="alert">
            <?php

            echo $mensaje; ?><br><?php
                                    ?>
            <!--<button href="../page/carrito.php" class="btn btn-primary">Ver carrito</button>-->
            <a href="../page/carrito.php">Ver carrito</a>
        </div>
    <?php } ?>
    <div class="div-todo">
        <aside>
            <div class="div-principal">
                <div class="div-productos">
                    <div class="Producto" id="Producto1">
                        <div id="barra1" class="barra"></div>
                        <div><img src="../build/img/Productos/yuca (1).webp" type="webp"></div>
                        <div>
                            <p>Yuca</p>
                        </div>
                        <input type="text" id="miInput" style="display: none;" value="1">
                    </div>
                    <div class="Producto" id="Producto2">
                        <div id="barra2" class="barra"></div>
                        <div><img src="../build/img/Productos/descarga.jfif" type="jfif"></div>
                        <div>
                            <p>Platano Verde</p>
                        </div>
                        <input type="text" id="miInput" style="display: none;" value="3">
                    </div>
                    <div class="Producto" id="Producto3">
                        <div id="barra3" class="barra"></div>
                        <div><img src="../img/Productos/istockphoto-471688238-612x612.jpg" type="webp"></div>
                        <div>
                            <p>Auyama</p>
                        </div>
                        <input type="text" id="miInput" style="display: none;" value="4">

                    </div>
                    <div class="Producto" id="Producto4">
                        <div id="barra4" class="barra"></div>
                        <div><img src="../build/img/Productos/limón criollo.webp" type="webp"></div>
                        <div>
                            <p>Limon criollo</p>
                        </div>
                        <input type="text" id="miInput" style="display: none;" value="6">
                    </div>
                    <div class="Producto" id="Producto5">
                        <div id="barra5" class="barra"></div>
                        <div><img src="../build/img/Productos/vegetales-dieta_vegetariana-nutricion_421718519_132322710_1706x960.webp" type="webp">
                        </div>
                        <div>
                            <p>Ñame</p>
                        </div>
                        <input type="text" id="miInput" style="display: none;" value="7">
                    </div>
                    <div class="Producto" id="Producto6">
                        <div id="barra6" class="barra"></div>
                        <div><img src="../build/img/Productos/NUTE7EOPZVG4TBLG5EXKA5GAIA.avif" type="avif"></div>
                        <div>
                            <p>Guayaba</p>
                        </div>

                    </div>
                </div>
            </div>
        </aside>
        <!--Aqui termina la barra de la izquierda que tiene los productos-->
        <section class="info-producto">
            <?php
            if (isset($_GET["codigo"])) {
                $codigo = $_GET["codigo"];
                $sentencia = $pdo->prepare("SELECT * FROM `productos` WHERE codigo = $codigo;");
                $sentencia->execute();
                $producto = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                foreach ($producto as $productos) {
                    // Mostrar los detalles del producto
            ?>

                    <div id="producto2" class="producto-info">
                        <div class="Tituloinfo-producto">
                            <h1 id="titulo-info-producto"><?php echo $productos['nombre'] ?></h1>
                            <img src="<?php echo $productos['imagen'] ?>" type="jfif" id="producto-info">
                        </div>
                        <div id="Texto-info-producto">
                            <p><?php echo $productos['descripcion'] ?></p>
                            <br><br><br>
                        </div>
                        <p id="precio-producto">Precio por Unidad: <?php echo $productos['precio'] ?></p>
                    </div>
                    <div  id="comprar">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($productos['codigo'], COD, KEY) ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($productos['nombre'], COD, KEY) ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($productos['precio'], COD, KEY) ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY) ?>">
                            <button class="btn btn-success  w-100" name="btn-action" value="agregar" id="comprar" type="submit">Agregar al carrito</button>
                        </form>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                            <!-- Icono SVG aquí -->
                        </svg>
                    </div>

                <?php
                }
            } else {
                $codigo = 1;
                $sentencia = $pdo->prepare("SELECT * FROM `productos` WHERE codigo = $codigo;");
                $sentencia->execute();
                $producto = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                foreach ($producto as $productos) {
                ?>

                    <div id="producto2" class="producto-info">
                        <div class="Tituloinfo-producto">
                            <h1 id="titulo-info-producto"><?php echo $productos['nombre'] ?></h1>
                            <img src="<?php echo $productos['imagen'] ?>" type="jfif" id="producto-info">
                        </div>
                        <div id="Texto-info-producto">
                            <p><?php echo $productos['descripcion'] ?></p>
                            <br><br><br>
                        </div>
                        <p id="precio-producto">Precio por Unidad: <?php echo $productos['precio'] ?></p>
                    </div>
                    <div  id="comprar">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($productos['codigo'], COD, KEY) ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($productos['nombre'], COD, KEY) ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($productos['precio'], COD, KEY) ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY) ?>">
                            <button class="btn btn-success w-100" name="btn-action" id="comprar" value="agregar" type="submit">Agregar al carrito</button>
                        </form>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                            <!-- Icono SVG aquí -->
                        </svg>
                    </div>

            <?php
                }
            }
            ?>

            <br><br>
            <div class="row d-flex align-items-center justify-content-center">

                <?php
                $sentencia = $pdo->prepare("SELECT * FROM productos");
                $sentencia->execute();
                $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                // print_r($listaproductos);
                ?>

                <?php

                foreach ($listaproductos as $producto) { ?>


                    <div class="col-md m-3 text-center">
                        <div class="">
                            <img title="Titulo producto" width="200" height="200" class="" alt="Titulo" src="<?php echo $producto['imagen'] ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="<?php echo $producto['nombre'] ?>" data-bs-content="<?php echo $producto['descripcion'] ?>" height="327px">
                            <div class="card-body">
                                <span><?php echo $producto['nombre'] ?></span>
                                <h5 class="card-title">
                                    <?php echo $producto['precio']  ?>
                                </h5>
                                <p class="card-text">
                                    Description
                                </p>

                                <form action="" method="post">

                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['codigo'], COD, KEY)  ?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY) ?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY) ?>">
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY) ?>">
                                    <button class="btn btn-primary" name="btn-action" id="comprar" value="agregar" type="submit">Agregar al carrito</button>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
    <br><br>
    <?php include "../global/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../javascript/onclickProductos.js"></script>
    <script src="../javascript/ventanaComprar.js"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
</body>

</html>