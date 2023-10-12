<?php

class ControladorProducto{
    static public function ctrMostrarProducto(){
        $respuesta = ModeloProducto::mdlMostrarProducto();
        return $respuesta;
    }

    static public function crtRegistrarProducto($nombre, $precio, $descripcion, $imagen){
        $respuesta = ModeloProducto::mdlRegistrarProducto($nombre, $precio, $descripcion, $imagen);
        return $respuesta;
    }
    
}
