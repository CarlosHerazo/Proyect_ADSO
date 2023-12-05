<?php
require_once("../controllers/pedido.controlador.php");
require_once("../modelo/pedido.modelo.php");

class Ajaxpedido{
    public static function mostrarPedidos(){
        $respuesta = ControladorPedido::ctrMostrarPedidos();
        echo json_encode($respuesta);
    }
}

$respuesta = new ajaxPedido();
$respuesta -> mostrarPedidos();