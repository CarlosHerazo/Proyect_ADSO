<?php
require_once '../controllers/detallesPedido.controlador.php';
require_once '../modelo/detallesPedido.controlador.php';

class AjaxDetallesPedido{

    public static function mostrarDetallesP(){
        $respuesta = ControladorDetallesPedido::crtMostrarDetallesP();
        echo json_encode($respuesta);
        
    }

}