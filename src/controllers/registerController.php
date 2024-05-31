<?php
include './../../config/conexion.php';
include './../models/registerModel.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $database);
    $registerModel = new RegisterModel($conn);

    $data = [
        'numeroidentificacione' => mysqli_real_escape_string($conn, $_POST['numeroidentificacione']),
        'nombre1' => mysqli_real_escape_string($conn, $_POST['nombre1']),
        'apellido1' => mysqli_real_escape_string($conn, $_POST['apellido1']),
        'estado_civile' => mysqli_real_escape_string($conn, $_POST['estado_civile']),
        'tipodoce' => mysqli_real_escape_string($conn, $_POST['tipodoce']),
        'correoe' => mysqli_real_escape_string($conn, $_POST['correoe']),
        'celulare' => mysqli_real_escape_string($conn, $_POST['celulare']),
        'generoe' => mysqli_real_escape_string($conn, $_POST['generoe']),
        'fecha_nacimiento' => mysqli_real_escape_string($conn, $_POST['fecha_nacimiento']),
        'fechaexpdocu' => mysqli_real_escape_string($conn, $_POST['fechaexpdocu']),
        'nit' => mysqli_real_escape_string($conn, $_POST['nit']),
        'contrasena' => mysqli_real_escape_string($conn, $_POST['contrasena']),
        'id_rol' => mysqli_real_escape_string($conn, $_POST['id_rol']),
        'contrasena_hashed' => password_hash($_POST['contrasena'], PASSWORD_DEFAULT)
    ];

    if ($registerModel->checkUserExists($data['numeroidentificacione'])) {
        echo "<script>
            alert('El usuario ya existe');
            window.location.href='../views/registerView.php';
        </script>";
    } else {
        if ($registerModel->registerUser($data)) {
            header("Location: ../views/registerView.php");
            exit();
        } else {
            echo "<script>alert('Error al registrar el usuario');</script>";
        }
    }
}
