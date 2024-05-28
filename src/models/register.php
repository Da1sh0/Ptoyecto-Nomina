<?php
include './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroidentificacione = mysqli_real_escape_string($conn, $_POST['numeroidentificacione']);
    $nombre1 = mysqli_real_escape_string($conn, $_POST['nombre1']);
    $apellido1 = mysqli_real_escape_string($conn, $_POST['apellido1']);
    $estado_civile = mysqli_real_escape_string($conn, $_POST['estado_civile']);
    $tipodoce = mysqli_real_escape_string($conn, $_POST['tipodoce']);
    $correoe = mysqli_real_escape_string($conn, $_POST['correoe']);
    $celulare = mysqli_real_escape_string($conn, $_POST['celulare']);
    $generoe = mysqli_real_escape_string($conn, $_POST['generoe']);
    $fecha_nacimiento = mysqli_real_escape_string($conn, $_POST['fecha_nacimiento']);
    $fechaexpdocu = mysqli_real_escape_string($conn, $_POST['fechaexpdocu']);
    $nit = mysqli_real_escape_string($conn, $_POST['nit']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);
    $id_rol = mysqli_real_escape_string($conn, $_POST['id_rol']);
    $contrasena_hashed = password_hash($contrasena, PASSWORD_DEFAULT);

    $check_sql = "SELECT * FROM empleado WHERE numeroidentificacione = '$numeroidentificacione'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        echo "<script>
            alert('El usuario ya existe');
            window.location.href='registerView.php';
        </script>";
    }


    $sql = "INSERT INTO empleado (numeroidentificacione, nombre1, apellido1, estado_civile, tipodoce, correoe, celulare, generoe, fecha_nacimiento, fechaexpdocu, nit, contrasena, id_rol)
            VALUES ('$numeroidentificacione', '$nombre1', '$apellido1', '$estado_civile', '$tipodoce', '$correoe', '$celulare', '$generoe', '$fecha_nacimiento', '$fechaexpdocu', '$nit', '$contrasena_hashed', '$id_rol')";

    if ($conn->query($sql) === TRUE) {
        header("Location: registerView.php");
        exit();
    } else {
        echo "<script>alert('Error al registrar el usuario');</script>";
    }
}



