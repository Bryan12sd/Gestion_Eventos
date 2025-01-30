<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'db/config.php';
include 'config.php';

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
    <link rel="stylesheet" href="./css/agregar_contactos.css">
    <title>Agregar Contacto</title>
</head>

<body>


    <h1><?= $translations['add_new_contact']; ?></h1>
    <div class="language-switcher">
        <a class='language' href="switch_lang.php?lang=es">Español</a>
        <a class='language' href="switch_lang.php?lang=en">English</a>
    </div>

    <form action="agregar_contacto.php" method="POST">

        <label for="nombre_completo"><?= $translations['full_name']; ?>:</label><br>
        <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>

        <label for="numero_identificacion"><?= $translations['id_number']; ?>:</label><br>
        <input type="text" id="numero_identificacion" name="numero_identificacion" required><br><br>

        <label for="correo_electronico"><?= $translations['email']; ?>:</label><br>
        <input type="email" id="correo_electronico" name="correo_electronico" required><br><br>

        <label for="numero_telefono"><?= $translations['phone_number']; ?>:</label><br>
        <input type="text" id="numero_telefono" name="numero_telefono" required><br><br>

        <label for="fotografia"><?= $translations['photo']; ?>:</label><br>
        <input type="text" id="fotografia" name="fotografia" required><br><br>

        <button type="submit"><?= $translations['add_contact']; ?></button>
    </form>

    <a href="contactos.php"><?= $translations['back_to_contacts']; ?></a>



</body>

</html>