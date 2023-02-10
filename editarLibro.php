<?php
session_start();
if ($_SESSION['id'] == null) {
    header('location:inicSesion.php');
}
if (isset($_POST['editar'])) {


    include 'conexion.php';/* 
    
    $sql = $mbd->prepare("SELECT * FROM libro WHERE ISBN LIKE (?);");
    $sql->execute([$id]);
    $resultado = $sql->fetch(PDO::FETCH_ASSOC); */
    $id = $_POST['idLibro'];
    include 'conexion.php';
    /*$conexion = new PDO('mysql:host=localhost;dbname=aplicacion','root', '');*/
    foreach ($mbd->query("SELECT * FROM libro;") as $res) {
        if ($res['ISBN'] == $id) {
            $resultado = $res;
        }
    }
    $sql=$mbd->prepare("SELECT COUNT(*) FROM unidad WHERE unidad.Libro_ISBN = ?;");
    $sql->execute([$res['ISBN']]);
    $unidades = $sql->fetchColumn();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="lb/css/bootstrap.min.css">
    <link rel="stylesheet" href="fuentes/css/all.min.css">
</head>

<body class="bg-secondary text-light" style="font-family:monospace;">

    <!--LA BARRA DE NAVEGACION-->
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


    <div class="container-fluid bg-dark">
        <!--en esta linea se reparten los elementos-->


        <form method="POST" action="actualizarLibro.php" enctype="multipart/form-data">

            <div class="row  d-flex justify-content-center">

                <div class="col-md-4 col-sm-12 mb-3 mt-4">
                    <h1 style="font-size: 30px;">EDITAR: <strong><?php echo $resultado["titulo"] ?></strong></h1>

                    <label for="exampleFormControlInput1" class="form-label">Libro</label>
                    <input type="text" class="form-control" name="Titulo" value="<?php echo $resultado["titulo"] ?>">
                </div>
            </div>
            <div class="row d-flex justify-content-center">


                <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light">


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ISBN</label>
                        <input type="text" class="form-control" name="ISBN" value=<?php echo $resultado['ISBN'] ?>>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fecha Publicación</label>
                        <input type="date" class="form-control" name="Fecha" value=<?php echo $resultado['fechaPublicacion'] ?>>
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Portada</label>
                        <input class="form-control" type="file" name="foto" id="formFileMultiple" multiple>
                    </div>
                    <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Número de Unidades</label>
                            <input type="text" class="form-control" name="Unidades" value="<?php echo $unidades ?>" placeholder="Unidades">
                        </div>
                </div>
                <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light">

                    <label for="inputState" class="form-label">Bestseller</label>
                    <div class="form-floating mb-4">
                        <select name="bestseller" class="form-select">
                            <option value=0>NO</option>
                            <option value=1>SÍ</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" type="text" rows="3"><?php echo $resultado["descripcion"] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="inputState" class="form-label">Editorial</label>
                        <div class="form-floating">

                            <select name="editorial" class="form-select">
                                <option selected>Seleccione Editorial</option>
                                <?php
                                include 'conexion.php';
                                /*$conexion = new PDO('mysql:host=localhost;dbname=aplicacion','root', '');*/
                                foreach ($mbd->query("SELECT * FROM editorial;") as $editorial) {

                                    echo '<option value=' . $editorial['idEditorial'] . '.>' . $editorial['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="mb-3 col-sm-12 col-md-1">
                    <button class="btn btn-outline-success Hadow rounded border" name="edit" type="submit">ACEPTAR</button>
                </div>
            </div>
        </form>


    </div>
    <script src="lb/js/bootstrap.min.js"></script>
</body>

</html>