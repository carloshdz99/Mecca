<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MECCA WEB</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="..\..\..\mecca\estilos\front\css\font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="..\..\..\mecca\estilos\front\css\bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="..\..\..\mecca\estilos\front\css\style.css">
  <link rel="stylesheet" type="text/css" href="..\..\..\mecca\estilos\front\estilo\bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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
	<body style="text-align:center">
<script src="..\..\..\mecca\estilos\code\highcharts.js"></script>
<script src="..\..\..\mecca\estilos\code\highcharts-3d.js"></script>
<script src="..\..\..\mecca\estilos\code\exporting.js"></script>
<script src="..\..\..\mecca\estilos\code\export-data.js"></script>
<script src="..\..\..\mecca\estilos\code\accessibility.js"></script>


<nav class="navbar navbar-dark bg-dark navbar-expand-sm sticky-top">
       
        <!------------------------ANCLA LOGO------------------------------->


        <a class="navbar-brand" href="<?php echo base_url('Inicio');?>">
            <img src="..\..\..\mecca\estilos\front\img\logoc.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
             MECCA WEB
        </a>
 
        <!-------------------------DIV DE ENLANCES-------------------------->
        
     <div class="collapse navbar-collapse" id="navbarTogglerDemo01">



        <div class="navbar-nav mr-auto text-center ml-auto">
          <h1 style="color: white">Gráficos</h1>
        </div>


                     <!--          REDES SOCIALES               -->


        <div class="d-flex  flex-row justify-content-center">
            <a class="btn btn-outline-primary mr-2" href="https://www.facebook.com/multiclinicadeespecialidades/">F</a>
            <a class="btn btn-outline-danger " href="#" target="_blanck">G</a>
        </div>


     </div>


         <!----------------TOOGLE BOTON DE MENU DESPLEGABLE----------------->

     <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
     </button>


    </nav>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description" style="font-size: x-large">
        En esta grafica se presenta el porcentaje de doctores que existe
        por cada especialidad existente en la multiclinica.
    </p>
</figure>


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
            ['Fisioterapia', <?php echo round($datos[0]); ?> ],
            ['Urologia', <?php echo round($datos[1]); ?> ],
            {
                name: 'Cardiologia',
                y: <?php echo round($datos[2]); ?> ,
                sliced: true,
                selected: true
            },
            ['Cirugia', <?php echo round($datos[3]); ?> ],
            ['Medicina interna', <?php echo round($datos[4]); ?> ]
        ]
    }]
});
    </script>
    


    <br>
    <br>
   <hr>
    <h1 class="highcharts-description">Doctores activos</h1>
    
    <br>
    <br>

  <?php
        $mos='<table class="table table-striped " id="lista"   >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Especialidad</th>
          </tr>
        </thead>
        <tbody>';
        //recorriendo los datos de los doctores
          foreach($doctores as $d){
            
            $mos .= '<tr>
            <td>'.$d->ID_DOCTOR.'</td>
            <td>'.$d->NOMBRE_DOCTOR.'</td>
            <td>'.$d->APELLIDO_DOCTOR.'</td>
            <td>'.$d->ESPECIALIDAD.'</td>
          </tr>';
          }
          $mos.='</tbody>
          </table>';
         
          echo $mos;
     
  ?>


    
    
	</body>
</html>
