<?php

class ControladorProducto
{
    static public function ctrMostrarProducto()
    {
        $respuesta = ModeloProducto::mdlMostrarProducto();
        return $respuesta;
    }

    static public function crtRegistrarProducto($nombre, $precio, $descripcion,  $cantidad, $estado, $imagen, $categoria)
    {
        $respuesta = ModeloProducto::mdlRegistrarProducto($nombre, $precio, $descripcion, $cantidad, $estado, $imagen, $categoria);
        return $respuesta;
    }

    static public function crtActualizarProducto($codigo, $nombre, $precio, $descripcion, $cantidad, $estado,  $imagen, $categoria)
    {
        $respuesta = ModeloProducto::mdlActualizarProducto($codigo, $nombre, $precio, $descripcion, $cantidad, $estado, $imagen, $categoria);
        return $respuesta;
    }
    static public function crtEliminarProducto($codigo)
    {
        $respuesta = ModeloProducto::mdlEliminarProducto($codigo);
        return $respuesta;
    }
}
