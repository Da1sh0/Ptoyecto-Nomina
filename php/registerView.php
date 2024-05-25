<?php
  session_start();
  // Verificar si el usuario ya tiene una sesión iniciada
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {;
    } else {
        header("Location: loginView.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inicio de Sesión</title>
    <script src="../js/alertRegister.js"></script>
</head>
<body>
    <div class="contenedor">
        <div class="contenido">
            <h2 class="titulo">Registro</h2>
            <div>
                <img src="../img/icon.png" class="icon" alt="User Icon"/>
            </div>
            <form action="register.php" method="POST">
                <div class="campo">
                    <label for="numeroidentificacione">Número de Identificación</label>
                    <input type="number" id="numeroidentificacione" name="numeroidentificacione" placeholder="Número de Identificación" required> 
                </div>
                <div class="campo">
                    <label for="nombre1">Primer Nombre</label>
                    <input type="text" id="nombre1" name="nombre1" placeholder="Primer Nombre" required> 
                </div>
                <div class="campo">
                    <label for="apellido1">Primer Apellido</label>
                    <input type="text" id="apellido1" name="apellido1" placeholder="Primer Apellido" required> 
                </div>
                <div class="campo">
                    <label for="estado_civile">Estado Civil</label>
                    <select id="estado_civile" name="estado_civile" required>
                        <option value="">--Seleccionar--</option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="divorciado">Divorciado</option>
                        <option value="viudo">Viudo</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="tipodoce">Tipo de Documento</label>
                    <select id="tipodoce" name="tipodoce" required>
                        <option value="">--Seleccionar--</option>
                        <option value="CC">Cedula Ciudadania</option>
                        <option value="CE">Cedula Extranjeria</option>
                        <option value=""></option>
                    </select>
                </div>

                <div class="campo">
                    <label for="correoe">Correo Electrónico</label>
                    <input type="email" id="correoe" name="correoe" placeholder="Correo Electrónico" required> 
                </div>
                <div class="campo telefono">
                    <label for="celulare">Número de Celular</label>
                    <input type="number" id="celulare" name="celulare" placeholder="Número de Celular" required> 
                </div>
        </div>
        <div class="contenido">
                <div class="campo genero">
                    <label for="generoe">Género</label>
                    <select id="generoe" name="generoe" required>
                        <option value="">--Seleccionar--</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required> 
                </div>
                <div class="campo">
                    <label for="fechaexpdocu">Fecha de Expedicion Documento</label>
                    <input type="date" id="fechaexpdocu" name="fechaexpdocu" required> 
                </div>
                <div class="campo">
                    <label for="nit">NIT</label>
                    <input type="number" id="nit" name="nit" placeholder="NIT" required> 
                </div>
                <div class="campo">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required> 
                </div>
                <div class="campo">
                    <label for="id_rol">ID Rol</label>
                    <input type="number" id="id_rol" name="id_rol" placeholder="ID Rol" required> 
                </div>
                <div class="campo">
                    <input type="submit" name="register" value="Registrar"> 
                </div>
            </form>
            <div class="cantenedorAbajo">
                <a class="linea" href="loginView.php">¿Ya tienes una cuenta? Iniciar Sesión</a>
            </div>
        </div>
    </div>
</body>
</html>
