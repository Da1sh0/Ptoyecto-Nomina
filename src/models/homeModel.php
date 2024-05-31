<?php
class HomeModel {
    public function __construct() {
        session_start();
    }

    public function checkLogin() {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: ./../views/loginView.php");
            exit;
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ./../views/loginView.php");
        exit;
    }

    public function redirectToRegister() {
        header("Location: ./../views/registerView.php");
        exit;
    }

    public function getUserName() {
        return [
            'nombre' => $_SESSION['nombre1'],
            'apellido' => $_SESSION['apellido1']
        ];
    }
}
