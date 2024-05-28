<?php
session_start();
include './conexion.php';
  // Verificar si el usuario ya tiene una sesión iniciada
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: homeView.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $numeroidentificacione = mysqli_real_escape_string($conn, $_POST['numeroidentificacione']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);

    $sql = "SELECT * FROM empleado WHERE numeroidentificacione=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $numeroidentificacione);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $intentos_fallidos = $row['intentos_fallidos'];
        if ($intentos_fallidos >= 3) {
            $error_message = "El usuario está bloqueado. Por favor, contacta al administrador.";
            header("Location: loginView.php?error_message=" . urlencode($error_message));
            exit;
        }
        if (password_verify($contrasena, $row['contrasena'])) {
            $sql_reset_attempts = "UPDATE empleado SET intentos_fallidos=0 WHERE numeroidentificacione=?";
            $stmt_reset_attempts = $conn->prepare($sql_reset_attempts);
            $stmt_reset_attempts->bind_param("s", $numeroidentificacione);
            $stmt_reset_attempts->execute();

            $_SESSION['loggedin'] = true;
            $_SESSION['numeroidentificacione'] = $numeroidentificacione;
            $_SESSION['nombre1'] = $row['nombre1'];
            $_SESSION['apellido1'] = $row['apellido1'];
            $_SESSION['idRol'] = $row['idRol'];
            header("Location: homeView.php");
            exit;
        } else {
            $intentos_fallidos++;
            $sql_update_attempts = "UPDATE empleado SET intentos_fallidos=? WHERE numeroidentificacione=?";
            $stmt_update_attempts = $conn->prepare($sql_update_attempts);
            $stmt_update_attempts->bind_param("is", $intentos_fallidos, $numeroidentificacione);
            $stmt_update_attempts->execute();
            if ($intentos_fallidos >= 3) {
                $error_message = "Has excedido el número máximo de intentos. El usuario ha sido bloqueado.";
                header("Location: loginView.php?error_message=" . urlencode($error_message));
                exit;
            } else {
                $error_message = "Usuario o contraseña incorrectos. Intento #" . $intentos_fallidos;
                header("Location: loginView.php?error_message=" . urlencode($error_message));
                exit;
            }
        }
    } else {
        $error_message = "Usuario o contraseña incorrectos.";
        header("Location: loginView.php?error_message=" . urlencode($error_message));
        exit;
    }
}