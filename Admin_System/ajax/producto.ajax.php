<?php
require_once("../controllers/producto.controlador.php");
require_once("../modelo/producto.modelo.php");
class ajaxCategoria {

    public $codigo;
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
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function eliminarProducto(){
        $respuesta = ControladorProducto::crtEliminarProducto($this->codigo);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

}

if(!isset($_POST["accion"])){
    $respuesta = new ajaxCategoria();
    $respuesta -> MostrarProducto();
}else{
    if($_POST["accion"] ==`registrar`){
        $insertar = new ajaxCategoria();
        $insertar ->nombre = $_POST['nombre'];
        $insertar ->precio = $_POST['precio'];
        $insertar ->descripcion = $_POST['descripcion'];
        $insertar ->imagen = $_POST['imagen'];
        $insertar ->registrarProducto();
    }

    if($_POST["accion"] == "eliminar"){
        $eliminar = new ajaxCategoria();
        $eliminar ->codigo = $_POST['codigo'];
        $eliminar ->eliminarProducto();
    }
    
}
