<?php
require "config.php";


?>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Страховая компания</h1>
    <a href="reg.php">Регистрация</a>
    <a href="signin.php">Авторизация</a>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="me.php">Личный кабинет</a>
        <a href="signin.php">Выйти</a>
    <?php endif; ?>
</body>