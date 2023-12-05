<?php
class ControladorPedido
{
  static public function ctrMostrarPedidos()
  {
    $respuesta =  ModeloPedido::mdlMotrarPedidos();
    return ($respuesta);
  }
}
