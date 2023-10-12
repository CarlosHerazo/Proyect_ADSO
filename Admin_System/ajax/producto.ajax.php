<?php
require_once("../controllers/producto.controlador.php");
require_once("../modelo/producto.modelo.php");
class ajaxCategoria {
    public $nombre;
    public $precio;
    public $descripcion;
    public $imagen;
    public function MostrarProducto(){

        $respuesta = ControladorProducto::ctrMostrarProducto();
        echo json_encode($respuesta);
    }

    public function registrarProducto(){
        $respuesta = ControladorProducto::crtRegistrarProducto($this->nombre, $this->precio, $this->descripcion, $this->imagen);
        echo json_encode($respuesta);
    }

}

if(!isset($_POST["nombre"])){
    $respuesta = new ajaxCategoria();
    $respuesta -> MostrarProducto();
}else{
    $insertar = new ajaxCategoria();
    $insertar ->nombre = $_POST['nombre'];
    $insertar ->precio = $_POST['precio'];
    $insertar ->descripcion = $_POST['descripcion'];
    $insertar ->imagen = $_POST['imagen'];
    $insertar ->registrarProducto();
}
