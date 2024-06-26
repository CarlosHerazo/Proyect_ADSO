<?php

class Modelo_Grafico
{
    private $conexion;

    function __construct()
    {
        require 'Conexion.php';
        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }

    function TraerDatosGraficosBar()
    {

        try {
            $sql = "CALL SP_DATOSGRAFICO_BAR";
            $consulta = $this->conexion->conectar()->query($sql);
            $arreglo = array();

            if ($consulta) {
                while ($consulta_VU = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $arreglo[] = $consulta_VU;
                }

                return $arreglo;
            } else {
                return array();
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
            return array();
        }
    }

    function TraerDatosGraficosCircule()
    {
        try {
            $sql = "CALL SP_DATOSGRAFICO_CIRCULE";
            $consulta = $this->conexion->conectar()->query($sql);
            $arreglo = array();

            if ($consulta) {
                while ($consulta_VU = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $arreglo[] = $consulta_VU;
                }

                return $arreglo;
            } else {
                return array();
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
            return array();
        }
    }

    function CantidadUsuariosCard()
    {
        try {
            $sql = "CALL SP_DATOSCARD_USER";
            $consulta = $this ->conexion->conectar()->query($sql);
            if($consulta) {
                while ($consulta_VU = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $arreglo[] = $consulta_VU;
                    return $arreglo;
                }
            } else {
                return array();
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
            return array();
        }
    }


    function CantidadproductosCard()
    {
        try {
            $sql = "CALL SP_DATOSCARD_PRODUCTS";
            $consulta = $this ->conexion->conectar()->query($sql);
            if($consulta) {
                while ($consulta_VU = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $arreglo[] = $consulta_VU;
                    return $arreglo;
                }
            } else {
                return array();
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
            return array();
        }
    }


    function CantidadVentasCard()
    {
        try {
            $sql = "CALL SP_DATOSCARD_VENTAS";
            $consulta = $this ->conexion->conectar()->query($sql);
            if($consulta) {
                while ($consulta_VU = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $arreglo[] = $consulta_VU;
                    return $arreglo;
                }
            } else {
                return array();
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
            return array();
        }
    }
}
