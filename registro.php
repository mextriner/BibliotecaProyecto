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
<body class="bg-secondary" style="font-family:monospace;">
    <div>

        <!--LA BARRA DE NAVEGACION-->
        <div class="container-fluid bg-dark" style="padding:0">
            <nav class="navbar navbar-expand-lg navbar-light "  style="margin: 5px ;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="https://www.leagueoflegends.com/es-es/"><img
                            src="img/bibliLogoRec.png" alt="" style="width:50% ;"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="container-fluid bg-dark align-item-center">
        <!--en esta linea se reparten los elementos-->
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light">
                <form method="POST" action="insertarUsuario.php">
                    <h1 style="font-size: 30px; ;"><strong>REGISTRO</strong></h1>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Clave</label>
                        <input type="password" class="form-control" name="clave" placeholder="Contraseña">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Direccion de Residencia">
                    </div>

                    <div class="mb-5 pb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fechaNac" placeholder="Fecha de Nacimiento">
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