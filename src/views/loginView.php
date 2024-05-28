<?php
include './login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login_style.css">
    <title>Iniciar Sesión</title>
    <script src="../js/alert.js"></script>
</head>
<body>
  <div class="contenedeor">
    <div class="logo">
      <img src="../img/logo2.png" alt="PayMaster">
      <p>PayMaster</p>
    </div>

    <div class="login">
      <form action="login.php" method="POST">

        <div>
          <p>Numero de Identificacion</p>
          <input type="number" id="login" name="numeroidentificacione" placeholder="Usuario" required> 
        </div>

        <div>
          <p>Contraseña</p>
          <input type="password" id="password" name="contrasena" placeholder="Contraseña" required> 
        </div>

        <div class="check">
          <input type="checkbox">
          <p>Recordar mi Contraseña</p>
        </div>
        
        <div>
          <a class="forgot" href="#">¿Olvidaste tu Contraseña?</a>
        </div>

        <div class="button">
          <input type="submit" class="boton" name="login" value="Iniciar Sesión"> 
        </div>
      </form>
        
    </div>
  </div>
  </body>
</html>
