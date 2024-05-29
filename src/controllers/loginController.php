<?php
session_start();
include './../../config/conexion.php';
include './../models/loginModel.php';

class LoginController {
    private $loginModel;

    public function __construct($conn) {
        $this->loginModel = new LoginModel($conn);
    }

    public function login() {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            header("Location: ./../views/homeView.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
            $numeroidentificacione = $this->loginModel->escapeString($_POST['numeroidentificacione']);
            $contrasena = $this->loginModel->escapeString($_POST['contrasena']);

            $user = $this->loginModel->getUserByIdentification($numeroidentificacione);

            if ($user) {
                $intentos_fallidos = $user['intentos_fallidos'];
                if ($intentos_fallidos >= 3) {
                    $error_message = "El usuario está bloqueado. Por favor, contacta al administrador.";
                    header("Location: ../views/loginView.php?error_message=" . urlencode($error_message));
                    exit;
                }
                if (password_verify($contrasena, $user['contrasena'])) {
                    $this->loginModel->resetFailedAttempts($numeroidentificacione);

                    $_SESSION['loggedin'] = true;
                    $_SESSION['numeroidentificacione'] = $numeroidentificacione;
                    $_SESSION['nombre1'] = $user['nombre1'];
                    $_SESSION['apellido1'] = $user['apellido1'];
                    $_SESSION['idRol'] = $user['idRol'];
                    header("Location: ../views/homeView.php");
                    exit;
                } else {
                    $intentos_fallidos++;
                    $this->loginModel->incrementFailedAttempts($numeroidentificacione, $intentos_fallidos);
                    if ($intentos_fallidos >= 3) {
                        $error_message = "Has excedido el número máximo de intentos. El usuario ha sido bloqueado.";
                    } else {
                        $error_message = "Usuario o contraseña incorrectos. Intento #" . $intentos_fallidos;
                    }
                    header("Location: ../views/loginView.php?error_message=" . urlencode($error_message));
                    exit;
                }
            } else {
                $error_message = "Usuario o contraseña incorrectos.";
                header("Location: ../views/loginView.php?error_message=" . urlencode($error_message));
                exit;
            }
        } else {
            require './../views/loginView.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ../views/loginView.php");
        exit;
    }
}

$conn = new mysqli($servername, $username, $password, $database);
$loginController = new LoginController($conn);
$loginController->login();
