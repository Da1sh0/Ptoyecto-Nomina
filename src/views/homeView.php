<?php
include './../models/home.php';
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
        <a href="index.php">Inicio</a>
        <a href="about.php">Acerca de</a>
        <a href="services.php">Servicios</a>
        <a href="contact.php">Contacto</a>
    </div>
    <div class="contenedor">
        <div class="contenido">
            <h1>Bienvenido a la página de inicio</h1>
            <h2><?php echo "Bienvenido, $nombre $apellido"; ?></h2>
            <form action="./../models/home.php" method="POST">
                <button type="submit" name="logout">Cerrar Sesión</button>
                <button type="submit" name="hola">Registrar empleado</button>
            </form>
        </div>
    </div>
</body>
</html>