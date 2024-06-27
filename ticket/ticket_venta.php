<?php

include_once '../model/config.php';
include_once '../model/conexion.php';
require '../ticket/fpdf.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPmailer/phpmailer.php';
require '../PHPmailer/Exception.php';
require '../PHPmailer/SMTP.php';

// Iniciar el almacenamiento en búfer de salida
ob_start();

if (isset($_GET['id_venta']) && isset($_GET['correo'])) {
    // Obtener la variable
    $id_venta = $_GET['id_venta'];
    $correo = $_GET['correo'];

    try {
        // Preparar la consulta SQL para obtener los detalles del pedido
        $sql = "SELECT * FROM pedido WHERE clave_transacion = :id_venta";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_venta' => $id_venta]);
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró el pedido
        if ($pedido) {
            // Preparar la consulta SQL para obtener los productos del pedido
            $sql = "SELECT * FROM detallepedido WHERE id_venta = :id_pedido";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id_pedido' => $pedido['id']]);
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Crear instancia de FPDF y generar el PDF dinámicamente
            $pdf = new FPDF('P', 'mm', array(80, 150));
            $pdf->AddPage();
            $pdf->SetMargins(5, 5, 5);
            $pdf->SetFont('Arial', 'B', 9);

            $pdf->Image('../img/logos/campesino.png', 27, 2, 25);

            $pdf->Ln(20);
            // Agregar contenido al PDF
            $pdf->Cell(70, 5,  'AgroAdonai', 0, 1, 'C');

            $pdf->Ln(1);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(20, 5, 'Id de pedido: ' . $pedido['id'], 0, 0, 'L');

            $pdf->Ln(8);

            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell(20, 5, 'Fecha: ' . $pedido['fecha'], 0, 0, 'L');

            $pdf->Ln(8);

            $pdf->Cell(70, 2, '--------------------------------------------------------------------------', 0, 1, 'L');

            $pdf->Cell(12, 4, 'Cant.', 0, 0, 'L');
            $pdf->Cell(20, 4, 'Nombre', 0, 0, 'L');
            $pdf->Cell(15, 4, 'Precio U.', 0, 0, 'L');
            $pdf->Cell(15, 4, 'Precio Subtotal', 0, 1, 'L');

            $pdf->Cell(70, 2, '--------------------------------------------------------------------------', 0, 1, 'L');

            $pdf->Ln(1);

            foreach ($productos as $producto) {
                $pdf->Cell(12, 4,  htmlspecialchars($producto['cantidad']), 0, 0, 'L');
                $pdf->Cell(20, 4,  htmlspecialchars($producto['nombre']), 0, 0, 'L');
                $pdf->Cell(15, 4,  htmlspecialchars($producto['precio_unitario']), 0, 0, 'L');
                $pdf->Cell(15, 4,  htmlspecialchars($producto['precio_unitario']), 0, 1, 'L');
                $pdf->Ln(7);
            }

            $pdf->Cell(70, 4, 'Número de productos: ' . count($productos), 0, 1, 'L');

            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Ln(7);
            $pdf->Cell(70, 5, 'Total: ' . MONEDA . ' ' . $pedido['total'], 0, 1, 'L');

            $pdf->Ln(7);
            $pdf->MultiCell(70, 5, 'Agradecemos tu compra, este PDF será enviado a tu correo, vuelve pronto.', 0, 'C');

            // Guardar el PDF temporalmente
            $pdfPath = 'ticket_pdf.pdf';
            $pdf->Output();
            $pdf->Output($pdfPath, 'F');


            // Mostrar un enlace para descargar el PDF
            echo '<a href="' . $pdfPath . '" target="_blank">Descargar PDF</a>';

            // Configurar PHPMailer
            $mail = new PHPMailer(true);

            // Configuración del servidor SMTP (ejemplo para Gmail)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'luisroca647@gmail.com'; // Reemplaza con tu dirección de correo
            $mail->Password = 'lyhv kdpg dyfm tuxi';   // Reemplaza con tu contraseña de correo
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinatario y contenido del correo
            $mail->setFrom('luisroca647@gmail.com', 'Soporte AgroAdonai');
            $mail->addAddress($correo, 'Destinatario');
            $mail->isHTML(true);
            $mail->Subject = "Factura de compra - Pedido #$id_venta";
            $mail->Body    = "Te saluda AgroAdonai <br> Hacemos envio de la factura de tu compra. Gracias por tu compra. <br> Estas ayudando a muchos campesinos.";

            // Adjuntar archivo PDF generado
            $mail->addAttachment($pdfPath);

            // Enviar correo
            $mail->send();
            echo '<br>Correo enviado correctamente';

            // Eliminar el archivo PDF temporal después de enviar el correo (opcional)
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }
        } else {
            echo 'No se encontró ningún pedido con ese ID.';
        }
    } catch (Exception $e) {
        echo "Error al procesar el pedido: {$e->getMessage()}";
    }
} else {
    echo "La variable id_venta o correo no está definida en la URL.";
}
