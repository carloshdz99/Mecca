<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MECCA Web</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('estilos\front\css\font-awesome.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('estilos\front\css\bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('estilos\front\css\style.css')?>">

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  
  <?php
            // print_r($msg);
           print_r($estructura);
        
         
         ?>



<script type="text/javascript">
  $(document).ready(function(){

    $('#enviar').click(function(e){

                  e.preventDefault();
                  
                  var name = $("#name").val();
                  var email = $("#email").val();
                  var asunto = $("#asunto").val();
                  var telefono = $("#telefono").val();
                  var fecha = $("#fecha").val();
                  var comentario = $("#comentario").val();
                  var lenguage = $("#lenguage").val();

                  $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>enviaremail",
                    data: {name: name, email: email, asunto: asunto, telefono, telefono, fecha: fecha, comentario: comentario, lenguage: lenguage},
                    error: function(){
                      $('#inforesults').text("Hubo un problema al enviar el correo eléctronico");
                    },
                    success: function(data)
                    {
                      $('#inforesults').text(data);
                    }
                  });
    });
  });
  </script>
                  


  <script src="..\..\..\mecca\estilos\front\js\jquery.min.js"></script>   
  <script src="<?php echo base_url('estilos\front\js\jquery.easing.min.js') ?>"></script>  
   <script src="..\..\..\mecca\estilos\front\js\bootstrap.min.js"></script>   
   <script src="..\..\..\mecca\estilos\front\js\custom.js"></script>   
   <script src="<?php echo base_url('estilos\front\contactform\contactform.js') ?>"></script>

  <script type="text/javascript">
   //cargando los doctores al cargar por completo la pagina
document.addEventListener("DOMContentLoaded",function(e){
    e.preventDefault();
    //div donde se imprimiran los doctores
    var div = document.getElementById("mostrardocs");
    //variable con los doctores
    //tomando los doctores desde la base de datos
    fetch("<?php echo base_url() ?>doctores")
    .then(res=> res.json())
    .then(doctores=>{
        var docs=`<div class="row mb-3">`;
        for(i=0; i<doctores.length; i++){
            docs+=`<div class="col-md-3 col-sm-3 col-xs-6">
            <div class="caption">
              <h3>Dr. ${doctores[i].nombre} ${doctores[i].apellido}</h3>
              <p>Especialidad: ${doctores[i].especialidad}</p>
            </div>
          </div>`;
        }
        docs+=`</div>`;
        div.innerHTML=docs;
      });
   });
  </script>
