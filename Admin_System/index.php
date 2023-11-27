
<?php
session_start();

if(isset($_SESSION['nombre'])){
    $nombre = $_SESSION['nombre'];
} else {
    // El usuario no ha iniciado sesión, puedes redirigirlo a la página de inicio de sesión.
    header("Location: ../index.php"); 
}




    require_once("controllers/plantilla.controlador.php");

    $plantilla = new PlantillaControlador();
    $plantilla -> plantilla();

?>