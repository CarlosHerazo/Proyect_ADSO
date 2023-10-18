<?php
require 'config.php';
require 'conexion.php';
// Verifica si la conexión a la base de datos se ha establecido correctamente
if ($pdo) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];


        // Consulta SQL para verificar las credenciales del usuario
        $sql = "SELECT id, contra, nombre FROM admin WHERE usuario = :usuario";

        // Preparar la consulta
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row) {
                $hashedPassword = $row['contra'];
                
                $pass_c = sha1($contra);
                // Verificar la contraseña
                if (sha1($contra) === $hashedPassword) {
                    // La contraseña es correcta, puedes permitir el acceso
                    $_SESSION['nombre'] = $row['nombre'];
                    header("Location: ../Admin_System/index.php");
                } else {
                    // La contraseña no coincide
                    echo "<div class='alert alert-danger' role='alert'>Contraseña incorrecta. Acceso denegado.</div>";
                }
            } else {
                // No se encontró el usuario en la base de datos
                echo "<div class='alert alert-danger' role='alert'>Usuario no encontrado. Acceso denegado.</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al ejecutar la consulta.</div>";
        }
    }
} else {
    echo "Error: No se pudo establecer la conexión a la base de datos.";
}
?>
