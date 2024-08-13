<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar los datos del formulario
    $categoria = $_POST['categoria'];
    $productos = $_POST['productos'];
    $cantidad = $_POST['cantidad'];
    $edificio = $_POST['edificio'];
    $salon = $_POST['salon'];
    $pago = $_POST['pago'];
    $contacto = $_POST['contacto'];
    $fecha = $_POST['fecha'];
    $email = $_POST['email'];

    // Iniciar la generación del PDF
    $htmlContent = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; }
            .header { text-align: center; margin-bottom: 50px; }
            .header h1 { margin: 0; font-size: 24px; }
            .header p { margin: 0; font-size: 14px; }
            .details { margin: 20px 0; }
            .details p { margin: 5px 0; }
            .total { text-align: right; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='header'>
            <h1>Resumen de Pedido</h1>
            <p>Fecha: $fecha</p>
        </div>
        <div class='details'>
            <p><strong>Categoria:</strong> $categoria</p>
            <p><strong>Productos:</strong> $productos</p>
            <p><strong>Cantidad:</strong> $cantidad</p>
            <p><strong>Edificio:</strong> $edificio</p>
            <p><strong>Salón:</strong> $salon</p>
            <p><strong>Forma de Pago:</strong> $pago</p>
            <p><strong>Contacto:</strong> $contacto</p>
            <p><strong>Email:</strong> $email</p>
        </div>
        <div class='total'>
            <p><strong>Total:</strong> Calcula aquí el total si es necesario</p>
        </div>
    </body>
    </html>";

    // Configurar headers para descargar como PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="resumen_pedido.pdf"');

    // Crear PDF utilizando funciones internas de PHP
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
    $dompdf->loadHtml($htmlContent);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("resumen_pedido.pdf", array("Attachment" => 0));
}
?>
