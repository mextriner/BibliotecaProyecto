<?php

include 'conexion.php';
if (isset($_POST['actualizar'])) {
    $usuario = $_POST['usuario'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];

    $fecha = $_POST['fechaNac'];
    $fecha = strtotime($fecha);
    $fecha = date('Y-m-d', $fecha);



    $mbd->exec("SET CHARACTER SET utf8");
    $sql = $mbd->prepare("UPDATE usuario SET idUsuario=?,nombre=?,apellido=?,direccion=?,fechaNAc=?,clave=? WHERE idUsuario = ?;");
    $resultado = $sql->execute([$usuario, $nombre, $apellido, $direccion, $fecha, $clave, $usuario]);
    if ($resultado === TRUE) {



        header('Location: index.php');
    } else {
        echo "Error al insertar el registro";
    }
}
