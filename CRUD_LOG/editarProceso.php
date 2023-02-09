<?php

/*Crearemos un insert para que inserte los cambios en la tabla */
if(!isset($_POST['oculto'])){
    header('Location: index.php');

}
include 'conexion.php';
$conexion->exec("SET CHARACTER SET utf8");
//$conexion = new PDO('mysql:host=localhost;dbname=alumnos','root', '');
/*Vamos a guardar la información */
$id2 = $_POST['id2'];
$paterno2 = $_POST['txt2Paterno'];
$materno2 = $_POST['txt2Materno'];
$nombre2 = $_POST['txt2Nombre'];
$parcial2 = $_POST['txt2Parcial'];
$final2 = $_POST['txt2Final'];
/*Tengo que insertar los nuevos datos pero mediante un UPDATE */

$sql = $conexion->prepare("UPDATE evaluaciones SET primer_apellido = ?, segundo_apellido = ?, nombre = ?, 
examen_parcial = ?, examen_final = ? WHERE id_alumno = ?;");
$resultado = $sql->execute([$paterno2,$materno2,$nombre2,$parcial2,$final2,$id2]);
    if($resultado === TRUE){
        header('Location: index.php');
    }else{
        echo "Ha ocurrido un error";
    }

?>