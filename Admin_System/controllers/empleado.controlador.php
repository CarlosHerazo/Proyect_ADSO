<?php

class ControladorEmpleados
{
    static public function ctrMostrarEmpleados()
    {
        $respuesta = ModeloEmpleados::mdlMostrarEmpleados();
        return $respuesta;
    }

    static public function crtRegistrarEmpleados($nombre, $user, $contra)
    {
        $respuesta = ModeloEmpleados::mdlRegistrarEmpleados($nombre, $user, $contra);
        return $respuesta;
    }

    static public function crtEliminarEmpleados($id){
        $respuesta = ModeloEmpleados::mdlEliminiarEmpleados($id);
        return $respuesta;
    }

    static public function crtActualizarEmpleados($id, $nombre, $user, $contra){
        $respuesta = ModeloEmpleados::mdlActualizarEmpleados($id, $nombre, $user, $contra);
        return $respuesta;
    }

}





