<?php

class ControladorProducto{
    static public function ctrMostrarProducto(){
        $respuesta = ModeloProducto::mdlMostrarProducto();
        return $respuesta;
    }
    
}
