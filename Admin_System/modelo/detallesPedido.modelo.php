<?php

require 'Conexion.php';

echo "hola";
class ModeloDetallesPedido{
    public static function mdlMostrarDetallesP(){
        $stnt = Conexion::conectar()->prepare("SELECT `id`, `id_venta`, `id_producto`, `nombre`, `precio_unitario`, `cantidad` FROM `detallepedido`");
        $stnt->execute();
        return $stnt->fetchAll();
    }
}