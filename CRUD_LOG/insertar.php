<?php
    if(!isset($_POST['oculto'])){

        exit();
    }

include 'conexion.php';
$nombre = $_POST['txtNombre'];
$paterno = $_POST['txtPaterno'];
$materno = $_POST['txtMaterno'];
$parcial = $_POST['txtParcial'];
$final = $_POST['txtFinal'];
$bd ->exec("SET CHARACTER SET utf8");
$sql = $bd->prepare("INSERT INTO evaluaciones(nombre,primer_apellido,segundo_apellido,examen_parcial,
examen_final) VALUES(?,?,?,?,?);");

$resultado = $sql->execute([$nombre,$paterno,$materno,$parcial,$final]);
    if($resultado === TRUE){
        header('Location: index.php');
    } else{
        echo "Error al insertar el registro";
    }




?>