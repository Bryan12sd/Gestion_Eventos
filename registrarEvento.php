<?php
session_start();

// Verificamos si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluir la conexión a la base de datos
include 'db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $titulo = $_POST['titulo'];
    $invitados = $_POST['invitados'];
    $fecha_hora = $_POST['fecha_hora'];
    $zona_horaria = $_POST['zona_horaria'];
    $descripcion = $_POST['descripcion'];
    $repeticion = $_POST['repeticion'];
    $recordatorio = $_POST['recordatorio'];
    $clasificacion = $_POST['clasificacion'];
    $lugar = $_POST['lugar'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO eventos (titulo, invitados, fecha_hora, zona_horaria, descripcion, repeticion, recordatorio, clasificacion, lugar) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar y ejecutar la consulta
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssss", $titulo, $invitados, $fecha_hora, $zona_horaria, $descripcion, $repeticion, $recordatorio, $clasificacion, $lugar);
        $stmt->execute();
        $stmt->close();
        echo "<p>Evento registrado correctamente.</p>";
    } else {
        echo "<p>Error al registrar el evento.</p>";
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registrar_evento.css">
    <title>Registrar Evento</title>
</head>

<body>
    <h1>Registrar un nuevo evento</h1>
    <form method="POST">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="invitados">Número de Invitados:</label><br>
        <input type="text" id="invitados" name="invitados" required><br><br>

        <label for="fecha_hora">Fecha y Hora:</label><br>
        <input type="datetime-local" id="fecha_hora" name="fecha_hora" required><br><br>

        <label for="zona_horaria">Zona Horaria:</label><br>
        <input type="text" id="zona_horaria" name="zona_horaria" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>

        <label for="repeticion">Repetición:</label><br>
        <input type="text" id="repeticion" name="repeticion" required><br><br>

        <label for="recordatorio">Recordatorio:</label><br>
        <input type="text" id="recordatorio" name="recordatorio" required><br><br>

        <label for="clasificacion">Clasificación:</label><br>
        <input type="text" id="clasificacion" name="clasificacion" required><br><br>

        <label for="lugar">Lugar:</label><br>
        <input type="text" id="lugar" name="lugar" required><br><br>

        <button type="submit">Registrar Evento</button>
    </form>
    <br>
    <a href="menu.php">Volver al menú</a>
</body>

</html>