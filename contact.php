<?php
// Configuración de la base de datos
$servername = "localhost"; // o tu servidor de base de datos
$username = "root"; // tu nombre de usuario de MySQL
$password = "mysql123"; // tu contraseña de MySQL
$dbname = "Sabores_campus"; // tu nombre de base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensaje enviado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>
