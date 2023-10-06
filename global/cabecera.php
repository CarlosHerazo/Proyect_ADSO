<header>
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
          <a class="navbar-brand" href="../index.html">AgroAdonai</a>
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
                  <a class="nav-link active" aria-current="page" href="../index.html">Inicio</a>
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
                    <a class="nav-link" href="./page/nosotros.html">Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../page/productos.php">Productos</a>
                  </li>
                  <li class="nav-link">
                  <div id="cantidad-carrito"><?php echo 
                    (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']); ?></div>
                    <div class="icon-nav">
                    
                        <a href="../page/carrito.php"> <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                           viewBox="0 0 576 512">
                           <style>
                               svg {
                                   fill: #ffffff
                               }
                           </style>
                           <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                       </svg></a>  
                       
                    
                       </div>

                       <li class="nav-link">
                        <a href="../page/login.html"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->  <style>
                            svg {
                                fill: #ffffff
                            }
                        </style>
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></a>
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