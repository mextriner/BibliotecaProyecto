<?php
require_once 'conexion.php';
$id2 = $_REQUEST['id'];
mysqli_query($conexion,"DELETE FROM graficos WHERE graficos.id_foto = '$id2'");
header('location: index.php');
?>