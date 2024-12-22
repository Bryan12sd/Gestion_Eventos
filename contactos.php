<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'db/config.php';

// Consultar todos los contactos de la base de datos
$sql = "SELECT * FROM contactos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/contactos.css">
    <title>Contactos</title>
</head>

<body>
    <h1>Contactos</h1>

    <?php
    if ($result->num_rows > 0) {
        // Mostrar cada contacto
        while ($contacto = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>Saludo: " . htmlspecialchars($contacto['saludo']) . "</h3>";
            echo "<p><strong>Nombre Completo:</strong> " . htmlspecialchars($contacto['nombre_completo']) . "</p>";
            echo "<p><strong>Número de Identificación:</strong> " . htmlspecialchars($contacto['numero_identificacion']) . "</p>";
            echo "<p><strong>Correo Electrónico:</strong> " . htmlspecialchars($contacto['correo_electronico']) . "</p>";
            echo "<p><strong>Número de Teléfono:</strong> " . htmlspecialchars($contacto['numero_telefono']) . "</p>";
            echo "<img src='" . htmlspecialchars($contacto['fotografia']) . "' alt='Foto de " . htmlspecialchars($contacto['nombre_completo']) . "' width='100'>";
            echo "</div><br>";
        }
    } else {
        echo "<p>No hay contactos registrados.</p>";
    }
    ?>

    <a href="menu.php">Volver al menú</a>
    <a href="agregar_contacto.php">Agregar Contactos </a>
</body>

</html>