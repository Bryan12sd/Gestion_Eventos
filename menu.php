<?php
session_start();

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
    <title>Menú Principal</title>
</head>

<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']['username']; ?></h1>

    <h2>Menú</h2>
    <ul>
        <li><a href="eventos.php">Eventos</a></li>
        <li><a href="ubicaciones.php">Ubicaciones</a></li>
        <li><a href="contactos.php">Contactos</a></li>
    </ul>

    <a href="logout.php">Cerrar sesión</a>
</body>

</html>