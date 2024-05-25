<?php
  session_start();
  // Verificar si el usuario ya tiene una sesión iniciada
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
      header("Location: homeView.php"); 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inicio de Sesión</title>
    <script src="../js/alert.js"></script>
</head>
<body>
    <div class="contenedor">
      <div class="contenido">
        <h2 class="titulo">Inicio de Sesión</h2>
        <div>
          <img src="../img/icon.png" class="icon" alt="User Icon"/>
        </div>
        <form action="login.php" method="POST">
          <input type="number" id="login" class="desvanecer dos" name="numeroidentificacione" placeholder="Usuario" required> 
          <input type="password" id="password" class="desvanecer tres" name="contrasena" placeholder="Contraseña" required> 
          <input type="submit" class="desvanecer cuatro" name="login" value="Iniciar Sesión"> 
        </form>
        <div class="cantenedorAbajo">
          <a class="linea" href="#">¿Olvidaste tu Contraseña?</a>
        </div>
      </div>
    </div>
  </body>
</html>
