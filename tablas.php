<?php
include 'conexion.php';
session_start();
if ($_SESSION['id'] == null) {
    header('location:inicSesion.php');
}
$consulta = "SELECT * FROM usuario;";
$sql = $mbd->prepare($consulta);
$sql->execute();
$resultado = $sql->fetchALL(PDO::FETCH_ASSOC);

$consulta2 = "SELECT * FROM libro;";
$sql2 = $mbd->prepare($consulta2);
$sql2->execute();
$resultado2 = $sql2->fetchALL(PDO::FETCH_ASSOC);

$consulta3 = "SELECT * FROM usuario_has_unidad;";
$sql3 = $mbd->prepare($consulta3);
$sql3->execute();
$resultado3 = $sql3->fetchALL(PDO::FETCH_ASSOC);

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
    <title>Document</title>
    <link rel="stylesheet" href="lb/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
</head>

<body>
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
    <section>
        <h1>BIENVENIDO: <?php echo $_SESSION['id'] ?></h1>

        <div class="row d-flex justify-content-center px-5">
            <div class="col-md-4 col-sm-12" style="width:66%;">

                <!--Comenzamos a mostrar los datos-->
                <h2>Listado de USUARIOS <a class="text-dark" href="usuarioPdf.php"><i class="fa-solid fa-file-circle-plus"></i></a></h2>
                <table class="table" style="border: solid darkgray 1px;">
                    <tr>
                        <td>Usuario</td>
                        <td>Apellido</td>
                        <td>Nombre</td>
                        <td>Direccion</td>
                        <td>Edad</td>
                    </tr>
                    <?php
                    $hoy = date('Y-m-d');
                    $hoy = strtotime($hoy);
                    foreach ($resultado as $usur) {
                        $nac = strtotime($usur['fechaNac']);

                        $edad = round(((((abs($hoy - $nac)) / 60) / 60) / 24) / 365, 0);
                    ?>
                        <tr style="border: solid black 2px;">
                            <td style="border: solid black 2px;"><?php echo $usur['idUsuario']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $usur['apellido']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $usur['nombre']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $usur['direccion']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $edad; ?> años</td>
                            <!--Primera cosa que faltaba: Voy a enviar una variable via URL-->
                            <!--Para probar que va situaros sobre cualquier boton editar y debe darme el id abajo-->

                        </tr>
                    <?php
                    }
                    ?>

                </table>
                <h2>Listado de LIBROS   <a class="text-dark" href="libroPdf.php"><i class="fa-solid fa-file-circle-plus"></i></a>     <a class="text-dark" href="libroGraf.php"><i class="fa-solid fa-chart-line"></i></a></h2>
                <table class="table" style="border: solid darkgray 1px;">
                    <tr>
                        <td>ISBN</td>
                        <td>Título</td>
                        <td>Publicación</td>
                        <td>Descripción</td>
                        <td>Editorial</td>
                        <td>Unidades</td>
                    </tr>
                    <?php
                    foreach ($resultado2 as $libro) {

                        $stmt = $mbd->prepare("SELECT * FROM editorial WHERE idEditorial = ?;");
                        $stmt->execute([$libro['Editorial_idEditorial']]);
                        $editorial = $stmt->fetch(PDO::FETCH_ASSOC);

                        $stmt2 = $mbd->prepare("SELECT COUNT(*) FROM unidad WHERE unidad.Libro_ISBN = ?;");
                        $stmt2->execute([$libro['ISBN']]);
                        $unidades = $stmt2->fetchColumn();

                    ?>
                        <tr style="border: solid black 2px;">
                            <td style="border: solid black 2px;"><?php echo $libro['ISBN']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $libro['titulo']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $libro['fechaPublicacion']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $libro['descripcion']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $editorial['nombre']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $unidades; ?></td>
                            <!--Primera cosa que faltaba: Voy a enviar una variable via URL-->
                            <!--Para probar que va situaros sobre cualquier boton editar y debe darme el id abajo-->

                        </tr>
                    <?php
                    }
                    ?>

                </table>

                </table>
                <h2>Listado de Préstamos <a class="text-dark" href="prestamoPdf.php"><i class="fa-solid fa-file-circle-plus"></i></a></h2>
                <table class="table" style="border: solid darkgray 1px;">
                    <tr>
                        <td>Usuario</td>
                        <td>Libro</td>
                        <td>Fecha Préstamo</td>
                        <td>Fecha Entrega</td>
                    </tr>
                    <?php
                    foreach ($resultado3 as $prestamo) {

                        $devol = date("Y-m-d H:i:s", strtotime($prestamo['Fecha'] . "+2 week"));

                        $stmt3 = $mbd->prepare("SELECT * FROM unidad WHERE idUnidad = ?;");
                        $stmt3->execute([$prestamo['Unidad_idUnidad']]);
                        $un = $stmt3->fetch(PDO::FETCH_ASSOC);

                        $stmt4 = $mbd->prepare("SELECT * FROM libro WHERE ISBN = ?;");
                        $stmt4->execute([$un['Libro_ISBN']]);
                        $l = $stmt4->fetch(PDO::FETCH_ASSOC);

                        $stmt5 = $mbd->prepare("SELECT * FROM usuario WHERE idUsuario = ?;");
                        $stmt5->execute([$prestamo['Usuario_idUsuario']]);
                        $us = $stmt5->fetch(PDO::FETCH_ASSOC);

                    ?>
                        <tr style="border: solid black 2px;">
                            <td style="border: solid black 2px;"><?php echo $us['idUsuario']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $l['titulo']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $prestamo['Fecha']; ?></td>
                            <td style="border: solid darkgray 1px; "><?php echo $devol; ?></td>

                        </tr>
                    <?php
                    }
                    ?>

                </table>


            </div>

    </section>
    <script src="lb/js/bootstrap.min.js"></script>
</body>

</html>