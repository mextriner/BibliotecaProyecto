<?php
if (!isset($_POST['oculto'])) {

    exit();
}

include 'conexion.php';
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$mbd->exec("SET CHARACTER SET utf8");
$sql = $mbd->prepare("INSERT INTO editorial(nombre,direccion) VALUES(?,?);");

$resultado = $sql->execute([$nombre, $direccion]);
if ($resultado === TRUE) {
    header('Location: index.html');
} else {
    echo "Error al insertar el registro";
}
