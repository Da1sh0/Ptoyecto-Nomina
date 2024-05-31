<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ./../views/loginView.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ./../views/loginView.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hola'])) {
    header("Location: ./../views/registerView.php");
    exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $nombre = $_SESSION['nombre1'];
    $apellido = $_SESSION['apellido1'];
} else {
    header("Location: ./../views/loginView.php");
    exit;
}