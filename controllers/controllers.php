<?php
// controlador para validar el usuario y la contraseña de la parte administrativa
if(!empty($_POST["btnIngresar"])){
    if(empty($_POST["user"]) and empty($_POST["password"])){
        echo '<div class="alert alert-danger">Los campos estan vacios</div>';
    }else{
        $usuario=$_POST["user"];
        $password = $_POST["password"];
        $sql=$conex->query("SELECT * FROM usuario WHERE usuario='$usuario' AND password='$password'");
        if($datos = $sql->fetch_object()){
            header("Location:paginaAdmin.php");
        }else{
            echo '<div class="alert alert-danger">Credenciales Incorrectas</div>';
        }
    }
}

?>