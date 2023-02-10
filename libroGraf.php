<?php
include 'conexion.php';
$consulta2 = "SELECT * FROM libro;";
$sql2 = $mbd->prepare($consulta2);
$sql2->execute();
$resultado2 = $sql2->fetchALL(PDO::FETCH_ASSOC);


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
            categories: [ <?php
                foreach ($resultado2 as $l) {
                    echo $l['titulo'].",";
                }
                ?>]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Unidades (integer)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' unidades'
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
        series: [{
            name:'unidades disponibles',
            data:[<?php
                foreach ($resultado2 as $libro) {

                    $stmt = $mbd->prepare("SELECT * FROM editorial WHERE idEditorial = ?;");
                    $stmt->execute([$libro['Editorial_idEditorial']]);
                    $editorial = $stmt->fetch(PDO::FETCH_ASSOC);

                    $stmt2 = $mbd->prepare("SELECT COUNT(*) FROM unidad WHERE unidad.Libro_ISBN = ?;");
                    $stmt2->execute([$libro['ISBN']]);
                    $unidades = $stmt2->fetchColumn();
                    echo $unidades.",";
                    }
                ?>]
        }]
        
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
