<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="<?= $_SESSION['lang']; ?>">

<head>
    <meta charset="UTF-8">
    <title>
        <?= $translations['title']; ?>
    </title>
</head>

<body>


    <a href="switch_lang.php?lang=es">Español</a> |
    <a href="switch_lang.php?lang=en">English</a>

    <p><a href="#">
            <?= $translations['login']; ?>
        </a></p>

</body>

</html>