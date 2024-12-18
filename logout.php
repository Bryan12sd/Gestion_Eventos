<?php
session_start();

// Destruir la sesión
session_destroy();

// Mostrar mensaje de despedida
echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 20%;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <h1>¡Eso era todo!</h1>
    <p>Hasta la próxima, amigos.</p>
    <p>Serás redirigido en 5 segundos...</p>
</body>
</html>
";

// Redirigir después de 5 segundos
header("refresh:5; url=login.php");
exit();
?>