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
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $titulo = $_POST['titulo'];
    $direccion = $_POST['direccion'];
    $coordenadas = $_POST['coordenadas'];

    // Preparar la consulta para insertar los datos
    $sql = "INSERT INTO ubicaciones (titulo, direccion, coordenadas) VALUES ('$titulo', '$direccion', '$coordenadas')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de ubicaciones después de insertar
        header("Location: ubicaciones.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/agregar_ubicacion.css">
    <title>Agregar Ubicación</title>
</head>

<body>
    <h1><?= $translations['add_location']; ?></h1>
    <div class="language-switcher">
        <a class='language' href="switch_lang.php?lang=es">Español</a>
        <a class='language' href="switch_lang.php?lang=en">English</a>
    </div>

    <form action="agregar_ubicacion.php" method="POST">
        <label for="titulo"><?= $translations['header']; ?>:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="direccion"><?= $translations['address']; ?>:</label><br>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="coordenadas"><?= $translations['coordinates']; ?>:</label><br>
        <input type="text" id="coordenadas" name="coordenadas" required><br><br>

        <button type="submit"><?= $translations['register_location']; ?></button>
    </form>

    <a href="ubicaciones.php"><?= $translations['back_to_locations']; ?></a>
</body>

</html>