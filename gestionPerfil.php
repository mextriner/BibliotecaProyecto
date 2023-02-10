<?php
session_start();
include 'conexion.php';
$id = $_SESSION['id'];
$sql = $mbd->prepare("SELECT * FROM usuario WHERE idUsuario = ?;");
$sql->execute([$id]);
$resultado = $sql->fetch(PDO::FETCH_ASSOC);
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
    <!---->

    <!-- INFO DE MI CUENTA -->
    <!-- NOMBRE, APELLIDOS, CORREO, ETC. -->

    <div class="container-fluid align-item-center">
        <!--en esta linea se reparten los elementos-->
        <div class="row d-flex justify-content-center text-center" style="font-family:monospace; color: aliceblue;">
            <h5 style="font-family:monospace; font-size : 46px; color: #ffffff;"><strong>MI CUENTA <i class="fa-solid fa-user"></i></strong></h5>
            <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light bg-dark p-5" style="border-radius: 5%;">
                <form class="mb-5" method="post" action="actualizarUsuario.php">
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
                <a class="mt-2 text-danger" href="eliminarUsuario.php?idUsuario=<?php echo $_SESSION['id'] ?>">ELIMINAR CUENTA</a>
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
                <?php
                include 'conexion.php';
                $sql2 = $mbd->prepare("SELECT * FROM usuario_has_unidad WHERE Usuario_idUsuario = ?;");
                $sql2->execute([$_SESSION['id']]);
                $r = $sql2->fetchAll(PDO::FETCH_ASSOC);
                foreach ($r as $res) {
                    $sql3 = $mbd->prepare("SELECT * FROM unidad WHERE idUnidad LIKE ?;");
                    $sql3->execute([$res['Unidad_idUnidad']]);
                    $uni = $sql3->fetch(PDO::FETCH_ASSOC);

                    $sql4 = $mbd->prepare("SELECT * FROM libro WHERE ISBN LIKE ?;");
                    $sql4->execute([$uni['Libro_ISBN']]);
                    $lib = $sql4->fetch(PDO::FETCH_ASSOC);
                ?>


                    <div class="card bg-dark text-light" style="width: 18rem;">
                        <img src="<?php echo $lib['portada']; ?>" alt="..." style="border-radius:5%;">
                        <div class="card-body">
                            <p class="card-text"><strong><?php echo $lib['titulo']; ?></strong>
                                <?php echo $lib['descripcion']; ?></p>
                        </div>
                    </div>
                    <button class="btn-info" name="devolver">DEVOLVER</button>
                <?php
                }
                ?>
            </div>

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






        </div>
    </div>






    <script src="lb/js/bootstrap.min.js"></script>
</body>

</html>