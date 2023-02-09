<?php
require("conexion.php");
$busqueda = $_GET['buscar'];
mysqli_select_db($conexion, $basededatos) or die("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf-8");

$consulta = "SELECT codigo, n_habitacion, tipo, estado, fechaentrada, fechasalida, n_noche, precio_noche FROM hoteles
    WHERE hoteles.codigo LIKE '%$busqueda%' || hoteles.n_habitacion LIKE '%$busqueda%' || hoteles.tipo LIKE '%$busqueda%' 
    || hoteles.estado LIKE '%$busqueda%' || hoteles.fechaentrada LIKE '%$busqueda%' || hoteles.fechasalida LIKE '%$busqueda%' 
    || hoteles.n_noche LIKE '%$busqueda%' || hoteles.precio_noche LIKE '%$busqueda%'";
$resultado = mysqli_query($conexion, $consulta);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <section>
        <h2>Resultado de la búsqueda</h2>
        <table>
            <tr>
                <th>CÓDICO||</th>
                <th> NÚMERO DE HABITACIÓN||</th>
                <th> TIPO||</th>
                <th> ESTADO||</th>
                <th> FECHA ENTRADA||</th>
                <th> FECHA SALIDA||</th>
                <th> PRECIO / NOCHE</th>
            </tr>
            <?php
            while ($reg = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $reg['codigo']; ?> </td>
                    <td><?php echo $reg['n_habitacion']; ?></td>
                    <td><?php echo $reg['tipo']; ?></td>
                    <td><?php echo $reg['estado']; ?></td>
                    <td><?php echo $reg['fechaentrada']; ?></td>
                    <td><?php echo $reg['fechasalida']; ?></td>
                    <td><?php echo $reg['n_noche']; ?></td>
                    <td><?php echo $reg['precio_noche']; ?></td>

                </tr>
            <?php
            }
            mysqli_close($conexion);
            mysqli_free_result($resultado);
            ?>

        </table>
    </section>

</body>

</html>