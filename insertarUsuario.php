<?php
if (!isset($_POST['oculto'])) {

    exit();
}

include 'conexion.php';
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$fechaNac = $_POST['fechaNac'];
$mbd->exec("SET CHARACTER SET utf8");
$sql = $mbd->prepare("INSERT INTO usuario(idUsuario,nombre,apellido,direccion,fechaNAc,clave) VALUES(?,?,?,?,?,?);");

$resultado = $sql->execute([$usuario, $nombre, $apellido,$direccion, $fechaNac,$clave]);
if ($resultado === TRUE) {
    header('Location: index.html');
} else {
    echo "Error al insertar el registro";
}
