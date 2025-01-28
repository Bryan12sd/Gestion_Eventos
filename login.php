<?php
session_start();
include 'db/config.php';

$mensajeError = ""; // Variable para almacenar el mensaje de error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: menu.php");
            exit();
        } else {
            $mensajeError = "Contraseña incorrecta.";
        }
    } else {
        $mensajeError = "Usuario no encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="container">
        <h1>Gestion de Eventos</h1>

        <!-- Mostrar el mensaje de error si existe -->
        <?php if (!empty($mensajeError)): ?>
            <div class="error-message"><?php echo $mensajeError; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>


            <div class=containerButton>
                <button type="submit">Ingresar</button>

            </div>
            <div class=containerButton>

                <a href="registro.php">Registrarse</a>
            </div>


        </form>
    </div>

</body>

</html>