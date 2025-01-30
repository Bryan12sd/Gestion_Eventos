<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'db/config.php';
include 'config.php';

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
    <h1><?= $translations['contacts']; ?></h1>

    <?php
    if ($result->num_rows > 0) {
        while ($contacto = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $translations['greeting'] . ": " . htmlspecialchars($contacto['saludo']) . "</h3>";
            echo "<p><strong>" . $translations['full_name'] . ":</strong> " . htmlspecialchars($contacto['nombre_completo']) . "</p>";
            echo "<p><strong>" . $translations['id_number'] . ":</strong> " . htmlspecialchars($contacto['numero_identificacion']) . "</p>";
            echo "<p><strong>" . $translations['email'] . ":</strong> " . htmlspecialchars($contacto['correo_electronico']) . "</p>";
            echo "<p><strong>" . $translations['phone_number'] . ":</strong> " . htmlspecialchars($contacto['numero_telefono']) . "</p>";
            echo "<img src='" . htmlspecialchars($contacto['fotografia']) . "' alt='" . $translations['photo'] . " " . htmlspecialchars($contacto['nombre_completo']) . "' width='100'>";
            echo "</div><br>";
        }
    } else {
        echo "<p>" . $translations['no_contacts'] . "</p>";
    }
    ?>

    <a href="menu.php"><?= $translations['back_to_menu']; ?></a>
    <a href="agregar_contacto.php"><?= $translations['add_contact']; ?></a>
    <a href="switch_lang.php?lang=es">Español</a> |
    <a href="switch_lang.php?lang=en">English</a>
</body>

</html>