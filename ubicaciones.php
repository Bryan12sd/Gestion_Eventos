<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluir la conexión a la base de datos
include 'db/config.php';
include 'config.php';

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
    <h1><?= $translations['locations']; ?></h1>

    <?php
    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y mostrarlos
        while ($ubicacion = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $translations['header'] . ": " . $ubicacion['titulo'] . "</h3>";
            echo "<p><strong>" . $translations['address'] . ":</strong> " . $ubicacion['direccion'] . "</p>";
            echo "<p><strong>" . $translations['coordinates'] . ":</strong> " . $ubicacion['coordenadas'] . "</p>";
            echo "</div><br>";
        }
    } else {
        echo "<p>" . $translations['no_locations'] . "</p>";
    }
    ?>

    <a href="agregar_ubicacion.php"><?= $translations['add_new_location']; ?></a>
    <a href="menu.php"><?= $translations['back_to_menu']; ?></a>
    <a href="switch_lang.php?lang=es">Español</a> |
    <a href="switch_lang.php?lang=en">English</a>




</html>