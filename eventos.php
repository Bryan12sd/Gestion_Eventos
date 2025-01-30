<?php
session_start();

// Verificamos si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluir la conexión a la base de datos
include 'db/config.php';
include 'config.php';
// Cargar las traducciones


// Realizamos la consulta para obtener los eventos
$sql = "SELECT * FROM eventos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang']; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/eventos.css">
    <title><?php echo $translations['events']; ?></title> <!-- Traducción para el título -->
</head>

<body>
    <h1><?php echo $translations['events']; ?></h1> <!-- Traducción para el título principal -->
    <h2><?php echo $translations['conferences_workshops_seminars']; ?></h2> <!-- Traducción para la descripción -->

    <!-- Contenedor principal de los eventos -->
    <div class="eventos-container">

        <?php
        // Verificamos si hay eventos
        if ($result->num_rows > 0) {
            // Mostrar los eventos
            while ($evento = $result->fetch_assoc()) {
                echo '<div class="evento">';
                echo '<h3>' . $translations['header'] . ': ' . $evento['titulo'] . '</h3>';
                echo '<p><strong>' . $translations['guests'] . ':</strong> ' . $evento['invitados'] . '</p>';
                echo '<p><strong>' . $translations['date_time'] . ':</strong> ' . date('d/m/Y - H:i A', strtotime($evento['fecha_hora'])) . '</p>';
                echo '<p><strong>' . $translations['timezone'] . ':</strong> ' . $evento['zona_horaria'] . '</p>';
                echo '<p><strong>' . $translations['description'] . ':</strong> ' . $evento['descripcion'] . '</p>';
                echo '<p><strong>' . $translations['recurrence'] . ':</strong> ' . $evento['repeticion'] . '</p>';
                echo '<p><strong>' . $translations['reminder'] . ':</strong> ' . $evento['recordatorio'] . '</p>';
                echo '<p><strong>' . $translations['classification'] . ':</strong> ' . $evento['clasificacion'] . '</p>';
                echo '<p><strong>' . $translations['location'] . ':</strong> ' . $evento['lugar'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>' . $translations['no_events_available'] . '</p>';
        }

        // Cerramos la conexión
        $conn->close();
        ?>

    </div>


    <a href="registrarEvento.php"><?php echo $translations['create_event']; ?></a>
    <a href="menu.php"><?php echo $translations['back_to_menu']; ?></a>
    <div>
        <a href="switch_lang.php?lang=es">Español</a> |
        <a href="switch_lang.php?lang=en">English</a>
    </div>
</body>

</html>