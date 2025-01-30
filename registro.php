<?php
session_start();
include 'db/config.php';
include 'config.php';
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
            // Mensaje de éxito
            $mensaje = "Usuario creado exitosamente.";

            // Redirigir al login después de 3 segundos
            header("refresh:1; url=login.php"); // Redirige a login.php después de 3 segundos
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
        <h1><?= $translations['register_user']; ?></h1>
        <div class="language-switcher">
            <a class='language' href="switch_lang.php?lang=es">Español</a>
            <a class='language' href="switch_lang.php?lang=en">English</a>
        </div>
        <!-- Mostrar mensaje -->
        <?php if (isset($mensaje)): ?>
            <p style="color: green;"><?= $mensaje; ?></p>
        <?php endif; ?>

        <form action="registro.php" method="POST">
            <label for="username"><?= $translations['username']; ?>:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password"><?= $translations['password']; ?>:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="rol"><?= $translations['role']; ?>:</label>
            <select id="rol" name="rol" required>
                <option value="admin"><?= $translations['admin']; ?></option>
                <option value="empleado"><?= $translations['employee']; ?></option>
            </select><br><br>

            <button type="submit"><?= $translations['register']; ?></button>
        </form>
    </div>

</body>

</html>