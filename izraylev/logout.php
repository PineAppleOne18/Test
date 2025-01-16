<?php
require "config.php";

if (!isset($_SESSION['username'])) {
    die("Вы не авторизованы");
}

session_destroy();
header("Location: index.php");
?>