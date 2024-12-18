<?php

include 'db/config.php';

// Verificar si el usuario está autenticado y es administrador
/* if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
} */

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    // Validar que los campos no estén vacíos
    if (empty($username) || empty($password) || empty($rol)) {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        // Encriptar la contraseña
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Insertar el usuario en la base de datos
        $sql = "INSERT INTO usuarios (username, password, rol) VALUES ('$username', '$passwordHash', '$rol')";
        if ($conn->query($sql)) {
            $mensaje = "Usuario creado exitosamente.";
        } else {
            $mensaje = "Error al crear el usuario: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registro.css">
    <title>Registrar Usuario</title>
</head>

<body>
    <div class="container">
        <h1>Registrar Nuevo Usuario</h1>

        <!-- Mostrar mensaje -->
        <?php if (isset($mensaje)): ?>
            <p style="color: green;"><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <form action="registro.php" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="admin">Administrador</option>
                <option value="empleado">Empleado</option>
            </select><br><br>

            <button type="submit">Registrar Usuario</button>
        </form>

        <a href="login.php">Iniciar Sesion</a>
    </div>
</body>

</html>