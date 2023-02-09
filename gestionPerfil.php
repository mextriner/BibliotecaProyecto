<?php
session_start();
include 'conexion.php';
$id = $_SESSION['id'];
$sql = $mbd->prepare("SELECT * FROM usuario WHERE idUsuario = ?;");
$sql->execute([$id]);
$resultado = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mi Cuenta
    </title>
    <link rel="stylesheet" href="lb/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <style>
        .navbar {
            border: solid white 1px;
            border-radius: 5%;
        }
    </style>
</head>

<body class="bg-secondary">
    <div>

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
                    </div>
                </div>
            </nav>
        </div>
        <!---->

        <!-- INFO DE MI CUENTA -->
        <!-- NOMBRE, APELLIDOS, CORREO, ETC. -->

        <div class="container-fluid align-item-center">
            <!--en esta linea se reparten los elementos-->
            <div class="row d-flex justify-content-center text-center" style="font-family:monospace; color: aliceblue;">
                <h5 style="font-family:monospace; font-size : 46px; color: #ffffff;"><strong>MI CUENTA <i class="fa-solid fa-user"></i></strong></h5>
                <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light bg-dark p-5" style="border-radius: 5%;">
                    <form method="post" action="actualizarUsuario.php">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="clave" placeholder="Contraseña">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario" value='<?php echo $resultado["idUsuario"] ?>'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value='<?php echo $resultado["nombre"] ?>'>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellido" value='<?php echo $resultado["apellido"] ?>'>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Direccion</label>
                            <input type="text" class="form-control" name="direccion" value='<?php echo $resultado["direccion"] ?>'>
                        </div>
                        <div class="mt-5 mb-5 pb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="fechaNac" value='<?php echo $resultado["fechaNac"] ?>'>
                        </div>

                        <div class="mt-5 col-12 d-flex justify-content-center align-item-center">
                            <button class="btn btn-outline-info Hadow rounded border" name="actualizar" type="submit">ACTUALIZAR
                                CUENTA</button>

                        </div>
                    </form>

                </div>
            </div>

        </div>








    </div>




    <!-- HISTORIAL DE LIBROS/ LIBROSD EN ALQUILER... -->


    <!--ACTUALIZAR MI CUENTA-->

    <!--en esta linea se reparten los elementos-->








    </div>
    <!--AQUÍ VAN LAS CARDS-->

    <div class="container-fluid">
        <div class="row justify-content-center mt-3 pt-2 pb-2 bg-secondary">
            <h4 style="font-family:monospace; font-size : 46px; color: aliceblue;">MIS ÚLTIMOS LIBROS
            </h4>
            <div class="col-sm-12 col-md-2">
                <div class="card bg-dark text-light" style="width: 18rem;">
                    <img src="img/teemo.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Teemo</strong> con su veneno y su cegado es sin
                            lugar a
                            dudas el terror de la
                            toplane.</p>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-2">
                <div class="card bg-dark text-light " style="width: 18rem;">
                    <img src="img/bardo.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Bardo</strong> es el compañero ideal para el adc ya
                            que
                            gracias a la curaciión y
                            los portales es fácil escapar.</p>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-2">
                <div class="card bg-dark text-light" style="width: 18rem;">
                    <img src="img/MissFortune_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Miss Fortune</strong> la famosa pirata de Aguas
                            Estancadas derrite tanques, estructuras y adc's a
                            partes iguales.</p>
                    </div>
                </div>
            </div>





            <div class="col-sm-12 col-md-2">
                <div class="card bg-dark text-light" style="width: 18rem;">
                    <img src="img/Mordekaiser_13.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Mordekaiser</strong> una divinidad menor dedicada a
                            la
                            guerra te transporta a su mundo
                            para robarrte tu alma y ejecutarde ahí.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LIBROS RECOMENDADOS (POR CATEGORÍA) -->
    <div class="container-fluid">
        <div class="row justify-content-center mt-3 pt-2 pb-2 bg-secondary">
            <h4 style="font-family:monospace; font-size : 46px; color: aliceblue;">RECOMENDADOS</h4>
            <div class="col-sm-12 col-md-2">
                <div class="card bg-dark text-light" style="width: 18rem;">
                    <img src="img/teemo.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Teemo</strong> con su veneno y su cegado es sin
                            lugar a
                            dudas el terror de la
                            toplane.</p>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-2">
                <div class="card bg-dark text-light " style="width: 18rem;">
                    <img src="img/bardo.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Bardo</strong> es el compañero ideal para el adc ya
                            que
                            gracias a la curaciión y
                            los portales es fácil escapar.</p>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-2">
                <div class="card bg-dark text-light" style="width: 18rem;">
                    <img src="img/MissFortune_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Miss Fortune</strong> la famosa pirata de Aguas
                            Estancadas derrite tanques, estructuras y adc's a
                            partes iguales.</p>
                    </div>
                </div>
            </div>





            <div class="col-sm-12 col-md-2">
                <div class="card bg-dark text-light" style="width: 18rem;">
                    <img src="img/Mordekaiser_13.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Mordekaiser</strong> una divinidad menor dedicada a
                            la
                            guerra te transporta a su mundo
                            para robarrte tu alma y ejecutarde ahí.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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






    </div>
    </div>






    <script src="lb/js/bootstrap.min.js"></script>
</body>

</html>