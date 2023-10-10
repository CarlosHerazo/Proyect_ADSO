<?php
require_once("../controllers/producto.controlador.php");
require_once("../modelo/producto.modelo.php");
class ajaxCategoria {
public function MostrarProducto(){
    $respuesta = ControladorProducto::ctrMostrarProducto();
    echo json_encode($respuesta);
}
}

$respuesta = new ajaxCategoria();
$respuesta -> MostrarProducto();