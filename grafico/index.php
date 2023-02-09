<?php
$conexion = mysqli_connect("localhost","root","1234","liceo");
$consulta = "SELECT * FROM evaluaciones";
$resultado = mysqli_query($conexion, $consulta);



?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Resultado de Exámenes por alumno'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:i}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },

        //a partir de aquí van nuestros datos
        series: [{
            //mi gráfica
            type: 'pie',
            name: 'Notas de Alumnos',
            data: [
                <?php
                while($fila = mysqli_fetch_array($resultado)){
                    echo"['".$fila["nombre"]."', ".$fila["examen_final"]."],";
                }
                ?>
            ]
        }]
    });
});
		</script>
	</head>
	<body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
	</body>
</html>
