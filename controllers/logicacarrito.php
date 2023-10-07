<?php
    session_start();
$mensaje = "";

        if(isset($_POST['btn-action'])){
            switch($_POST['btn-action']){
                case  'agregar':

                        if(is_numeric( openssl_decrypt($_POST['id'], COD, KEY))){
                            $id = openssl_decrypt($_POST['id'], COD, KEY);
                            $mensaje.= "OK Id correcto".$id;
                        }
                        else{
                            $mensaje.= "upps... Id incorrecto";
                        }

                        if(is_string( openssl_decrypt($_POST['nombre'], COD, KEY))){
                            $nombre = openssl_decrypt($_POST['nombre'], COD, KEY);
                            $mensaje.= "OK nombre correcto".$nombre;
                        }
                        else{
                            $mensaje.= "upps... nombre incorrecto"; break; }

                        if(is_numeric( openssl_decrypt($_POST['precio'], COD, KEY))){
                            $precio = openssl_decrypt($_POST['precio'], COD, KEY);
                            $mensaje.= "OK precio correcto".$precio;
                        }
                        else{
                            $mensaje.= "upps... precio incorrecto"; break; }
                        if(is_numeric( openssl_decrypt($_POST['cantidad'], COD, KEY))){
                            $cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
                            $mensaje.= "OK cantidad correcto".$cantidad;
                        }
                        else{
                            $mensaje.= "upps... cantidad incorrecto"; break; };  


                        if(!isset($_SESSION['carrito'])){

                            $producto = array(
                                'id' => $id,
                                'nombre' =>$nombre,
                                'precio' => $precio,
                                'cantidad' => $cantidad,
                            );
                            $_SESSION['carrito'][0]=$producto;
                            $mensaje = "Producto agregado al carrito";
                        }
                        else{

                            $idProductos = array_column($_SESSION['carrito'], 'id');

    if (in_array($id, $idProductos)) {
        // El producto ya está en el carrito, aumenta la cantidad en lugar de agregarlo nuevamente
        foreach ($_SESSION['carrito'] as $producto) {
            if ($producto['id'] == $id) {
                $producto['cantidad'] += $cantidad;
                $mensaje = "Cantidad del producto aumentada en el carrito";
                break; // Puedes salir del bucle una vez que se actualice la cantidad
                //$_SESSION['cantidad'] = $cantidad;

            }
        }
    } else {
        // Agrega el producto al carrito
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
