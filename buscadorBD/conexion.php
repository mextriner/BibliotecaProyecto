<?php
$usuario = "root";
$contrasena = "1234";
$servidor = "localhost";
$basededatos = "manana";
$conexion = mysqli_connect($servidor,$usuario,$contrasena)or die("No se puede conectar a la base de datos");
//$db = mysqli_select_db($conexion,$basededatos) or die ("No se encuentra la base de datos");


