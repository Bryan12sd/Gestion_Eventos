<?php
session_start();

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    if (in_array($lang, ['es', 'en'])) {
        $_SESSION['lang'] = $lang;
    }
}

// Redirigir a la misma página desde donde se cambió el idioma
$referer = $_SERVER['HTTP_REFERER'] ?? 'login.php';
header("Location: $referer");
exit();
?>