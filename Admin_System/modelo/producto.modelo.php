<?php
require_once("Conexion.php");

class ModeloProducto
{
    public static  function mdlMostrarProducto()
    {
        $stnt = Conexion::conectar()->prepare("SELECT `codigo`, `nombre`, `precio`,`descripcion`, `cantidad`,`estado`, `imagen`,`categoria_id`,'x' as acciones FROM `productos`;");
        $stnt->execute();
        return $stnt->fetchAll();
        // $stnt = null;
    }

    static public function mdlRegistrarProducto($nombre, $precio, $descripcion, $cantidad, $estado, $imagen, $categoria)
    {
        // Preparar la consulta SQL (no es necesario usar comillas en los marcadores de posición)
        $stmt = Conexion::conectar()->prepare("INSERT INTO `productos` (`nombre`, `precio`, `descripcion`, `cantidad`,`estado`, `imagen`,`categoria_id`) VALUES (:nombre, :precio, :descripcion, :cantidad, :estado, :imagen, :categoria)");

        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $categoria, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return "El producto se registró perfectamente";
        } else {
            return "Error, no se pudo registrar el producto";
        }

        // Cerrar la declaración 
        $stmt = null;
    }


    static public function mdlEliminarProducto($codigo)
    {


        // Preparar la consulta SQL 
        $stmt = Conexion::conectar()->prepare("DELETE FROM `productos` WHERE codigo = :codigo");

        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return "El producto se elimino perfectamente";
        } else {
            return "Error, no se pudo eliminar el producto";
        }

        // Cerrar la declaración 
        $stmt = null;
    }

    static public function mdlActualizarProducto($codigo, $nombre, $precio, $descripcion, $cantidad, $estado, $imagen, $categoria)
    {

        // Preparar la consulta SQL
        $stmt = Conexion::conectar()->prepare("UPDATE `productos` 
                                                
                                                SET nombre = :nombre,
                                                    precio = :precio,
                                                    descripcion = :descripcion,
                                                    cantidad = :cantidad,
                                                    estado = :estado,
                                                    imagen = :imagen,
                                                    categoria_id = :categoria
                                                    
                                                WHERE codigo = :codigo");

        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $categoria, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return "El producto se actualizo perfectamente";
        } else {
            return "Error, no se pudo actualizar el producto";
        }

        // Cerrar la declaración 
        $stmt = null;
    }
}

$productos = ModeloProducto::mdlMostrarProducto();
