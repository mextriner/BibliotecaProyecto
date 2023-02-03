<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$resultado = null;

if (isset($_POST['oculto'])) {
    //para obtener el nombre del archivo que se ha seleccionado
    $name = $_FILES['foto']['name'];
    //hay que acceder al archivvo temporal para ello:
    $tmp_name = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error']; //
    $size = $_FILES['foto']['size'];
    $type = $_FILES['foto']['type'];
    $max_size = 740 * 740;


    $nombre = $_REQUEST['Titulo']; //REQUEST: permite recibir los datos independientemente del método (POST o GET)
    $isbn = $_POST['ISBN'];
    $fecha = $_POST['Fecha'];
    $bestseller = $_POST['bestseller'];
    if ($bestseller != 'True') {
        $bestseller = 'False';
    }
    $descripcion = $_POST['descripcion'];
    $editorial = $_POST['editorial'];
    $unidades = $_POST['Unidades'];

    if ($error) {
        $resultado = "ha ocurrido un error";
        echo $resultado;
    } elseif ($size > $max_size) {
        $resultado = "la imagen es demasioado grande. El máximo es de 1MB";
        echo $resultado;
    } elseif (
        $type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png' &&
        $type != 'image/gif' && $type != 'image/jpg' && $type != 'image/jfif'
    ) {
        $resultado = "las extensiones válidas son : jpg, jpeg, png, gig, jfif";
        echo $resultado;
    } else {
        $resultado = "la imagen ha sido cargada correctamente";

        //destino del archivo
        $destino = "fotos/" . $name;
        //copiar la foto en el directorio
        move_uploaded_file($tmp_name, $destino);
        //copy($ruta,$destino);
        //subir los archivos a la base de datos, creando ua consulta insert
        require 'conexion.php';

        $mbd->exec("SET CHARACTER SET utf8");
        $sql = $mbd->prepare("INSERT INTO libro (ISBN,titulo,fechaPublicacion,bestSeller,portada,Editorial_idEditorial,descripcion) 
        VALUES('?','?','?','?','?','?','?');");

        $resultado = $sql->execute([$isbn,$nombre,$fecha,$bestseller,$destino,$editorial,$descripcion]);
        if ($resultado === TRUE) {
            header('Location: index.html');
        } else {
            echo "Error al insertar el registro";
        }

        for ($i = 0 ; $i < $unidades ; $i++){
            $mbd->exec("SET CHARACTER SET utf8");
            $sql = $mbd->prepare("INSERT INTO libro (INSERT INTO unidad(Libro_ISBN)) 
            VALUES('?';);");
            $resultado = $sql->execute([$isbn]);
        }
        

        mysqli_query($mdb, "INSERT INTO unidad");
        header('Location: index.html');
    }
}
