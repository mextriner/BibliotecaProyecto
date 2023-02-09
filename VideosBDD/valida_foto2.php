<?php

$resultado = null;

if(isset($_POST['enviar'])){
    //para obtener el nombre del archivo que se ha seleccionado
    $name = $_FILES['foto']['name'];
    //hay que acceder al archivvo temporal para ello:
    $tmp_name = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error']; //
    $size = $_FILES['foto']['size'];
    $type = $_FILES['foto']['type'];
    $max_size = 740 * 740;
    $nombre = $_REQUEST['nombre']; //REQUEST: permite recibir los datos independientemente del método (POST o GET)
    if($error){
        $resultado = "ha ocurrido un error";
        echo $resultado;
    }elseif($size>$max_size){
        $resultado = "la imagen es demasioado grande. El máximo es de 1MB";
        echo $resultado;
    }elseif($type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png' && 
            $type != 'image/gif' && $type != 'image/jpg' && $type != 'image/jfif'){
        $resultado ="las extensiones válidas son : jpg, jpeg, png, gig, jfif";
        echo $resultado; 
    }else{
        $resultado="la imagen ha sido cargada correctamente";
        
        //destino del archivo
        $destino = "fotos/".$name;
        //copiar la foto en el directorio
        move_uploaded_file($tmp_name,$destino);
        //copy($ruta,$destino);
        //subir los archivos a la base de datos, creando ua consulta insert
        require 'conexion.php';
        mysqli_query($conexion,"INSERT INTO graficos (nombre,archivo) VALUES('$nombre','$destino')");
        header('Location: index.php');
    }
            
}




?>