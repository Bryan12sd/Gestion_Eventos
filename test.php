<?php
require_once 'db/config.php';

// Prueba la conexión
try {
    echo "Conexión exitosa a la base de datos: $dbname";
} catch (Exception $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>