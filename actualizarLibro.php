<?php
if (isset($_POST['edit'])) {
        //para obtener el nombre del archivo que se ha seleccionado
        $name = $_FILES['foto']['name'];
        //hay que acceder al archivvo temporal para ello:
        $tmp_name = $_FILES['foto']['tmp_name'];
        $error = $_FILES['foto']['error']; //
        $size = $_FILES['foto']['size'];
        $type = $_FILES['foto']['type'];
        $max_size = 740 * 740;

        $nombre = $_POST['Titulo']; //REQUEST: permite recibir los datos independientemente del método (POST o GET)
        $isbn = $_POST['ISBN'];
        $fecha = $_POST['Fecha'];
        $fecha = strtotime($fecha);
        $fecha = date('Y-m-d',$fecha);


        $bestseller = $_POST['bestseller'];
        if ($bestseller == 'NO') {
            $bestseller = false;
        } else {
            $bestseller = true;
        }
        $descripcion = $_POST['descripcion'];
        $editorial = $_POST['editorial'];

        if ($error) {
            $r = "ha ocurrido un error";
            echo $r;
        } elseif ($size > $max_size) {
            $r = "la imagen es demasioado grande. El máximo es de 1MB";
            echo $r;
        } elseif (
            $type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png' &&
            $type != 'image/gif' && $type != 'image/jpg' && $type != 'image/jfif'
        ) {
            $r = "las extensiones válidas son : jpg, jpeg, png, gig, jfif";
            echo $r;
        } else {
            $r = "la imagen ha sido cargada correctamente";

            echo $r;
            //destino del archivo
            $ruta = $name;
            $destino = "fotos/" . $name;
            //copiar la foto en el directorio
            move_uploaded_file($tmp_name, $destino);
            copy($ruta, $destino);
            //subir los archivos a la base de datos, creando ua consulta insert
            require 'conexion.php';

            $mbd->exec("SET CHARACTER SET utf8");
            $sql = $mbd->prepare("UPDATE libro SET ISBN=?, titulo=?, fechaPublicacion=?, bestSeller=?, portada=?, Editorial_idEditorial=?, descripcion=?
            WHERE ISBN = ?;");

            $resultado = $sql->execute([$isbn, $nombre, $fecha, $bestseller, $destino, $editorial, $descripcion,$isbn]);
            if ($resultado === TRUE) {
                header('Location: listarLibros.php');
            } else {
                echo "Error al insertar el registro";
            }
            //mysqli_query($mdb, "INSERT INTO unidad");
        }
    }
