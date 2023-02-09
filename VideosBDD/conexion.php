<?php
    $usuario = "root";
    $clave ="1234";
    $servidor="localhost";
    $bdName="subir_foto2";
    $conexion = mysqli_connect($servidor,$usuario,$clave)or die("no se puedo realizar la conexión");
    $db=mysqli_select_db($conexion,$bdName)or die("no se encuetra la base de datos");


?>