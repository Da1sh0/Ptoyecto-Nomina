<?php
session_start();
include './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $numeroidentificacione = mysqli_real_escape_string($conn, $_POST['numeroidentificacione']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);

    $sql = "SELECT * FROM empleado WHERE numeroidentificacione=? AND contrasena=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $numeroidentificacione, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['numeroidentificacione'] = $numeroidentificacione;
        $_SESSION['nombre1'] = $row['nombre1'];
        $_SESSION['apellido1'] = $row['apellido1'];
        $_SESSION['idRol'] = $row['idRol'];
        header("Location: homeView.php");
        exit;
    }else {
        $error_message = "Usuario o contraseña incorrectos.";
        header("Location: loginView.php?error_message=" . urlencode($error_message));
        exit;
    }
}