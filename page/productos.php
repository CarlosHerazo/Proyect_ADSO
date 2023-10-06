<?php
include '../model/config.php';
include '../model/conexion.php';
include '../page/logicacarrito.php';
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
        <?php echo $mensaje; ?><br>
        <a href="../page/carrito.php" class="btn btn-primary">Ver carrito</a>
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
            <div class="link-comprar-producto" id="comprar">
                <form action="" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($productos['codigo'], COD, KEY) ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($productos['nombre'], COD, KEY) ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($productos['precio'], COD, KEY) ?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY) ?>">
                    <button class="btn btn-primary" name="btn-action" value="agregar" type="submit">Agregar al carrito</button>
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
            <div class="link-comprar-producto" id="comprar">
                <form action="" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($productos['codigo'], COD, KEY) ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($productos['nombre'], COD, KEY) ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($productos['precio'], COD, KEY) ?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY) ?>">
                    <button class="btn btn-primary" name="btn-action" value="agregar" type="submit">Agregar al carrito</button>
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

                                    <button class="btn btn-primary" name="btn-action" value="agregar" type="submit">Agregar al carrito</button>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
    <br><br>
    <footer class="footer">
        <div class="contenedor-footer">
            <div>
                <h3>Contactenos</h3> <!--<span class="span_footer"></span></h3>-->
                <!--<div class="contenedor-img">-->
                <br>
                <p>Ternera Km 1</p>
                <p>Email:</p>
                <p>pqr@agroadonai.com</p>
                <p>info@agroadonai.com</p>
                <!-- aqui van los iconos -->
            </div>
            <div>
                <h3>Nuestra empresa</h3>
                <br>
                <p>¿Quienes somos?</p>
                <p>Aviso de privacidad</p>
                <p>Política de privacidad</p>
            </div>
            <div class="iconos-footer">
                <h3>Siguenos en</h3>
                <div class="iconos__svg">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #ffffff
                            }
                        </style>
                        <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #ffffff
                            }
                        </style>
                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #ffffff
                            }
                        </style>
                        <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                    </svg>
                </div>

            </div>
            <div>
                <h3>Ubicación</h3>
                <br>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7847.2764901364435!2d-75.3700990682581!3d10.450253960481378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef622c615ac0461%3A0x279a410ef9115e56!2sSanta%20Rosa%2C%20Bol%C3%ADvar!5e0!3m2!1ses-419!2sco!4v1691434605734!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="contenedor-desarrolladores">
            <div>
                <p>Powered by: © HCL Developers SA.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../javascript/hoverProductos.js"></script>
    <script src="../javascript/onclickProductos.js"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
    
</body>

</html>