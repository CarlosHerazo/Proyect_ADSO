<?php

class ControladorEmpleados
{
    static public function ctrMostrarEmpleados()
    {
        $respuesta = ModeloEmpleados::mdlMostrarEmpleados();
        return $respuesta;
    }

    static public function crtRegistrarEmpleados($nombre, $rol, $user, $contra)
    {
        $respuesta = ModeloEmpleados::mdlRegistrarEmpleados($nombre,$rol, $user, $contra);
        return $respuesta;
    }

    static public function crtEliminarEmpleados($id){
        $respuesta = ModeloEmpleados::mdlEliminiarEmpleados($id);
        return $respuesta;
    }

    static public function crtActualizarEmpleados($id, $rol,$nombre, $user, $contra){
        $respuesta = ModeloEmpleados::mdlActualizarEmpleados($id, $rol, $nombre, $user, $contra);
        return $respuesta;
    }

}





