<?php

require_once("conexion.php");

class ModeloEmpleados
{
    // lsitar los empleados
    public static  function mdlMostrarEmpleados()
    {
        $stnt = Conexion::conectar()->prepare("SELECT `id`, `contra`, `usuario`,`rol`,  `nombre`, 'x' as Acciones FROM `admin`;");
        $stnt->execute();
        return $stnt->fetchAll();
        // $stnt = null;
    }

    // registrar nuevo empleado
    public static function mdlRegistrarEmpleados($rol, $nombre, $user, $contra)
    {
        // Convertir la contraseña a SHA-1
        $contrasenaSha1 = sha1($contra);
        // Preparar la consulta SQL (no es necesario usar comillas en los marcadores de posición)
        $stmt = Conexion::conectar()->prepare("INSERT INTO `admin` (`contra`, `usuario`,`rol`, `nombre`) VALUES (:pass, :usuario, :rol, :nombre)");

        $stmt->bindParam(":pass", $contrasenaSha1, PDO::PARAM_STR); 
        $stmt->bindParam(":usuario", $user, PDO::PARAM_STR);
        $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);


        // Ejecutar la consulta
        if ($stmt->execute()) {
            return "El Usuario se registró perfectamente";
        } else {
            return "Error, no se pudo registrar el Usuario";
        }

        // Cerrar la declaración 
        $stmt = null;
    }


// eliminar un empleado
    public static function mdlEliminiarEmpleados($id)
    {
        // Preparar la consulta SQL 
        $stmt = Conexion::conectar()->prepare("DELETE FROM `admin` WHERE id = :id");
        
        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        // Ejecutar la consulta
        if($stmt->execute()){
            return "El Usuario se elimino perfectamente";
        } else {
            return "Error, no se pudo eliminar el Usuario";
        }
        
        // Cerrar la declaración 
        $stmt = null;
    }

    public static function mdlActualizarEmpleados($id,$rol, $nombre, $user, $contra)
    {
        // Convertir la contraseña a SHA-1
        $contrasenaSha1 = sha1($contra);     
        // Preparar la consulta SQL
        $stmt = Conexion::conectar()->prepare("UPDATE `admin` 
                                                
                                                SET contra = :pass,
                                                     usuario = :user,
                                                     rol = :rol,
                                                     nombre = :nombre
                                                    
                                                    
                                                    
                                                WHERE id = :id");
        
        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":user", $user, PDO::PARAM_STR);
        $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
        $stmt->bindParam(":pass", $contrasenaSha1, PDO::PARAM_STR);

        
        // Ejecutar la consulta
        if($stmt->execute()){
            return "El usuario se actualizo perfectamente";
        } else {
            return "Error, no se pudo actualizar el usuario";
        }
        
        // Cerrar la declaración 
        $stmt = null;
    }


}

$productos = ModeloEmpleados::mdlMostrarEmpleados();

