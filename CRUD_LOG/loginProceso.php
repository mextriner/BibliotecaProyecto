<?php
    session_start();
    include 'conexion.php';
    $usario = $_POST['usuario2'];
    $clave = $_POST['clave2'];
    $sentencia = $bd -> prepare('SELECT * FROM t_usuario WHERE nombre_usu = ? AND password_usu = ?;');
    $sentencia -> execute([$usario, $clave]);
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

    if($resultado === false) header('Location: login.php');
    else if($sentencia->rowCount() > 0){
        $SESSION['nombre'] = $resultado->nombre_usu;
        header('Location: index.php');
    }
?>