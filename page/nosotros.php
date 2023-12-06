<?php
include '../model/config.php';
include '../model/conexion.php';
include '../controllers/logicacarrito.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style-nosotros.css">
  <link rel="stylesheet" href="./../css/style.css">
  <link rel="stylesheet" href="../css/style-productos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&family=Roboto:ital,wght@0,100;0,400;0,700;1,100&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>AgroAdonai</title>
</head>

<body>
  <?php include "../global/cabecera.php"; ?>

  <!--Termina la navegacion-->
  <div class="contenido-sesion__imagen">
    <section class="sesion-imagen">
      <h2 class="titulo-nosotros">Nosotros</h2>
    </section>
  </div>

  <!--Comienza el main-->
  <main class="container-fluid">
    <!-- START THE FEATURETTES -->
    <section class="py-5 text-center container-fluid ">
      <div class="row featurette centered-text">
        <div data-aos="fade-right" class="col-md  text-center">
          <h2 class="featurette-heading fw-normal lh-1">¿Quienes <span class="text-body-secondary">
              Somos?</span></h2>
          <p class="lead ">Somos un grupo de familia apasionada por la agricultura, y nuestra historia es un tributo a
            nuestra profunda conexión con la tierra y sus dones. A lo largo de varias generaciones, hemos mantenido una
            relación estrecha con la agricultura, un compromiso que ha dado forma a nuestra vida y valores.</p>
          <p class="lead"> Día tras día, nos levantamos con un propósito claro: brindar alimentos frescos y saludables a
            nuestra comunidad y más allá. Nuestro compromiso con la excelencia y el respeto por la naturaleza nos ha
            convertido en líderes en el cultivo y cosecha de productos agrícolas. Creemos firmemente en la agricultura
            sostenible como un camino hacia un futuro más próspero y respetuoso con el medio ambiente.</p>
          <p class="lead">Nuestra historia tiene raíces que se remontan a tiempos lejanos, cuando nuestros antepasados
            dedicaron sus vidas a trabajar la tierra. Desde entonces, hemos heredado no solo una forma de vida, sino
            también una herencia invaluable. La agricultura no es solo una ocupación para nosotros; es una pasión que
            late en cada uno de nuestros corazones y un legado que nos enorgullece llevar adelante.</p>
        </div>

        <div class="col-md">
          <div data-aos="fade-left" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text>
            <img class="peliculas img-fluid" src="./../build/img/nosotros/campesino_platano.webp" alt="imagen-campesino" type="webp" title="campesino cargando platanos">
          </div>
        </div>
      </div>
    </section>


    <section class="py-5 text-center container-fluid">
      <div class="row py-lg-5  bg-marron">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Nuestra Historia</h1>
          <p data-aos="zoom-in" class="lead text-body-secondary">Nuestra historia se remonta a varias generaciones
            atrás, cuando nuestra
            familia se dedicó por primera vez a la agricultura. Desde entonces, hemos cultivado una profunda pasión por
            la tierra y sus frutos. A lo largo de los años, nos hemos ganado la vida con orgullo y dedicación,
            trabajando arduamente en nuestros campos para asegurar productos de la más alta calidad. La agricultura no
            solo es nuestra forma de vida, sino también nuestra herencia y legado. Cada día, nos levantamos con un
            propósito claro: ofrecer alimentos frescos y saludables a nuestra comunidad y más allá. Nuestro compromiso
            con la excelencia y el respeto por la naturaleza nos ha llevado a convertirnos en una referencia en el
            cultivo y cosecha de productos agrícolas. Estamos emocionados de compartir nuestra historia con ustedes y de
            continuar cultivando un futuro próspero y sostenible.</p>

        </div>
      </div>
    </section>

    <div class="row featurette ">

      <div class="row featurette">
        <div class="col-md-5">
          <div data-aos="fade-left" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text>
            <img class="peliculas img-fluid" src="./../build/img/nosotros/campesino_recoleccion.webp" alt="imagen-campesino" type="webp" title="campesino plantando">
          </div>
        </div>
        <div data-aos="fade-right" class="col-md-7 text-center centered-text">
          <p class="lead"> Valoramos la satisfacción del cliente y nos
            esforzamos por establecer relaciones a largo
            plazo basadas en la confianza y la satisfacción
            mutua. Estamos comprometidos con tu éxito y
            nos enorgullece ser parte de tu viaje hacia el
            logro de tus objetivos.</p>
        </div>
      </div>


      <section data-aos="zoom-in" class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <p class="lead text-body-secondary">Gracias por visitar nuestra página. Esperamos tener la oportunidad de
              servirte y demostrarte por qué somos la elección perfecta para satisfacer tus necesidades. ¡No dudes en
              contactarnos para obtener más información o para comenzar a trabajar juntos!</p>

          </div>
        </div>
      </section>

      <hr class="featurette-divider">

      <!-- <div class="formulario-agricultor container">
        <h2 class="h2-nosotros">Queremos Conocerte</h2>
        <form action="/submit_formulario" method="post">
            <label for="nombre">Nombre completo *</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo electrónico *</label>
            <input type="email" id="email" name="email" required>

            <label for="producto">Producto de interés</label>
            <select id="producto" name="producto">
                <option value="mango">Mango</option>
                <option value="ñame">Ñame</option>
                <option value="platano">Plátano</option>
                <option value="yuca">Yuca</option>
                <option value="papaya">Papaya</option>
               Puedes agregar más opciones aquí 
            </select>

            <label for="mensaje">Cuéntanos más sobre ti</label>
            <textarea id="mensaje" name="mensaje" rows="4"></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div> -->
    </div>


    <!-- /END THE FEATURETTES -->
  </main>

  <!--termina el main-->

  <?php include "../global/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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