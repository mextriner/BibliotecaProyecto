<?php
    session_start();
        if(!isset($_SESSION['nombre'])){
            header('Location: login.php');

        }elseif(isset($_SESSION['nombre'])){
            include 'conexion.php';
			$sql = $bd->query("SELECT * FROM evaluaciones;");
			$resultado = $sql->fetchAll(PDO::FETCH_OBJ);

        } else{
        echo "Error de sessión";
        }  

    ?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Alumnos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
<style>
form{width: 80%;padding-top: 5px}
 tr,td{text-align: center}
    input{margin-bottom: 7px}

</style>
</head>
<body>
<header>
<!--NAVEGACION-->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary text-rigth">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <img src="logotipo.png" class="img-fluid" style="width: 80px; height: 80px">
		<h3 class="mx-3 text-white">App Grado DAM</h3>
        
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup"></div>
        <div class="card text-center border-primary">
        <div class="card-body">
		<form action="buscador.php" method="GET">
        <input type="search" name="buscar" placeholder="Introduzca frase" style="padding: 0 10px; width: 60%;">
        <button type="submit" class=" btn-outline-success  border-success">Buscar </button>
		</form>
    </div>
</div>
    
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
                
                <a class="nav-item nav-link active text-white " href="#"> INICIO<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link text-white" href="#">NOSOTROS</a>
                <a class="nav-item nav-link text-white" href="#">ENTRAR</a>
                <a class="nav-item nav-link text-white" href="#">REGISTRARSE</a>
                <a class="nav-item nav-link text-white" href="cerrar.php">CERRAR SESSIÓN</a>
                
                
            </div>
        </div>
    </nav>
</header>

<section>
    <h1>BIENVENIDO: <?php echo $_SESSION['nombre']?></h1>
<hr>
<div class="row  px-5">
<div class="col-md-8">
<hr>
<!--Comenzamos a mostrar los datos-->
<h2>Listado de Alumnos</h2>
<table class="table">
    <tr>
    <td>Código del Alumno</td>
   <td>Primer Apellido</td>
    <td>Segundo Apellido</td>
	 <td>Nombre</td>
    <td>Examen Parcial</td>
    <td>Examen Final</td>
    <td>Promedio</td>
    <td>Editar</td>
    <td>Eliminar</td>
   </tr>
   <?php
    foreach ($resultado as $datos){
    ?>
    <tr>
        <td><?php echo $datos->id_alumno;?></td>
        <td><?php echo $datos->primer_apellido;?></td>
        <td><?php echo $datos->segundo_apellido;?></td>
		<td><?php echo $datos->nombre;?></td>
        <td><?php echo $datos->examen_parcial;?></td>
        <td><?php echo $datos->examen_final;?></td>
        <td><?php echo ($datos->examen_parcial+ $datos->examen_final)/2;?></td>
		<!--Primera cosa que faltaba: Voy a enviar una variable via URL-->
		<!--Para probar que va situaros sobre cualquier boton editar y debe darme el id abajo-->
        <td><button><a href="editar.php?id=<?php echo $datos->id_alumno; ?>">Editar</a></button></td>
        <td><button><a href="eliminar.php?id=<?php echo $datos->id_alumno;?>">Eliminar</a></button></td>

    </tr>
        <?php
    }
    ?>
 
</table>


</div>
<div class="col-md-4">

<!--Comienza INSERTAR REGISTROS-->
<h3>Ingresar Nuevos Alumnos</h3>
<form method="POST" action="insertar.php">
    <table>
        <tr>
        <td>Primer Apellido</td>
        <td><input type="text" name="txtPaterno" class="form-control"></td>
        </tr>
        <tr>
        <td>Segundo Apellido</td>
        <td><input type="text" name="txtMaterno" class="form-control"></td>
        </tr>
        <td>Nombre</td>
        <td><input type="text" name="txtNombre" class="form-control"></td>
        </tr>
        <tr>
        <td>Nota Parcial</td>
        <td><input type="text" name="txtParcial" class="form-control"></td>
        </tr>
        <tr>
        <td>Nota Final</td>
        <td><input type="text" name="txtFinal" class="form-control"></td>
        </tr>
        <input type="hidden" name="oculto" value="1">
        <tr>
            <td colspan="2" class="text-center">
        <input type="submit" name="" value ="INGRESAR ALUMNOS" class="btn btn-default bg-dark mt-5" style="color: white">
</td>
    </tr>


</table>


</form>
</div>
</hr>
</div>
 </section> 
 <!--Comienza aquí insertar fotos--> 
 <section>
    <div class="container text-black mt-5">
        <h4>Insertar Fotografía alumno</h4>
                <div class="row py-5 bg-primary">
                    <div class="col-md-4 mx-4">
                        
                        <form class="formulario" action="insertarFotos.php" method="POST" enctype="multipart/form-data">                            
                                <div class="form-group">
									<label class="font-weight-bold">Nombre del alumno</label>
                                    <input type="text" class="form-control" name="nombre" style="inline-size:175px;">
                                </div>
                                <div class="form-group">
									<label for="archivo" class="font-weight-bold">Fotografía</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" lang="es" name="imagen">
                                        <label class="custom-file-label" for="customFileLang" style="inline-size:175px;">Examinar</label>
                                    </div>
                                </div>
                                <div class="pb-3">                                
                                    <button type="submit" class="btn btn-danger text-center" name="subir" style="padding: 2px 25px">SUBIR</button>
                                </div>                  
                                
                            
                        </form>
                    </div>
                    <div class="col-md-8 mx-4">
                    <h4 class="align-center mb-5">Mostrar Fotografía alumno</h4>
                    <?php
					include 'conexion.php';
                     /*$conexion = new PDO('mysql:host=localhost;dbname=aplicacion','root', '');*/
                    foreach($conexion->query("SELECT * FROM fotos LIMIT 12;") as $alumno)
				{
                    ?>
                <article>
                    <div class="container">
                        
                    <?php
                    echo '<img src="'.$alumno[2].'"width="100" height="90"><br>';
                    echo $alumno[1]."<br>";
                    ?>
                   </div>     
            	</article>		                        
                    
                <?php
                }
                ?>
                    
                </div>
            </div>
			</div>
			</div>
    </section>
</body>
</html>