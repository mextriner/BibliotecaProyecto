<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="lb/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
</head>

<body class="bg-secondary" style="font-family:monospace;">
    <!--LA BARRA DE NAVEGACION-->
    <div class="container-fluid bg-secondary" style="padding:0;width:100%;">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="img/bibliLogoRec.png" alt="" style="width:35% ;"></a>
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
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="gestionPerfil.php">Mi cuenta</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="margin-left:5px;">
                            <a class="nav-link text-light" href="tablas.php" id="navbarDropdown" role="button">
                                Tablas <i class="fa-sharp fa-solid fa-chart-simple"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown" style="margin-left:5px;">
                            <a class="nav-link text-light" href="listarLibros.php" id="navbarDropdown" role="button">
                                Libros <i class="fa-solid fa-book-bookmark"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown" style="margin-left:5px;">
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                INSERTAR <i class="fa-solid fa-circle-plus"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="registroLibro.php">Registrar Libro</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="registroEditorial.php">Registrar Editorial</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="margin-left:5px;">
                            <form method="GET" class="d-flex text-light">

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="bus" placeholder="Término de búsqueda" aria-label="Recipient's username" aria-describedby="button-addon2">

                                    <button class="btn btn-outline-info" name="buscar" value="yes" type="submit" id="button-addon2">Buscar</button>
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
    <div class="container-fluid bg-dark align-item-center">
        <!--en esta linea se reparten los elementos-->
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light">
                <form method="POST" action="insertarEditorial.php">
                    <h1 style="font-size: 30px; ;"><strong>REGISTRO EDITORIAL</strong></h1>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Editorial</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección">
                    </div>
                    <input type="hidden" name="oculto" value="1">
                    <div class="mt-5 col-12 d-flex justify-content-center align-item-center">
                        <button class="btn btn-outline-success Hadow rounded border" type="submit">REGISTRARSE</button>

                    </div>

                </form>
            </div>


        </div>
    </div>
    <script src="lb/js/bootstrap.min.js"></script>
</body>

</html>