<?php
include 'model/config.php';
include 'model/conexion.php';
include 'controllers/logicacarrito.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&family=Roboto:ital,wght@0,100;0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>AgroAdonai</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" aria-label="Offcanvas navbar large">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">AgroAdonai</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbar2Label">AgroAdonai</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#NuestrosServicios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Servicios
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#NuestrosServicios">Envios a domicilio</a></li>
                                    <li><a class="dropdown-item" href="#NuestrosServicios">Asesoramiento Agricola</a></li>
                                    <li>
                                    </li>
                                    <li><a class="dropdown-item" href="#NuestrosServicios">Atencion al cliente</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./page/nosotros.php">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./page/productos.php">Productos</a>
                            <li class="nav-link">
                                <div id="cantidad-carrito"><?php echo (empty($_SESSION['carrito'])) ? 0 : count($_SESSION['carrito']); ?></div>
                                <div class="icon-nav">

                                    <a href="../page/carrito.php"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                            <style>
                                                svg {
                                                    fill: #ffffff
                                                }
                                            </style>
                                            <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                        </svg></a>


                                </div>

                            <li class="nav-link">
                                <a href="./page/login.html"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #ffffff
                                            }
                                        </style>
                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                    </svg></a>
                            </li>
                            </li>
                        </ul>

                        <form class="d-flex mt-3 mt-lg-0" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>

        </nav>
    </header>

    <div class="contenido-sesion__imagen">
        <section class="sesion-imagen">
            <p class="texto-sesion">Del campo a tu mesa. <br>
                productos perecederos<br>
                frescos y nutritivos para tu bienestar.</p>
            <a href="#" class="link-sesion">Conocenos</a>
        </section>
    </div>
    <!--Termina la sesion1-->
    <!--Termina la sesion1-->

    <main class="main__container">
        <div class="section__background">
            <h2 class="titulo__productos">¿Necesitas comer sano?</h2>
            <div class="productos">
                <section class="producto">
                    <div class="imagen__producto-container">
                        <img class="imagen__producto" src="./build/img/Productos/platano.webp" class="platano">
                        <div class="descripcion-emergente"> La dulce tentación tropical. Una fruta versátil que te enamorará
                            con su suavidad en cada mordisco. ¿A qué esperas para probar su delicia tropical?</div>
                    </div>
                    <h3>Platano Verde</h3>
                    <div class="link-contenido">
                        <a href="page/productos.php">Ver mas</a>
                    </div>
                </section>
                <section class="producto">
                    <div class="imagen__producto-container">
                        <img class="imagen__producto" src="./build/img/Productos/yuca.webp">
                        <div class="descripcion-emergente">El secreto mejor guardado de los tropicales. Un tesoro tuberoso
                            lleno de energía y versatilidad culinaria que te conquistará con su sabor y textura única.</div>
                    </div>
                    <h3>Yuca</h3>
                    <div class="link-contenido">
                        <a href="page/productos.php">Ver mas</a>
                    </div>
                </section>
                <section class="producto">
                    <div class="imagen__producto-container">
                        <img class="imagen__producto" src="./build/img/Productos/guayaba.webp">
                        <div class="descripcion-emergente"> La guayaba, el exótico placer jugoso. Un estallido de sabor
                            tropical que desatará una fiesta en tu paladar. ¡Descubre el encanto de esta fruta apasionante!
                        </div>
                    </div>
                    <h3>Guayaba</h3>
                    <div class="link-contenido">
                        <a href="page/productos.php">Ver mas</a>
                    </div>
                </section>

            </div>
        </div>
        <!--Termina la sesion2 (productos)-->

        <div class="section-services">
            <h3 class="titulo__servicios" id="NuestrosServicios">Nuestros servicios</h3>
            <div class="servicios">

                <section class="servicio">
                    <div data-aos="zoom-in" class="imagen__servicio-container">
                        <img class="imagen__servicio" src="./build/img/servicios/delivery.webp" id="domicilio">
                    </div>
                    <div>
                        <p>Del campo directo a tu puerta, seleccionamos cuidadosamente los productos más frescos y saludables
                            para que puedas saborear la naturaleza en cada bocado. ¡Haz tu pedido ahora y déjanos llevarte la frescura hasta tu cocina!</p>
                        <h3>Envíos a domicilio</h3>
                    </div>

                </section>
                <section class="servicio">
                    <div data-aos="zoom-in" class="imagen__servicio-container">
                        <img class="imagen__servicio" src="./build/img/servicios/asesoramiento.webp" id="asesoramiento">

                    </div>
                    <div>
                        <p>¡Cultiva con éxito en casa! Nuestro asesoramiento agrícola a domicilio te guía desde la elección de cultivos
                            hasta las mejores prácticas. ¡Comienza a cultivar tus sueños!</p>
                        <h3>Asesoramiento agrícola</h3>
                    </div>

                </section>
                <section class="servicio">
                    <div data-aos="zoom-in" class="servicio-container">
                        <img class="imagen__servicio" src="./build/img/servicios/atencion.webp" id="atencion">
                    </div>
                    <div>
                        <p>¡Tu satisfacción es nuestra prioridad! Nuestro servicio de atención al cliente a domicilio está aquí
                            para resolver todas tus dudas y brindarte asistencia personalizada.¡Confía en nosotros para una experiencia excepcional!</p>
                        <h3>Atención al cliente</h3>

                    </div>

                </section>

            </div>
        </div>

        <section class="sesion-frase">
            <p>"En el cultivo del campo, florece la vida, se siembra <br> sustento, se cosecha abundancia y se
                nutre el alma en <br> conexión con la naturaleza."
            </p>
        </section>
        <div class="contenedor__logo">
            <a class="logo_whatsapp" href=""><img src="./img/logos/logo_whatsapp.webp" alt=""></a>
        </div>

    </main>
    <?php include "global/footer.php"; ?>
    <script src="./javascript/ventanaEmergente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });
    </script>
</body>

</html>