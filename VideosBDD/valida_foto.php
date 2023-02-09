<?php
require_once 'conexion.php';
$nom = $_REQUEST['nombre'];
//solicitar el nombre nativo del archivo
$foto = $_FILES['foto']['name'];
//crear una ruta para guardar el archivo
$ruta = $_FILES['foto']['tmp_name'];
//destino del archivo
$destino = "fotos/".$foto;
//copiar la foto en el directorio
copy($ruta,$destino);
//subir los archivos a la base de datos, creando ua consulta insert
mysqli_query($conexion,"INSERT INTO graficos (nombre,archivo) VALUES('$nom','$destino')");
header('location: index.php');

?>