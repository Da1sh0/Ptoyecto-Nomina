<?php
class RegisterModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function checkUserExists($numeroidentificacione) {
        $sql = "SELECT * FROM empleado WHERE numeroidentificacione = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $numeroidentificacione);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }
    public function registerUser($data) {
        $sql = "INSERT INTO empleado (numeroidentificacione, nombre1, apellido1, estado_civile, tipodoce, correoe, celulare, generoe, fecha_nacimiento, fechaexpdocu, nit, contrasena, id_rol)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssssssi",
            $data['numeroidentificacione'],
            $data['nombre1'],
            $data['apellido1'],
            $data['estado_civile'],
            $data['tipodoce'],
            $data['correoe'],
            $data['celulare'],
            $data['generoe'],
            $data['fecha_nacimiento'],
            $data['fechaexpdocu'],
            $data['nit'],
            $data['contrasena_hashed'],
            $data['id_rol']
        );
        return $stmt->execute();
    }
}
