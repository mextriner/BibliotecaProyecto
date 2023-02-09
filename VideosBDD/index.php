<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos a la base de datos</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <style>
        main {
            width: 70%;
            margin: auto;
            margin-top: 50px;
            color: black;
            font-size: 14pt;
            font-family: broadway;
        }

        form {
            width: 80%;
            margin: auto;
            padding: 25px;
        }

        input {
            width: 100%;
            margin-bottom: 25px;
            padding: 10px;
        }

        input[type="submit"] {
            background: orangered;
            color: #fff;
        }
    </style>
</head>

<!--LA BARRA DE NAVEGACION-->
<div class="container-fluid d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid"  style="width: 1903px;">
            
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="width: 1000px;">

                <form action="buscar.php" method="POST"  style="width: 1000px;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                        <li class="nav-item">
                            <input type="text" name="buscador" placeholder="Término de búsqueda" style="width: 1000px;">
                        </li>
                        <li class="nav-item">
                            <button class="btn-lg btn-outline-success" type="submit">Buscar</button>
                        </li>
                    </ul>
                </form>




            </div>
        </div>
    </nav>
</div>
<!---->

<body>
    <main>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-6 bg-success">
                <section id="subir" class="">
                    <form action="valida_foto2.php" method="post" enctype="multipart/form-data">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre">

                        <input type="file" name="foto">

                        <input type="submit" name="enviar" value="Subir archivo">

                    </form>

                </section>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-6">
                <div class="container">
                    <?php

                    require 'conexion.php';
                    $sql = mysqli_query($conexion, "SELECT * FROM graficos");
                    while ($res = mysqli_fetch_array($sql)) {
                        $id = $res['id_foto'];
                        echo "<artile class='d-flex justify-content-around'><div style='margin:40px'><h4>" . $res['nombre'] . "</h4>";
                        echo "<img src = '" . $res['archivo'] . "' width='200px' height='200px'>";
                        echo "<form action='eliminar_foto.php' method='GET' enctype='multipart/form-data'>";
                        echo "<input name = 'id' type='hidden' value='" . $id . "'>";
                        echo "<input class='bg-danger' type='submit' name='eliminar' value='Eliminar'>";

                        echo "</form></div></article>";
                    }



                    ?>
                </div>

            </div>

        </div>

    </main>

    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>

</html>