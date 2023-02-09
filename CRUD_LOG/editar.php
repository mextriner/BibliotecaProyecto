<?php
/*Para editar necesito que cargue toda la información en una tabla dentro de un formulario porque al final hay que limpiar los datos*/

if(!isset($_GET['id'])){
   header('Location: index.php');
}
include 'conexion.php';
$id = $_GET['id'];
$sql = $conexion->prepare("SELECT * FROM evaluaciones WHERE id_alumno = ?;");
$sql ->execute([$id]);
$persona = $sql->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar datos de Alumnos</title>
<style>



</style>
</head>
<body>
<center>
<h3>Editar alumno:</h3>
<form method="POST" action="editarProceso.php" role="form">
<table>
            <tr>
                <td>Primer Apellido: </td>
                <td><input type="text" name="txt2Paterno" value="<?php echo $persona->primer_apellido?>"></td>
            </tr>
            <tr>
                <td>Segundo Apellido: </td>
                <td><input type="text" name="txt2Materno" value="<?php echo $persona->segundo_apellido?>"></td>
            </tr>
            <tr>
                <td>Nombre: </td>
                <td><input type="text" name="txt2Nombre" value="<?php echo $persona->nombre?>"></td>
            </tr>
            <tr>
                <td>Nota Parcial: </td>
                <td><input type="text" name="txt2Parcial" value="<?php echo $persona->examen_parcial?>"></td>
            </tr>
            <tr>
                <td>Nota Final: </td>
                <td><input type="text" value="<?php echo $persona->examen_final?>" name="txt2Final"></td>
            </tr>
            <input type="hidden" name="oculto" value="1">
            <tr>
                <!--campo oculto para guardar el proceso-->
                <input type="hidden" name="oculto">
                <input type="hidden" name="id2" value="<?php echo $persona->id_alumno; ?>">
                <td colspan="2"><input type="submit" name="" value="EDITAR ALUMNOS" class="btn btn-default bg-dark mt-5" style="color: white;background:#000"></td>
            </tr>
<!--Tengo que guardar dentro de value los datos de cada alumno-->
</table>


</form>

</center>
    
</body>
</html>