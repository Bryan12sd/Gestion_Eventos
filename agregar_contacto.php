<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $saludo = $_POST['saludo'];
    $nombre_completo = $_POST['nombre_completo'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $correo_electronico = $_POST['correo_electronico'];
    $numero_telefono = $_POST['numero_telefono'];
    $fotografia = $_POST['fotografia']; // Esto podría ser una URL de la foto o una ruta de archivo

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO contactos (saludo, nombre_completo, numero_identificacion, correo_electronico, numero_telefono, fotografia) 
            VALUES ('$saludo', '$nombre_completo', '$numero_identificacion', '$correo_electronico', '$numero_telefono', '$fotografia')";

    if ($conn->query($sql) === TRUE) {
        header("Location: contactos.php"); // Redirigir a la página de contactos después de agregar
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
    <title>Agregar Contacto</title>
</head>

<body>
    <h1>Agregar Nuevo Contacto</h1>
    <form action="agregar_contacto.php" method="POST">
        <label for="saludo">Saludo:</label><br>
        <input type="text" id="saludo" name="saludo" required><br><br>

        <label for="nombre_completo">Nombre Completo:</label><br>
        <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>

        <label for="numero_identificacion">Número de Identificación:</label><br>
        <input type="text" id="numero_identificacion" name="numero_identificacion" required><br><br>

        <label for="correo_electronico">Correo Electrónico:</label><br>
        <input type="email" id="correo_electronico" name="correo_electronico" required><br><br>

        <label for="numero_telefono">Número de Teléfono:</label><br>
        <input type="text" id="numero_telefono" name="numero_telefono" required><br><br>

        <label for="fotografia">Fotografía (URL o Ruta del archivo):</label><br>
        <input type="text" id="fotografia" name="fotografia" required><br><br>

        <button type="submit">Agregar Contacto</button>
    </form>
    <a href="contactos.php">Volver a los Contactos</a>
</body>

</html>