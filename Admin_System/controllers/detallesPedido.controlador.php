<?php

class ControladorDetallesPedido{
    public static function crtMostrarDetallesP(){
        $respuesta = ModeloDetallesPedido::mdlMostrarDetallesP();
        return $respuesta;
    }
}