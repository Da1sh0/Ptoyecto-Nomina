<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "nomina"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}
