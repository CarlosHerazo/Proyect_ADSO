<?php

require_once("conexion.php");

class ModeloProducto{
    public static  function mdlMostrarProducto(){
        $stnt = Conexion::conectar() -> prepare("SELECT `codigo`, `nombre`, `precio`, `descripcion`, `imagen`,'x' as acciones FROM `productos`;");
        $stnt -> execute();
        return $stnt -> fetchAll();
        // $stnt = null;
    }
}

$productos = ModeloProducto::mdlMostrarProducto();

print_r($productos);
