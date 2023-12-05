<?php
include '../model/config.php';


if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if ($action == 'agregar') {
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = aumentar($id, $cantidad, $_POST['product_id']  );

        // validamos la respuesta
        if ($respuesta > 0) {
            $datos['ok'] = true;
        } else {
            $datos['ok'] = false;
        }

        $datos['sub'] = MONEDA . number_format($respuesta, 2);
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

function aumentar($id, $cantidad, $product_id)
{

    $res = 0;


    // validamos
    if ($id != null && $cantidad > 0 && is_numeric($cantidad)) {   


        // buscamos el id de la variable de sesión 
        if (isset($_SESSION['carrito'][$id]['cantidad'])) {

                    

            // asignamos la cantidad para que actualice el carrito
            $_SESSION['carrito'][$id]['cantidad'] = $cantidad;

            include '../model/conexion.php';

            $sql = $pdo->prepare("SELECT precio FROM productos WHERE codigo=? LIMIT 1");
            $sql->execute([ $product_id ]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio'];

            // recalcular el subtotal
            $res = $cantidad * $precio;

            return $res;
        }
    } else {
        return $res;
    }
}