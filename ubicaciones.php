<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluir la conexión a la base de datos
include 'db/config.php';

// Consultar las ubicaciones desde la base de datos
$sql = "SELECT * FROM ubicaciones";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/ubicaciones.css">
    <title>Ubicaciones</title>
</head>

<body>
    <h1>Ubicaciones</h1>

    <?php
    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y mostrarlos
        while ($ubicacion = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>Título: " . $ubicacion['titulo'] . "</h3>";
            echo "<p><strong>Dirección:</strong> " . $ubicacion['direccion'] . "</p>";
            echo "<p><strong>Coordenadas Geográficas:</strong> " . $ubicacion['coordenadas'] . "</p>";
            echo "</div><br>";
        }
    } else {
        echo "<p>No hay ubicaciones registradas.</p>";
    }
    ?>

    <a href="agregar_ubicacion.php">Agregar Nueva Ubicación</a>
    <a href="menu.php">Volver al menú</a>
</body>

</html>