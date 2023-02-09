<?php
if (isset($_SESSION['nombre'])) header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="lb/css/bootstrap.min.css">
    <style>
        form {
            width: 50%;
            margin: auto
        }

        input {
            width: 80%;
            margin-bottom: 8px;
            padding: 8px 0;
        }
    </style>
</head>

<body>
    <center>
        <div class="row">
            <h4 class="text-center">LOGUEARSE</h4>
            <div class="col-sm12 col-md5 d-flex justify-content-center">
                <form class="form-control" action="loginProceso.php" method="post">
                    <div class="mb-2">
                        <input type="text" class="for-group" name="usuario2" placeholder="Usuario">
                    </div>
                    <div class="mb-2">
                        <input type="password" class="for-group" name="clave2" placeholder="Contraseña">
                    </div>
                    <div class="mt-5">
                        <input type="submit" class="btn btn-primary btn-lg" name="enviar">
                    </div>
                </form>

            </div>


        </div>
    </center>
    <script src="lb/js/bootstrap.min.js"> </script>
</body>

</html>