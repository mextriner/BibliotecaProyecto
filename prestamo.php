<?php
session_start();
include 'conexion.php';
if(isset($_GET['ISBN'])){
    $isbn = $_GET['ISBN'];
    $stmt2 = $mbd->prepare("SELECT COUNT(*) FROM unidad WHERE unidad.Libro_ISBN = ? AND unidad.estado = 1;");
    $stmt2->execute([$isbn]);
    $unidades = $stmt2->fetchColumn();
    if($unidades>0){
        $hoy = date("Y-m-d H:i:s");
        $sqlU = $mbd->prepare("SELECT * FROM unidad WHERE unidad.Libro_ISBN = ? AND unidad.estado = 1 LIMIT 1");
        $sqlU->execute([$isbn]);
        $unidad = $sqlU->fetch(PDO::FETCH_ASSOC);
        $sql = $mbd->prepare("INSERT INTO usuario_has_unidad (Fecha,Usuario_idUsuario,Unidad_idUnidad) VALUES(?,?,?);");
        $sql->execute([$hoy,$_SESSION['id'],$unidad['idUnidad']]);

        $sqlU = $mbd->prepare("UPDATE unidad SET estado = 0 WHERE idUnidad = ?;");
        $sqlU->execute([$unidad['idUnidad']]);


        header('location:index.php');
    }else{
        echo "no hay unidades disponibles";
    }


    
}
