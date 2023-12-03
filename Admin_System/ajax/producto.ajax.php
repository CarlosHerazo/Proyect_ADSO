<?php
require_once("../controllers/producto.controlador.php");
require_once("../modelo/producto.modelo.php");
class ajaxCategoria {

    public $codigo;
    public $nombre;
    public $precio;
    public $descripcion;
    public $imagen;
    public $estado;
    public $cantidad;
    public $categoria;
    public function MostrarProducto(){

        $respuesta = ControladorProducto::ctrMostrarProducto();
        echo json_encode($respuesta);
    }

    public function registrarProducto(){
        $respuesta = ControladorProducto::crtRegistrarProducto($this->nombre, $this->precio, $this->descripcion,$this->cantidad, $this->estado,$this->imagen,$this->categoria);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function eliminarProducto(){
        $respuesta = ControladorProducto::crtEliminarProducto($this->codigo);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function actualizarProducto(){
        $respuesta = ControladorProducto::crtActualizarProducto($this->codigo, $this->nombre, $this->precio, $this->descripcion,$this->cantidad, $this->estado, $this->imagen,$this->categoria);
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
        $insertar ->estado = $_POST['estado'];
        $insertar ->cantidad = $_POST['cantidad'];
        $insertar ->imagen = $_POST['imagen'];
        $insertar ->categoria = $_POST['categoria'];
        $insertar ->registrarProducto();
    }

    if($_POST["accion"] == "eliminar"){
        $eliminar = new ajaxCategoria();
        $eliminar ->codigo = $_POST['codigo'];
        $eliminar ->eliminarProducto();
    }

    if($_POST["accion"] == "actualizar"){
        $actualizar = new ajaxCategoria();
        $actualizar ->codigo = $_POST['codigo'];
        $actualizar ->nombre = $_POST['nombre'];
        $actualizar ->precio = $_POST['precio'];
        $actualizar ->descripcion = $_POST['descripcion'];       
        $actualizar ->estado = $_POST['estado'];
        $actualizar ->cantidad = $_POST['cantidad'];
        $actualizar ->imagen = $_POST['imagen'];
        $actualizar ->categoria = $_POST['categoria'];
        $actualizar ->actualizarProducto();
    }
}
