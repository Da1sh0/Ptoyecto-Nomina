<?php
include './../models/HomeModel.php';

class HomeController {
    private $homeModel;

    public function __construct() {
        $this->homeModel = new HomeModel();
    }

    public function handleRequest() {
        $this->homeModel->checkLogin();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['logout'])) {
                $this->homeModel->logout();
            } elseif (isset($_POST['registrar'])) {
                $this->homeModel->redirectToRegister();
            }
        }

        $user = $this->homeModel->getUserName();
        $nombre = $user['nombre'];
        $apellido = $user['apellido'];

        require './../views/homeView.php';
    }
}

$controller = new HomeController();
$controller->handleRequest();
