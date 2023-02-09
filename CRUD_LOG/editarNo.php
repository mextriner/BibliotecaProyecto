<?php
    if(!isset($_GET['id'])){
        header('Location: index.php');
    }
    include 'conexion.php';
    $id = $_GET['id'];
    $sql = $conexion->prepare("SELECT * FROM evaluaciones WHERE id_alumno = ?;");
    $persona = $sql->fetch(PDO::FETCH_OBJ);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar datos alumnos</title>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <center>
    <h3>Editar alumnos</h3>
<form method="POST" action="editarProceso.php">
    <table>
        <tr>
            <td>Primer Apellido</td>
            <td><input type="text" name="txt2Paterno" value="<?php echo $persona->primer_apellido?>" class="form-control"></td>
        </tr>
        <tr>
        <td>Segundo Apellido</td>
        <td><input type="text" name="txt2Materno" value="<?php echo $persona->segundo_apellido?>" class="form-control"></td>
        </tr>
        <tr>
        <td>Nombre</td>
        <td><input type="text" name="txt2Nombre" value="<?php echo $persona->nombre?>"class="form-control"></td>
        </tr>
        <tr>
        <td>Nota Parcial</td>
        <td><input type="text" name="txt2Parcial" value="<?php echo $persona->examen_parcial?>" class="form-control"></td>
        </tr>
        <tr>
        <td>Nota Final</td>
        <td><input type="text" name="txt2Final" value="<?php echo $persona->examen_final?>" class="form-control"></td>
        </tr>
        <input type="hidden" name="oculto" value="1">
	<input type="hidden" name="id2" value="<?php echo $persona->id_alumno;?>">
        
    <tr class="text-center">
        <td colspan="2" ><input type="submit" value="EDITAR ALUMNO"></td>
    </tr>


</table>


</form>
</center>
</div>
</div>
</div>
</body>
</html>
