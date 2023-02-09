<?php
if (isset($_POST['eliminar'])) {
    $id = $_POST['idLibro'];
    include 'conexion.php';
    // Consulta SQL para eliminar la entrada con el ID especificado
    try {

        $sql = $mbd->prepare("DELETE FROM libro WHERE libro.ISBN LIKE (?)");

        $resultado = $sql->execute([$id]);
        header('location:listarLibros.php');
    } catch (PDOException $e) {
        echo "Error al eliminar la entrada: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index
    </title>
    <link rel="stylesheet" href="lb/css/bootstrap.min.css">
    <link rel="stylesheet" href="fuentes/css/all.min.css">
    <style>
        /* .carrusel {
            width: 60%;
            margin-bottom: 20px;
        } */

        main {
            /* margin-top: 160px; */
            width: 100%;
        }

        .navbar {
            border: solid white 1px;
            border-radius: 5%;
        }
    </style>
</head>

<body class="bg-secondary" style="font-family:monospace;">
    <!--LA BARRA DE NAVEGACION-->
    <div class="container-fluid bg-secondary" style="padding:0">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href=""><img src="img/bibliLogoRec.png" alt="" style="width:35% ;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="bg-ligth">
                        <span class="navbar-toggler-icon"></span>
                    </div>

                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ¿Tienes cuenta?
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="registro.php">Registrarse</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="inicSesion.php">Iniciar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-info" type="button" id="button-addon2">Button</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row" style="padding:100px;">
            <?php
            include 'conexion.php';
            /*$conexion = new PDO('mysql:host=localhost;dbname=aplicacion','root', '');*/
            foreach ($mbd->query("SELECT * FROM libro;") as $libro) { ?>
                <div class="col-sm-12 col-md-3 text-light text-center bg-dark d-flex justify-content-center" style="border-radius:5%;border: solid 1px darkgray;">
                    <div style="padding:50px;">
                        <form action="editarLibro.php" method="POST">
                            <img src='<?php echo $libro['portada'] ?>' style="height:300px;width:198px;border-radius:5%;">
                            <div style="height:120px;">
                                <h1><?php echo $libro['titulo'] ?></h1>
                            </div>



                            <input type="hidden" name="idLibro" value='<?php echo $libro['ISBN'] ?>'>
                            <button class="btn btn-outline-info" type="submit" name="editar" id="button-addon2">EDITAR</button>
                            
                        </form>
                        <button class="btn btn-outline-danger mt-3" type="submit" name="eliminar" id="button-addon2">ELIMINAR</button>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>