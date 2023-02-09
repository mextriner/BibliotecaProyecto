<?php
require_once 'conexion.php';
$id2 = $_REQUEST['nombreFoto'];

//SELECCIONAR LA BASE DE DATOS
mysqli_select_db($conexion,$bdName);

//INCLUYO EL ALFABETO LATINO
mysqli_set_charset($conexion,"utf8");

//¿SELECCIONO UNA ENTRADA DE LA TABLA?
$query = mysqli_query($conexion,"SELECT * FROM graficos WHERE graficos.id_foto = '$id2'");

//CREO UN OBJETO A PARTIR DE LA FILA
$fila = mysqli_fetch_row($query);
$resultado = mysqli_query($conexion,"DELETE FROM graficos WHERE graficos.id_foto = '$nombre");
header('location: index.php');

if($resultado == false){
    echo '<script>
        alert("Error en la consulta");
        windows.location.replace("index.php");
        </script>
    ';
}elseif(mysqli_affected_rows($conexion)==0){
    echo '<script>
        alert("No existen registros con este nombre");
        windows.location.replace("index.php");
        </script>
    ';
}elseif( mysqli_affected_rows($conexion)>0){
    echo '<script>
            alert("Archivo borrado correctamente");
            windows.location.replace("index.php");
        </script>
    ';
}

?>