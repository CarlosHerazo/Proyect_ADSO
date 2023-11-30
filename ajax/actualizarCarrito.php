<?php
// tu_ruta_de_solicitud_ajax.php
if(isset($_POST['action'])){
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    if($action == 'agregar'){
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
           
    }
}else{
    echo "Error";
}


// Aquí puedes realizar las operaciones necesarias con los datos recibidos

// Por ejemplo, imprimir la respuesta para que JavaScript la maneje

?>