<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edificio = $_POST['edificio'];
    $salon = $_POST['salon'];
    $pago = $_POST['pago'];
    $profesion = $_POST['profesion'];
    $cantidad_productos = $_POST['cantidad_productos'];
    $vegetariano = $_POST['vegetariano'];
    $contacto = $_POST['contacto'];
    $fecha = $_POST['fecha'];
    $email = $_POST['email'];

    $sql = "INSERT INTO pedidos (edificio, salon, pago, profesion, cantidad_productos, vegetariano, contacto, fecha, email)
    VALUES ('$edificio', '$salon', '$pago', '$profesion', '$cantidad_productos', '$vegetariano', '$contacto', '$fecha', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Pedido enviado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
