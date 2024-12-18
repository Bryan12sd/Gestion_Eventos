<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluir la conexión a la base de datos
include 'db/config.php';

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
    <title>Agregar Ubicación</title>
</head>

<body>
    <h1>Agregar Nueva Ubicación</h1>
    <form action="agregar_ubicacion.php" method="POST">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="coordenadas">Coordenadas Geográficas:</label><br>
        <input type="text" id="coordenadas" name="coordenadas" required><br><br>

        <button type="submit">Registrar Ubicación</button>
    </form>

    <a href="ubicaciones.php">Volver a las Ubicaciones</a>
</body>

</html>