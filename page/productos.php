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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&family=Roboto:ital,wght@0,100;0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>AgroAdonai</title>

    <style>
        .carousel-fade .carousel-item {
            opacity: 0;
            transition: opacity ease-in-out .7s;
        }

        .carousel-fade .carousel-item.active {
            opacity: 1;
        }

        /* Estilo para los botones de control del carrusel */
        .carousel-control-prev,
        .carousel-control-next {
            width: 70px;
            /* Ajusta el tamaño según tus necesidades */
            height: 70px;
            border-radius: 50%;
            background-color: #dddddd;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            /* Sombra suave */
        }

        /* Estilo para los íconos de los botones de control */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {


            border-radius: 50%;
        }

        /* Estilo para resaltar los botones al pasar el mouse */
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: #555;
            opacity: 1;

        }
    </style>
</head>
<?php

include '../global/cabecera.php';

?>


<body>

    <br><br><br>
    <h1 class="titulo-page text-center">Nuestros Productos</h1>
    <? // if ($mensaje != "") { 
    ?>
    <!-- <div class="alert alert-success" role="alert">
            <?php

            echo $mensaje; ?><br><?php
                                    ?>
            button href="../page/carrito.php" class="btn btn-primary">Ver carrito</button>-->
    <!-- <a href="../page/carrito.php">Ver carrito</a>
        </div>  -->
    <? // } 
    ?>
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
                    <div id="comprar">
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
                    <div id="comprar">
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
            <h1 class="titulo-page text-center">Productos Frescos</h1>
            <?php
            $sentencia = $pdo->prepare("SELECT * FROM productos WHERE estado ='Activo'");
            $sentencia->execute();
            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            // print_r($listaproductos);
            ?>
            <div id="productosCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $contador = 0;
                    $totalProductos = count($listaproductos);
                    foreach ($listaproductos as $producto) {
                        if ($contador % 3 == 0) {
                            echo '<div class="carousel-item ' . (($contador / 3) == 0 ? 'active' : '') . '"><div class="row">';
                        }
                    ?>
                        <div class="col-md m-3 text-center articulo">
                            <div data-aos="zoom-in" class="card-article pb-3 bg-white">
                                <img title="Titulo producto" width="200" height="200" class="img-fluid" alt="Titulo" src="<?php echo $producto['imagen'] ?>" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="<?php echo $producto['nombre'] ?>" data-bs-content="<?php echo $producto['descripcion'] ?>" height="327px">
                                <div class="card-body">
                                    <span class="name-product"><?php echo $producto['nombre'] ?></span>
                                    <h5 class="card-title">
                                        <?php echo $producto['precio'] ?>
                                    </h5>
                                    <p class="card-text">
                                        Description
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
                    <?php
                        $contador++;
                        if ($contador % 3 == 0 || $contador == $totalProductos) {
                            echo '</div></div>';
                        }
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#productosCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productosCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </section>
    </div>
    <br><br>
    <div class="container">
        <hr class="my-4">
    </div>
    <section>
        <div class="container">
            <h1 class="display-4">Categoria Frutas</h1>
            <p class="lead">Texto descriptivo o cualquier otro contenido aquí.</p>
            <?php
            $sentencia = $pdo->prepare("SELECT * FROM productos WHERE categoria_id = 2 AND estado ='Activo'");
            $sentencia->execute();
            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            // print_r($listaproductos);
            ?>
            <div id="productosCarousel2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $contador = 0;
                    $totalProductos = count($listaproductos);
                    foreach ($listaproductos as $producto) {
                        if ($contador % 4 == 0) {
                            echo '<div class="carousel-item ' . (($contador / 3) == 0 ? 'active' : '') . '"><div class="row">';
                        }
                    ?>
                        <div class="col-md m-3 text-center articulo">
                            <div data-aos="zoom-in" class="card-article pb-3 bg-white">
                                <img title="Titulo producto" width="200" height="200" class="img-fluid" alt="Titulo" src="<?php echo $producto['imagen'] ?>" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="<?php echo $producto['nombre'] ?>" data-bs-content="<?php echo $producto['descripcion'] ?>" height="327px">
                                <div class="card-body">
                                    <span class="name-product"><?php echo $producto['nombre'] ?></span>
                                    <h5 class="card-title">
                                        <?php echo $producto['precio'] ?>
                                    </h5>
                                    <p class="card-text">
                                        Description
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
                    <?php
                        $contador++;
                        if ($contador % 4 == 0 || $contador == $totalProductos) {
                            echo '</div></div>';
                        }
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#productosCarousel2" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productosCarousel2" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-image">
        <div class="container">
            <h1 class="display-4">Categoria Tuberculos</h1>
            <p class="lead">Texto descriptivo o cualquier otro contenido aquí.</p>

            <?php
            $sentencia = $pdo->prepare("SELECT * FROM productos WHERE categoria_id = 1 AND estado ='Activo'");
            $sentencia->execute();
            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            // print_r($listaproductos);
            ?>
            <div id="productosCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $contador = 0;
                    $totalProductos = count($listaproductos);
                    foreach ($listaproductos as $producto) {
                        if ($contador % 3 == 0) {
                            echo '<div class="carousel-item ' . (($contador / 4) == 0 ? 'active' : '') . '"><div class="row">';
                        }
                    ?>
                        <div class="col-md m-3 text-center articulo">
                            <div data-aos="zoom-in" class="card-article pb-3 bg-white">
                                <img title="Titulo producto" width="200" height="200" class="img-fluid" alt="Titulo" src="<?php echo $producto['imagen'] ?>" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="<?php echo $producto['nombre'] ?>" data-bs-content="<?php echo $producto['descripcion'] ?>" height="327px">
                                <div class="card-body">
                                    <span class="name-product"><?php echo $producto['nombre'] ?></span>
                                    <h5 class="card-title">
                                        <?php echo $producto['precio'] ?>
                                    </h5>
                                    <p class="card-text">
                                        Description
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
                    <?php
                        $contador++;
                        if ($contador % 4 == 0 || $contador == $totalProductos) {
                            echo '</div></div>';
                        }
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#productosCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productosCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </section>
    <br><br>
    <?php include "../global/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../javascript/onclickProductos.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
    <script src="./../javascript/hoverProductos.js"></script>
    <script src="./../javascript/buscador.js"></script>
    <script>
        AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });
    </script>
</body>

</html>