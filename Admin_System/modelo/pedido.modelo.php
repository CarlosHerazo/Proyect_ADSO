<?php

require_once("conexion.php");

class ModeloPedido{

    static public function mdlMotrarPedidos(){
        $stnt = Conexion::conectar()->prepare("SELECT `id`, `clave_transacion`, `fecha`, `correo`, `id_Cliente`, `total`, `status` FROM `pedido`;");
        $stnt->execute();
        return  $stnt->fetchAll();
    }
}