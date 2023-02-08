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
    <div>

        <!--LA BARRA DE NAVEGACION-->
        <div class="container-fluid bg-dark" style="padding:0">
            <nav class="navbar navbar-expand-lg navbar-light " style="margin: 5px ;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="https://www.leagueoflegends.com/es-es/"><img src="img/bibliLogoRec.png" alt="" style="width:50% ;"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="bg-ligth">
                            <span class="navbar-toggler-icon"></span>
                        </div>

                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ¿Tienes cuenta?
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Registrarse</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Iniciar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-success" type="button" id="button-addon2">Button</button>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid bg-dark">
            <!--en esta linea se reparten los elementos-->

            <form method="POST" action="insertarLibro.php" enctype="multipart/form-data">

                <div class="row  d-flex justify-content-center">

                    <div class="col-md-4 col-sm-12 mb-3 mt-4">
                        <h1 style="font-size: 30px;"><strong>REGISTRO</strong></h1>

                        <label for="exampleFormControlInput1" class="form-label">Libro</label>
                        <input type="text" class="form-control" name="Titulo" placeholder="Título">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">


                    <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light">


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ISBN</label>
                            <input type="text" class="form-control" name="ISBN" placeholder="00 0000 000 0">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha Publicación</label>
                            <input type="date" class="form-control" name="Fecha" placeholder="Fecha">
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Portada</label>
                            <input class="form-control" type="file" name="foto" id="formFileMultiple" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Número de Unidades</label>
                            <input type="text" class="form-control" name="Unidades" placeholder="Unidades">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light">

                        <label for="inputState" class="form-label">Bestseller</label>
                        <div class="form-floating mb-4">
                            <select name="bestseller" class="form-select">
                                <option selected>NO</option>
                                <option>SÍ</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
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

                                        echo '<option>' . $editorial['idEditorial'];
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>




                        <input type="hidden" name="oculto" value="1">


                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="mb-3 col-sm-12 col-md-1">
                        <button class="btn btn-outline-success Hadow rounded border" type="submit">REGISTRARSE</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <script src="lb/js/bootstrap.min.js"></script>
</body>

</html>