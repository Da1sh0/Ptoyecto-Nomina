<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Enviar Correo</title>
</head>
<body>
    <div class="contenedor">
        <div class="contenido">
            <h2 class="titulo">Enviar Correo Electrónico</h2>
            <div>
                <img src="../img/icon.png" class="icon" alt="Email Icon" />
            </div>
            <form action="enviar_correo.php" method="POST">
                <input type="email" id="email" class="desvanecer dos" name="email" placeholder="Correo Electrónico" required>
                <input type="submit" name="send_email" value="Enviar Correo">
            </form>
        </div>
    </div>
</body>
</html>
