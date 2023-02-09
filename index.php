<?php

if(!isset($_SESSION['id'])){
    header('location.inicSesion.php');
}else{
    echo $_SESSION['id'];
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
                            <input type="text" class="form-control" placeholder="Término de búsqueda" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-info" type="button" id="button-addon2">Button</button>
                        </div>
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

        <div class="container-flid  bg-secondary">
            <nav class="navbar navbar-expand-lg navbar-light bg-secondary mt-3">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12 justify-content-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                                    <li class="nav-item">
                                        <a class="nav-link active text-light" aria-current="page" href="#">ACERCA
                                            DEL
                                            LEAGUE
                                            OF LEGENDS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="#">AYÚDANOS A MEJORAR</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">ASISTENCIA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">ESTADO DEL SERVIDOR</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>


                </div>
            </nav>
            <div class="row d-flex align-items-center justify-content-center mb-3">

                <div class="col-sm-12 col-md-4  text-light">
                    <i class="copy fa-sharp fa-solid fa-copyright text-warning" style="font-size:30px ;"></i>opyRight.
                    Página propiedad de
                    RiotGmes
                </div>
                <div class="row col-sm-12 col-md-4 ">
                    <div class="col"><i class="fa-brands fa-facebook"></i></div>
                    <div class="col"> <i class="fa-brands fa-instagram"></i></div>
                    <div class="col"><i class="fa-brands fa-twitter"></i></div>
                    <div class="col"> <i class="fa-brands fa-youtube"></i></div>
                </div>
            </div>
        </div>


        <script src="lb/js/bootstrap.min.js"></script>
    </main>

</body>

</html>