<?php


if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'es'; // Idioma por defecto
}

$lang = $_SESSION['lang'];
$translations = include("lang/{$lang}.php");
?>