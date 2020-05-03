<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">
#container {
  height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

		</style>
	</head>
	<body>
<script src="..\..\..\mecca\estilos\code\highcharts.js"></script>
<script src="..\..\..\mecca\estilos\code\highcharts-3d.js"></script>
<script src="..\..\..\mecca\estilos\code\exporting.js"></script>
<script src="..\..\..\mecca\estilos\code\export-data.js"></script>
<script src="..\..\..\mecca\estilos\code\accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        En esta grafica se presenta el porcentaje de doctores que existe
        por cada especialidad que existe en la multiclinica.
    </p>
</figure>

<?php
print_r($datos);
?>

		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: "pie",
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: "Doctores por especialidad"
    },
    accessibility: {
        point: {
            valueSuffix: "%"
        }
    },
    tooltip: {
        pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: "pointer",
            depth: 35,
            dataLabels: {
                enabled: true,
                format: "{point.name}"
            }
        }
    },
    series: [{
        type: "pie",
        name: "Porcentaje",
        data: [
            ['Fisioterapia', 45.0],
            ['Urologia', 26.8],
            {
                name: 'Cardiologia',
                y: 12.8,
                sliced: true,
                selected: true
            },
            ['Cirugia', 8.5],
            ['Medicina interna', 6.2],
            ['Others', 0.7]
        ]
    }]
});
		</script>
	</body>
</html>
