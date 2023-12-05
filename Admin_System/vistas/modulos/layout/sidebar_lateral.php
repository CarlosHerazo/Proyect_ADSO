<!-- Main Sidebar Container -->

<?php 

if(isset($_SESSION['nombre'])){
    $nombre = $_SESSION['nombre'];
} else {
    // El usuario no ha iniciado sesión, puedes redirigirlo a la página de inicio de sesión.
    header("Location: ../index.php"); // Asegúrate de ajustar la URL de redirección según tu estructura de carpetas
}

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4 menu_lateral">

    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="vistas/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $nombre ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="vistas/assets/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">AdminAgro</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                          Gestor Tienda
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a onclick="cargarContenido('content-wrapper','vistas/modulos/producto.php')" class="nav-link" style="cursor: pointer;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Productos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a onclick="cargarContenido('content-wrapper','vistas/modulos/empleados.php')" class="nav-link" style="cursor: pointer;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Admin</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                          Gestor Pedidos
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a onclick="cargarContenido('content-wrapper','vistas/modulos/pedidos.php')" class="nav-link" style="cursor: pointer;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a onclick="cargarContenido('content-wrapper','vistas/modulos/detallesPedido.php')" class="nav-link" style="cursor: pointer;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>detalles pedido</p>
                            </a>
                        </li>

                    </ul>

                </li>
                
            </ul>

            <ul class="nav nav-pills nav-sidebar nav_profile">
                <li class="nav-item">
                    <a href="./vistas/modulos/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>                        
                        <p>
                            Cerrar Sesion
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>