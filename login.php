<?php
session_start();
include 'db/config.php';
include 'config.php'; // Cargar traducciones



$mensajeError = ""; // Variable para mensaje de error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: menu.php");
            exit();
        } else {
            $mensajeError = $translations['error_wrong_password'];
        }
    } else {
        $mensajeError = $translations['error_user_not_found'];
    }
}
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?? 'es'; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title><?= $translations['title'] ?? 'Title'; ?></title>
</head>

<body>
    <div class="container">
        <h1><?= $translations['event_management'] ?? 'Event Management'; ?></h1>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (!empty($mensajeError)): ?>
            <div class="error-message"><?= $mensajeError; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="username"><?= $translations['username'] ?? 'Username'; ?>:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password"><?= $translations['password'] ?? 'Password'; ?>:</label>
            <input type="password" id="password" name="password" required><br><br>

            <div class="containerButton">
                <button type="submit"><?= $translations['login'] ?? 'Login'; ?></button>
            </div>
            <div class="containerButton">
                <a href="registro.php"><?= $translations['register'] ?? 'Register'; ?></a>
            </div>
        </form>

        <!-- Selector de idioma -->
        <div>
            <a href="switch_lang.php?lang=es">Español</a> |
            <a href="switch_lang.php?lang=en">English</a>
        </div>
    </div>

</body>

</html>