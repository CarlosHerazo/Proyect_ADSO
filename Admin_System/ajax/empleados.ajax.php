<?php
require_once("../controllers/empleado.controlador.php");
require_once("../modelo/empleado.modelo.php");


class AjaxEmpleados
{

    public $id;
    public $nombre;
    public $user;
    public $pass;

    public function MostrarEmpleados()
    {

        $respuesta = ControladorEmpleados::ctrMostrarEmpleados();
        echo json_encode($respuesta);
    }

    public function registrarEmpleados()
    {
        $respuesta = ControladorEmpleados::crtRegistrarEmpleados($this->nombre, $this->user, $this->pass);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }


    public function eliminarempleados()
    {
        $respuesta = ControladorEmpleados::crtEliminarEmpleados($this->id);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function actualizarEmpleados(){
        $respuesta = ControladorEmpleados::crtActualizarEmpleados($this->id, $this->nombre, $this->user, $this->pass);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

}


if (!isset($_POST["accion"])) {
    $respuesta = new AjaxEmpleados();
    $respuesta->MostrarEmpleados();
} else {
    if ($_POST["accion"] == "registrar") {
        $insertar = new AjaxEmpleados();
        $insertar->nombre = $_POST['nombre'];
        $insertar->user = $_POST['user'];
        $insertar->pass = $_POST['contra'];
        $insertar->registrarEmpleados();
    }

    if ($_POST["accion"] == "eliminar") {
        $eliminar = new AjaxEmpleados();
        $eliminar->id = $_POST['id'];
        $eliminar->eliminarEmpleados();
    }

    if($_POST["accion"] == "actualizar"){
        $actualizar = new AjaxEmpleados();
        $actualizar->id = $_POST['id'];
        $actualizar->nombre = $_POST['nombre'];
        $actualizar->user = $_POST['user'];
        $actualizar->pass = $_POST['contra'];
        $actualizar->actualizarEmpleados();
    }

}







  


