<?php

$mensaje = "";

if (isset($_POST['btn-action'])) {
    switch ($_POST['btn-action']) {
        case 'agregar':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);
            } else {
                $mensaje .= "upps... Id incorrecto";
                break;
            }

            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $nombre = openssl_decrypt($_POST['nombre'], COD, KEY);
            } else {
                $mensaje .= "upps... nombre incorrecto";
                break;
            }

            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $precio = openssl_decrypt($_POST['precio'], COD, KEY);
            } else {
                $mensaje .= "upps... precio incorrecto";
                break;
            }

            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
            } else {
                $mensaje .= "upps... cantidad incorrecto";
                break;
            }

            if (!isset($_SESSION['carrito'])) {
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad,
                );
                $_SESSION['carrito'][0] = $producto;
                $mensaje = "Producto agregado al carrito";
            } else {
                $idProductos = array_column($_SESSION['carrito'], 'id');
                if (in_array($id, $idProductos)) {
                    // Producto ya existe en el carrito, aumenta la cantidad
                    foreach ($_SESSION['carrito'] as $indice => $producto) {
                        if ($producto['id'] == $id) {
                            $_SESSION['carrito'][$indice]['cantidad'] += $cantidad;
                        }
                    }
                    $mensaje = "Cantidad de producto aumentada en el carrito";
                } else {
                    $numero_productos = count($_SESSION['carrito']);
                    $producto = array(
                        'id' => $id,
                        'nombre' => $nombre,
                        'precio' => $precio,
                        'cantidad' => $cantidad,
                    );
                    $_SESSION['carrito'][$numero_productos] = $producto;
                    $mensaje = "Producto agregado al carrito";
                }
            }
            break;
    


case 'eliminar':
    if(is_numeric( openssl_decrypt($_POST['id'], COD, KEY))){
        $id = openssl_decrypt($_POST['id'], COD, KEY);
        foreach($_SESSION['carrito'] as $indice => $producto){
            if($producto['id']==$id){
                unset($_SESSION['carrito'][$indice]);
                echo "<script>alert('Elemento borrado...')<script/>";
                header("Location: carrito.php");
            }
        }
    }
    else{
        $mensaje.= "upps... Id incorrecto";                    
    }  
    break;
    }

} 


?>