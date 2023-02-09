<?php
$host = "localhost";
$user = "root";
$password = "1234";
$dbname = "biblioteca";

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";



?>
