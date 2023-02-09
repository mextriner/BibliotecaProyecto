<?php
session_start();
if ($_SESSION['id'] == null) {
    header('location:inicSesion.php');
}

if (isset($_POST['cerrar'])) {
    session_unset();
    session_destroy();
    header('location:inicSesion.php');
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
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
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
    <div class="container-fluid bg-secondary" style="padding:0;width:100%;">
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

                        <li class="nav-item dropdown" style="margin-left:5px;">
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ¿Tienes cuenta? <i class="fa-solid fa-user"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="registro.php">Registrarse</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="inicSesion.php">Iniciar Sesión</a></li>
                                <li><a class="dropdown-item" href="gestionPerfil.php">Mi cuenta</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="margin-left:5px;">
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tablas <i class="fa-sharp fa-solid fa-chart-simple"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="listarUsuarios.php">Usuarios</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="listarLibros.php">Unidades</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="listarPrestamos.php">Préstamos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="margin-left:5px;">
                            <form class="d-flex">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Término de búsqueda" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-info" type="button" id="button-addon2">Buscar</button>
                                </div>
                            </form>
                        </li>


                    </ul>
                    <form method="post" action="">
                        <input type="hidden" value="1" name="cerrar">
                        <button class="btn btn-danger" type="submit" value="1" id="button-addon2">CERAR SESION</button>
                    </form>

                </div>
            </div>
        </nav>
    </div>


    <!---->
    <!--SLIDER-->
    <main>
        <!--AQUÍ VAN LAS CARDS-->
        <center>
            <div class="col-sm-12 col-md-12 bg-dark" style="width: 100%;">
                <h1 style="font-family:monospace; font-size : 46px; color: aliceblue;">LOS FAVORITOS DE LOS LECTORES
                </h1>
                <iframe src="swiper.php" style="height: 650px; width:100%;border-radius: 5%;"></iframe>
            </div>

        </center>

        <!--FOOTER-->

        <div class="container-fluid bg-secondary">
            <div class="row d-flex justify-content-center mb-3">

                <div class="col-sm-12 col-md-6 mb-5 text-light text-center">
                    <a class="nav-link active text-light" aria-current="page" href="#">ACERCA DE NOSOTROS</a>
                    <a class="nav-link text-light" href="#">AYÚDANOS A MEJORAR</a>
                    <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">ASISTENCIA</a>
                    <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">ESTADO DEL SERVIDOR</a>
                </div>
                <div class="col-sm-12 col-md-6 text-center" style="font-size: 25px;">
                    <div class=""><i class="fa-brands fa-facebook"></i></div>
                    <div class=""> <i class="fa-brands fa-instagram"></i></div>
                    <div class=""><i class="fa-brands fa-twitter"></i></div>
                    <div class=""> <i class="fa-brands fa-youtube"></i></div>
                </div>
            </div>
        </div>


        
    </main>
    <script src="lb/js/bootstrap.min.js"></script>
</body>

</html>