
<?php
include 'conexion.php';
if(isset($_POST['sesion'])){
    $nombre = $_POST['usuario'];
    $clave = $_POST['clave'];
    $sql = $mbd->prepare("SELECT idUsuario FROM usuario WHERE idUsuario = ?;");
    $sql->execute([$nombre]);
    $count = $sql->rowCount();
    if($count > 0){
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        if($resultado['clave']==$clave){
            session_start();
            $_SESSION['id']=$nombre;
            header('location:idex.php');
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="lb/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css2/all.min.css" />
</head>

<body calss="d-flex justify-content-center" style="background-color: #262424;">
    
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-4 mt-3 mb-3 text-light">

            <a href="#"><img src="img/bibliLogoRec.png" style="width:20%;padding-left:20px;"></a>
            <form method="" action="" style="padding-left:20px;padding-right:20px;">
                <h1 style="font-size: 30px; margin-top:27px;"><strong>INICIAR SESIÓN</strong></h1>
                <div class="mt-3 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Apellidos">
                </div>

                <div class="mt-5 col-12 d-flex justify-content-center align-item-center" style="text-shadow:2px 2px 2px black ;">
                    <button class="btn btn-outline-success Hadow rounded border" name="sesion" type="submit">INICIAR SESIÓN</button>

                </div>

            </form>

        </div>
    </div>


</body>
<script src="lb/js/bootstrap.min.js"> </script>

</html>