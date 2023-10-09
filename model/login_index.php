<?php
  include('./../model/conexion.php');
  include ('./../controllers/user_sesion.php');
  include ('./../controllers/user.php');

  $userSession = new UserSession();
  $user = new User($pdo);

  if(isset($_SESSION['user'])){
    echo "Hay sesion";
  }else if(isset($_POST['user']) && isset($_POST['password'])){
    echo "Validacion de login";
    $userForm = $_POST['user'];
    $passForm = $_POST['password'];

    if($user -> userExists($userForm, $passForm)){
        echo "Usuario Validado";
    }else{
        echo "Incorecto";
    }

}else{
    //echo "Login";
    include("./../page/login.php");
  }

?>