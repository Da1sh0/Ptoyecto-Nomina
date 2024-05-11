<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $nombre = $_SESSION['nombre1'];
    $apellido = $_SESSION['apellido1'];
} else {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<title>Home</title>
</head>
<body>
    <div class="contenedor">
        <div class="contenido">
            <h1>Bienvenido a la página de inicio</h1>
            <h2><?php echo "Bienvenido, $nombre $apellido"; ?></h2>
            <form action="close.php" method="POST">
                <button type="submit" name="logout">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
