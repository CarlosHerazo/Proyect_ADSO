<?php

include_once '../model/config.php';
include_once '../model/conexion.php';
require '../ticket/fpdf.php';

// Iniciar el almacenamiento en búfer de salida
ob_start();

if (isset($_GET['id_venta'])) {
    // Obtener la variable
    $id_venta = $_GET['id_venta'];

    // Preparar la consulta SQL
    $sql = "SELECT * FROM pedido WHERE clave_transacion = :id_venta";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta con el parámetro id_venta
    $stmt->execute(['id_venta' => $id_venta]);

    // Obtener los resultados
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar los resultados (o hacer cualquier otro procesamiento)
    foreach ($result as $row) {
        //echo "Resultado: " . $row['id'] . "<br>"; // Comentado para evitar salida
    }

    if (isset($row['id'])) {
        $idPedido = $row['id'];

        $sql = "SELECT * FROM detallepedido WHERE id_venta = :idPedido";
        $stmt = $pdo->prepare($sql);

        // Ejecutar la consulta con el parámetro idPedido
        $stmt->execute(['idPedido' => $idPedido]);

        // Obtener los resultados
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $productos) {
            //echo "Resultado: " . htmlspecialchars(print_r($productos, true)) . "<br>"; // Comentado para evitar salida
        }

        // Crear instancia de FPDF
        $pdf = new FPDF('P', 'mm', array(80, 150));
        $pdf->AddPage();
        $pdf->SetMargins(5, 5, 5);
        $pdf->SetFont('Arial', 'B', 9);

        $pdf->Image('../img/logos/campesino.png', 27, 2, 25);

        $pdf->Ln(20);
        // Agregar contenido al PDF (Ejemplo)
        $pdf->Cell(70, 5,  'AgroAdonai', 0, 1, 'C');

        $pdf->Ln(1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(20, 5, 'Id de pedido: '.$row['id'], 0, 0, 'L');

        $pdf->Ln(8);

        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(20,5, 'fecha: '. $row['fecha'], 0, 0, 'L');

        $pdf->Ln(8);
        

        $pdf->Cell(70, 2, '--------------------------------------------------------------------------', 0, 1, 'L');
        
        $pdf->Cell(12,4, 'Cant.', 0, 0, 'L');
        $pdf->Cell(20,4, 'Nombre', 0, 0, 'L');
        $pdf->Cell(15,4, 'Precio U.', 0, 0, 'L');
        $pdf->Cell(15,4, 'Precio Subtotal', 0, 1, 'L');

        $pdf->Cell(70, 2, '--------------------------------------------------------------------------', 0, 1, 'L');

        $pdf->Ln(1);

        $precioTotal;

        $produtos_venta = True; 
        foreach ($result as $productos) {
            $precio_subTotal = $productos['precio_unitario'] * $productos['precio_unitario'];

            $pdf->Cell(12, 4,  htmlspecialchars($productos['cantidad']), 0, 0, 'L');
            $pdf->Cell(20, 4,  htmlspecialchars($productos['nombre']), 0, 0, 'L');
            $pdf->Cell(15, 4,  htmlspecialchars($productos['precio_unitario']), 0, 0, 'L');
            $pdf->Cell(15, 4,  htmlspecialchars($productos['precio_unitario']), 0, 0, 'L');
            $pdf->Ln(7);
        };

        $pdf->Cell(70,4, 'Numero de productos: ' . count($result), 0, 1, 'L');



        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Ln(7);
        $pdf->Cell(70,5, 'Total: ' . MONEDA.''.$row['total']. 0, 1, 'L');

        $pdf->Ln(7);
        $pdf->MultiCell(70, 5, 'Agradecemos tu compra, este pdf sera enviado a tu correo, vuelve pronto.', 0 ,'C'); 

     

       

      


        
        ob_end_clean();
        $pdf->Output();
        exit();
    } else {
        echo 'id para mostrar detalle producto no existe';
    }
} else {
    echo "La variable id_venta no está definida en la URL.";
}
?>
