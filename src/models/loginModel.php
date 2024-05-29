<?php
class LoginModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserByIdentification($numeroidentificacione) {
        $sql = "SELECT * FROM empleado WHERE numeroidentificacione=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $numeroidentificacione);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function resetFailedAttempts($numeroidentificacione) {
        $sql_reset_attempts = "UPDATE empleado SET intentos_fallidos=0 WHERE numeroidentificacione=?";
        $stmt_reset_attempts = $this->conn->prepare($sql_reset_attempts);
        $stmt_reset_attempts->bind_param("s", $numeroidentificacione);
        return $stmt_reset_attempts->execute();
    }

    public function incrementFailedAttempts($numeroidentificacione, $intentos_fallidos) {
        $sql_update_attempts = "UPDATE empleado SET intentos_fallidos=? WHERE numeroidentificacione=?";
        $stmt_update_attempts = $this->conn->prepare($sql_update_attempts);
        $stmt_update_attempts->bind_param("is", $intentos_fallidos, $numeroidentificacione);
        return $stmt_update_attempts->execute();
    }

    public function escapeString($string) {
        return $this->conn->real_escape_string($string);
    }
}
