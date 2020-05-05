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

<<<<<<< HEAD
  <!--/ about-->
  <!--doctor team-->
  <section id="doctor-team" class="section-padding">
     <!-- en esta parte se imprimiran los doctores-->
     <div class="container" id="mostrardocs">
          
     </div>
  </section>
  <!--/ doctor team-->
  <!--testimonial-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Opiniones de nuestros pacientes</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Buena atención, eficiente, rápida y con calidad humana.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="..\..\..\mecca\estilos\front\img\thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Samuel<span>Tobías</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Atención personalizada, buen aseo de las instalaciones, excelente servicio.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="..\..\..\mecca\estilos\front\img\thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Carlos<span>Funes</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>10/10 excelente servicio.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="..\..\..\mecca\estilos\front\img\thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Christian<span>Flores</span></h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ testimonial-->
  <!--cta 2-->
  <!--<section id="cta-2" class="section-padding">
    <div class="container">
      <div class=" row">
        <div class="col-md-2"></div>
        <div class="text-right-md col-md-4 col-sm-4">
          <h2 class="section-title white lg-line">« A few words<br> about us »</h2>
        </div>
        <div class="col-md-4 col-sm-5">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typek
          <p class="text-right text-primary"><i>— Medilap Healthcare</i></p>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>-->
  <!--cta-->
  <!--contact-->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Contáctanos</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <h3>Información de Contacto</h3>
          <div class="space"></div>
          <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Km 33 1/2 Carretera Troncal del Norte, Edificio Plaza Xenthia<br> Aguilares, San Salvador.</p>
          <div class="space"></div>
          <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>multiclinicadeespecialidades@gmail.com</p>
          <div class="space"></div>
          <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>2541 0495</p>
        </div>
        <div class="col-md-8 col-sm-8 marb20">
          <div class="contact-info">
            <?php
           // print_r($msg);
            ?>
            <h3 class="cnt-ttl">Agendar cita</h3>
            <div class="space"></div>
            <div id="sendmessage">Su mensaje ha sido enviado. ¡Gracias!</div>
            <div id="errormessage"></div>
=======
  <script src="..\..\..\mecca\estilos\front\js\jquery.min.js"></script>
  <script src="<?php echo base_url('estilos\front\js\jquery.easing.min.js') ?>"></script>
  <script src="..\..\..\mecca\estilos\front\js\bootstrap.min.js"></script>
  <script src="..\..\..\mecca\estilos\front\js\custom.js"></script>
  <script src="<?php echo base_url('estilos\front\contactform\contactform.js') ?>"></script>
>>>>>>> origin/samuel


</body>

<<<<<<< HEAD
            <form id="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Ingrese al menos 4 caracteres" required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Correo electrónico" data-rule="email" data-msg="Ingrese un correo electrónico válido" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="asunto" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Ingrese un asunto de al menos 8 caracteres" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="telefono" id="subject" placeholder="Telefono" data-rule="minlen:4" data-msg="" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="fecha" id="subject" placeholder="Fecha de nacimiento" data-rule="minlen:4" data-msg="" required=""/>
                <div class="validation"></div>
              </div>
              </div>
               <div class="form-group">
                <textarea class="form-control br-radius-zero" name="comentario" rows="5" data-rule="required" data-msg="Porfavor escribe algo para nosotros" placeholder="Comentario" required=""></textarea>
                <div class="validation"></div>
              </div> 
=======
</html>
>>>>>>> origin/samuel

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

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ contact-->
  <!--footer-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Acerca de Nosotros</h4>
            </div>
            <div class="info-sec">
              <p>Cuidamos de su salud 24 horas, 7 días, con doctores especialistas altamente capacitados.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Enlaces</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.html"><i class="fa fa-circle"></i>Inicio</a></li>
                <li><a href="#service"><i class="fa fa-circle"></i>Servicio</a></li>
                <li><a href="#contact"><i class="fa fa-circle"></i>Consulta</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Síguenos</h4>
            </div>
            <div class="info-sec">
              <ul class="social-icon">
                <li class="bglight-blue"><a class="fa fa-facebook" href="https://www.facebook.com/multiclinicadeespecialidades/"></a></li>
                <li class="bgred"><i class="fa fa-google-plus"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-line">
    <a href="<?php echo base_url()?>front">prueba</a>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright MECCA. Derechos Reservados
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
              -->
              Diseñado por LIS-2020</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->

  <script src="<?php echo base_url('estilos\front\js\jquery.min.js')?>"></script>
  <script src="<?php echo base_url('estilos\front\js\jquery.easing.min.js') ?>"></script>
  <script src="<?php echo base_url('estilos\front\js\bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('estilos\front\js\custom.js')?>"></script>
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
        console.log(doctores);
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

</script>
