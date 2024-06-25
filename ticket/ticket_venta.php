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
        $pdf = new FPDF('P', 'mm', array(80, 200));
        $pdf->AddPage();
        $pdf->SetMargins(5, 5, 5);
        $pdf->SetFont('Arial', 'B', 9);

        $pdf->Image('../img/logos/campesino.png', 27, 2, 25);

        $pdf->Ln(20);
        // Agregar contenido al PDF (Ejemplo)
        $pdf->Cell(70, 5,  'AgroAdonai', 0, 1, 'C');

        $pdf->Ln(1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(20, 5, 'Id de pedido: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(15, 5,  $row['id'], 0, 1, 'L');

        $pdf->Cell(70, 2, '--------------------------------------------------------------------------', 0, 1, 'L');
        
        $pdf->Cell(10,4, 'Cant.', 0, 0, 'L');
        $pdf->Cell(30,4, 'Nombre', 0, 0, 'L');
        $pdf->Cell(15,4, 'Precio U..', 0, 0, 'L');
        $pdf->Cell(15,4, 'Precio Subtotal', 0, 1, 'L');

        $pdf->Cell(70, 2, '--------------------------------------------------------------------------', 0, 1, 'L');


        // foreach ($result as $productos) {
        //     $pdf->Cell(0, 10, 'Producto: ' . htmlspecialchars($productos['nombre_producto']), 0, 1);
        // }

        // Limpiar el búfer de salida y enviar el PDF al navegador
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
