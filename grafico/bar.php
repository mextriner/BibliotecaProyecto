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
            type: 'bar'
        },
        title: {
            text: 'Notas de Alumnos'
        },
        subtitle: {
            text: 'CUrso 2022-2023'
        },
        xAxis: {
            <?php
                while($fila = mysqli_fetch_array($resultado)){
                    echo"categories: ['".$fila["nombre"]."'],";
                }
                ?>
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Notas (millions)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{<?php
                while($fila = mysqli_fetch_array($resultado)){
                    echo"data: ['".$fila["examen_final"]."'],";
                }
                ?>
    });
});
		</script>
	</head>
	<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
