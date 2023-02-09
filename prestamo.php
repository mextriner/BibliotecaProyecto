<?php
include 'conexion.php';
if(isset($_GET['ISBN'])){


    $sql = $mbd->prepare("INSERT INTO usuario_has_unidad VALUES(?,?,?);"); 
}




?>