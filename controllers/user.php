
<?php
// controlador para validar el usuario y la contraseña de la parte administrativa
// if(!empty($_POST["btnIngresar"])){
//     if(empty($_POST["user"]) and empty($_POST["password"])){
//         echo '<div class="alert alert-danger">Los campos estan vacios</div>';
//     }else{
//         $usuario=$_POST["user"];
//         $password = $_POST["password"];
//         $sql=$conex->query("SELECT * FROM admin WHERE User='$usuario' AND password='$password'");
//         if($datos = $sql->fetch_object()){
//             header("Location:./../dashboar_Admin/index.php");
//         }else{
//             echo '<div class="alert alert-danger">Credenciales Incorrectas</div>';
//         }
//     }
// }
include("./../model/conexion.php");

class User {
    private $nombre;
    private $password;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function userExists($user, $pass) {
        $md5pass = md5($pass);

        $query = $this->pdo->prepare("SELECT * FROM `admin` WHERE User = :user AND password = :pass");
        $query->execute(['user' => $user, 'pass' => $md5pass]);
       
        if($query ->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this ->pdo->prepare("SELECT * FROM `admin` WHERE User = :user");
        $query ->execute(['user'=> $user]);

        foreach ($query as $currentUser) {
            $this ->nombre = $currentUser['User'];
            $this ->password = $currentUser['password'];
        }
    }

    

}

// Crear una instancia de la clase User pasando la conexión PDO
$user = new User($pdo);
?>