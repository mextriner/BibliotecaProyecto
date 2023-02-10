<?php
session_start();
include 'conexion.php';

$sql = $mbd->prepare("DELETE FROM usuario WHERE idUsuario = ?");
$sql->execute([$_SESSION['id']]);
session_unset();
session_destroy();
header('location:registro.php');

?>