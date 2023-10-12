<?php

require_once("conexion.php");

class ModeloProducto{
    public static  function mdlMostrarProducto(){
        $stnt = Conexion::conectar() -> prepare("SELECT `codigo`, `nombre`, `precio`,  `imagen`,`descripcion`,'x' as acciones FROM `productos`;");
        $stnt -> execute();
        return $stnt -> fetchAll();
        // $stnt = null;
    }

    static public function mdlRegistrarProducto($nombre, $precio, $descripcion, $imagen){
        // Establecer la conexión a la base de datos
        
        
        // Preparar la consulta SQL (no es necesario usar comillas en los marcadores de posición)
        $stmt = Conexion::conectar()->prepare("INSERT INTO `productos` (`nombre`, `precio`, `descripcion`, `imagen`) VALUES (:nombre, :precio, :descripcion, :imagen)");
        
        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        if($stmt->execute()){
            return "El producto se registró perfectamente";
        } else {
            return "Error, no se pudo registrar el producto";
        }
        
        // Cerrar la declaración y la conexión
        // $stmt = null;
        // $pdo = null;
    }

}

$productos = ModeloProducto::mdlMostrarProducto();


