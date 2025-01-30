<?php
session_start();
include 'config.php'; // Cargar el sistema de traducción
// Verificamos si la sesión está iniciada, si no, redirigimos a login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Si está autenticado, mostrar el contenido del menú
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/menu.css">
    <title>Menú Principal</title>
</head>

<body>
    <h1><?= $translations['welcome'] . $_SESSION['usuario']['username']; ?></h1>

    <h2><?= $translations['menu']; ?></h2>
    <ul>
        <li><a href="eventos.php"><?= $translations['events']; ?></a></li>
        <li><a href="ubicaciones.php"><?= $translations['locations']; ?></a></li>
        <li><a href="contactos.php"><?= $translations['contacts']; ?></a></li>
    </ul>

    <a href="logout.php"><?= $translations['logout']; ?></a>
    <div>
        <a class="language" href="switch_lang.php?lang=es">Español</a> |
        <a class="language" href="switch_lang.php?lang=en">English</a>
    </div>
</body>

</html>