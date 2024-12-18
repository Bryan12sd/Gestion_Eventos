<?php
session_start();

// Verificamos si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluir la conexión a la base de datos
include 'db/config.php';

// Realizamos la consulta para obtener los eventos
$sql = "SELECT * FROM eventos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/eventos.css">
    <title>Eventos</title>
</head>

<body>
    <h1>Eventos</h1>
    <h2>Conferencias, Talleres y Seminarios</h2>

    <!-- Contenedor principal de los eventos -->
    <div class="eventos-container">

        <?php
        // Verificamos si hay eventos
        if ($result->num_rows > 0) {
            // Mostrar los eventos
            while ($evento = $result->fetch_assoc()) {
                echo '<div class="evento">';
                echo '<h3>Título: ' . $evento['titulo'] . '</h3>';
                echo '<p><strong>Invitados:</strong> ' . $evento['invitados'] . '</p>';
                echo '<p><strong>Fecha y Hora:</strong> ' . date('d/m/Y - H:i A', strtotime($evento['fecha_hora'])) . '</p>';
                echo '<p><strong>Zona Horaria:</strong> ' . $evento['zona_horaria'] . '</p>';
                echo '<p><strong>Descripción:</strong> ' . $evento['descripcion'] . '</p>';
                echo '<p><strong>Repetición:</strong> ' . $evento['repeticion'] . '</p>';
                echo '<p><strong>Recordatorio:</strong> ' . $evento['recordatorio'] . '</p>';
                echo '<p><strong>Clasificación:</strong> ' . $evento['clasificacion'] . '</p>';
                echo '<p><strong>Lugar:</strong> ' . $evento['lugar'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay eventos disponibles.</p>';
        }

        // Cerramos la conexión
        $conn->close();
        ?>

    </div>

    <!-- Enlaces -->
    <a href="registrarEvento.php">Crear Evento</a>
    <a href="menu.php">Volver al menú</a>
</body>

</html>