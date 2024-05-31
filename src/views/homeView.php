<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginView.php");
    exit;
}

$nombre1 = isset($_SESSION['nombre1']) ? $_SESSION['nombre1'] : '';
$apellido1 = isset($_SESSION['apellido1']) ? $_SESSION['apellido1'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./../../public/css/style.css">
<link rel="shortcut icon" href="./../../public/img/logo2.png" type="image/x-icon">
<title>Pay Master</title>
</head>
<body>
    <div class="menu">
        <a href="../../index.html">Inicio</a>
        <a href="about.php">Acerca de</a>
        <a href="services.php">Servicios</a>
        <a href="contact.php">Contacto</a>
    </div>
    <div class="contenedor">
        <div class="contenido">
            <h1>Bienvenido, <?php echo htmlspecialchars($nombre1 . ' ' . $apellido1); ?>!</h1>
            <form action="./../controllers/homeController.php" method="POST">
                <button type="submit" name="logout">Cerrar Sesión</button>
                <button type="submit" name="registrar">Registrar empleado</button>
            </form>
        </div>
    </div>
</body>
</html>