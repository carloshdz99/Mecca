<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MECCA Web</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="..\..\..\mecca\estilos\front\css\font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="..\..\..\mecca\estilos\front\css\bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="..\..\..\mecca\estilos\front\css\style.css">

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  
  <?php
            
            print_r($estructura);
        
         
         ?>

  <script src="..\..\..\mecca\estilos\front\js\jquery.min.js"></script>
  <script src="<?php echo base_url('estilos\front\js\jquery.easing.min.js') ?>"></script>
  <script src="..\..\..\mecca\estilos\front\js\bootstrap.min.js"></script>
  <script src="..\..\..\mecca\estilos\front\js\custom.js"></script>
  <script src="<?php echo base_url('estilos\front\contactform\contactform.js') ?>"></script>


</body>

</html>

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
