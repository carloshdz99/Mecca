<?php
  //funcion que imprime el formulario de los doctores
  function docs($especialidad){
      //retornando el formulario de los doctores
      $docs= '<form method="post" action="'.base_url().'/Doctores/Registrar" id="form">
      <div class="row">
      <div class="col form-group">
       <label for="nom">Nombres: </label>
       <input type="text" class="form-control col-sm-8" id="nom" name="nom" placeholder="Ingrese nombres">
      </div>
      <div class="col form-group">
       <label for="ape">Apellidos: </label>
       <input type="text" class="form-control col-sm-8" id="ape" name="ape" placeholder="Ingrese apellidos">
      </div>
      </div>

      <div class="form-group">
      <label for="est">Estado</label>
      <select name="est" id="est" class="form-control col-sm-4">
         <option>Activo</option>
         <option>Inactivo</option>
     </select>
    </div>
  
    <div class="form-group">
      <label for="espe">Especialidad</label>
      <select class="form-control col-sm-4" id="espe" name="espe">';
      foreach($especialidad as $esp){
        $docs .='<option>'.$esp->NOMBRE_ESPECIALIDAD.'</option>';
      }
     $docs.=' </select>
    </div>
    <br>
    
      <input type="submit" class="btn btn-primary" id="boton" name="enviar" Value="Guardar Cambios">
      <input type="button" class="btn btn-primary" id="cancelar" name="cancelar" Value="Cancelar">
      </form>
      <br>
      <p class="text-danger">* Todos los campos son requeridos</p>'
      ;
      return $docs;
  }

  //funcion que devuelve el formulario de personas
  function personas(){
      return '
      <form action="'.base_url('Usuarios/Registrar').'" method="post" id="form">
      <div class="row">
        <div class="form-group col">
            <label for="nom">Nombres: </label>
            <input type="text" class="form-control col-sm-8" name="nom" id="nom" placeholder="Ingrese nombres">
          </div>
        <div class="form-group col">
            <label for="ape">Apellidos: </label>
            <input type="text" class="form-control col-sm-8" name="ape" id="ape" placeholder="Ingrese apellidos">
        </div>  
      </div>
 
        <div class="form-group">
          <label for="email">Correo electronico</label>
          <input type="email" class="form-control col-sm-4" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese el correo">
          <small id="emailHelp" class="form-text text-muted">No compartiremos tu correo con nadie mas.</small>
        </div>
        <div class="form-group">
            <label>Tipo de usuario</label>
            <select name="tipo" id="tipo" class="form-control col-sm-2">
                <option value="admin">Administrador</option>
                <option value="archivo">Archivador</option>
            </select>
        </div>
  
        <div class="form-group">
          <label for="contra">Contraseña</label>
          <input type="password" class="form-control col-sm-4" name="password" id="contra" placeholder="Ingrese contraseña">
        </div> 
        <input type="submit" class="btn btn-primary" id="submit" name="enviar" Value="Guardar Cambios">
        <input type="button" class="btn btn-primary" id="boton" name="cancelar" Value="Cancelar">                  
      </form>
      <p class="text-danger">* Todos los campos son requeridos</p>';
  }

  // retorna el formulario de los pacientes
  function pacientes(){
      return '<form action="'.base_url('Pacientes/Registrar').'" method="post" id="form">
      <div class="row">
      <div class="form-group col">
          <label for="nom">Nombres:</label>
          <input type="text" name="nom" id="nom" class="form-control col-sm-8" placeholder="Ingrese Nombres">
          <small id="nom" class="form-text text-muted">ej: Josue Samuel</small>
      </div>
      <div class="form-group col">
          <label for="nom">Apellidos:</label>
          <input type="text" name="ape" id="ape" class="form-control col-sm-8" placeholder="Ingrese Apellidos">
          <small id="ape" class="form-text text-muted">ej: Rogriguez Tobias</small>
      </div>
      </div>
          <div class="form-group">
              <label for="fech">Fecha de nacimiento:</label>
              <input type="datetime" name="fecha" class="form-control col-sm-2" id="fech" placeholder="Año - Mes - Dia">
              <small id="fech" class="form-text text-muted">ej: 1999-10-05</small>
          </div>
          <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo" class="form-control col-sm-2">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
          </div>
      <div class="row">
          <div class="col">
              <label for="fech">Numero de telefono:</label>
              <input type="text" class="form-control col-sm-2" name="telefono" id="fech" placeholder="####-####">
          </div>
      </div>
      <br>
      <input type="submit" class="btn btn-primary" id="boton" name="enviar" Value="Guardar Cambios">
      <input type="button" class="btn btn-primary" id="boton" name="cancelar" Value="Cancelar">   
     </form>
     <p class="text-danger">* Todos los campos son requeridos</p>';
   }

   function citas($doctores,$paciente){
    $form='<form action="'.base_url('Citas/Registrar').'" method="post">

    <div class="row">
    <div class="col form-group">
        <label for="horario">Hora</label>
        <select class="form-control col-sm-4" id="horario" name="horario">
            <option value="7:30">7:30 am</option>
            <option value="8:30">8:30 am</option>
            <option value="9:30">9:30 am</option>
        </select>
    </div>

    <div class="col form-group">
              <label for="fech">Fecha de cita:</label>
              <input type="datetime" name="fecha" class="form-control col-sm-4" id="fech" placeholder="Año - Mes - Dia">
              <small id="fech" class="form-text text-muted">ej: 1999-10-05</small>
    </div>
    </div>

    <div class="row">
    <div class="col form-group">
      <label for="docto">Doctor</label>
      <select class="form-control col-sm-8" id="docto" name="doctor">';
    foreach($doctores as $docs){
      if($docs->ESTADO==1){
        $form.= '<option>'.$docs->NOMBRE_DOCTOR.'</option>';
      }else{$form.='';}
    }
    $form.= ' </select>
    </div>
    <div class="col form-group">
      <label for="pac">Paciente: </label>
      <select class="form-control col-sm-8" name="paciente" id="pac">';
    foreach($paciente as $pac){
      $form.= '<option>'.$pac->NOMBRE_PACIENTE.'</option>';
    }
     $form.=' </select>
    </div>
    </div>
    <div class="form-group">
      <label for="des">Ingrese una descripción: </label>
      <textarea class="form-control col-sm-8" id="des" name="des"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary mb-4">Guardar datos</button>
    <button type="submit" class="btn btn-primary mb-4">Cancelar</button>
    </form>
    <p class="text-danger">* Todos los campos son requeridos</p>';
   //formulario de citas
    return $form;
   }

  //formulario de personalizacion del sitio web
   function personalizar(){

    return '<form>
    <div class="col-lg-12">
      <div class="showback">
        <h4>Personalización de colores</h4><hr/>
        <label>Color de fondo de la sidebar:</label>
        <input type="color" class="form-control" style="width: 200px;" name="bg_header" value="" />
        <br/><br/>

        <label>Color de texto de la sidebar:</label>
        <input type="color" class="form-control" style="width: 200px;" name="text_header" value="" />
        <br/><br/>                 

        <label>Color de fondo de la navbar</label>
        <input type="color" class="form-control" style="width: 200px;" name="bg_body" value="" />
        <br/><br/>

        <label>Color de fondo del pie de página:</label>
        <input type="color" class="form-control" style="width: 200px;" name="bg_footer" value="" />
        <br/><br/>

        <label>Color de texto del pie de página:</label>
        <input type="color" class="form-control" style="width: 200px;" name="text_footer" value="" />
        <br/> <br/>
      </div>
  </div>
      <br>
      <button type="submit" class="btn btn-primary mb-4">Editar colores</button>
      <button type="submit" class="btn btn-primary mb-4">Restablecer por defecto</button>
      </form>';

   }

   function consulta(){
     
   }


   function inicioEspañol(){

    return '
    <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="'.base_url('estilos/front/img/logoc.png').'" class="img-responsive" style="margin-top: -28px; width: 80px; height: 80px "></a>
              
              <!-- Example single danger button -->
                <div class="btn-group">
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Idioma
                  </button>
                  
                  <ul class="dropdown-menu" id="">
                    <li>
                        <a href="'.base_url().'Inicio/espa">Español</a>
                    </li>
                    <li>
                        <a href="'.base_url().'Inicio/ingles">Ingles</a>
                    </li>                       
                </ul>
                    
                </div>


            </div>
            
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class=""><a href="#">'.$_SESSION['visitas'].'</a></li>
                <li class="active"><a href="#banner">Inicio</a></li>
                <li class=""><a href="#service">Servicios</a></li>
                <!--<li class=""><a href="#about">Nosotros</a></li>-->
                <li class=""><a href="#testimonial">Testimonios</a></li>
                <li class=""><a href="#contact">Contáctanos</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="'.base_url('estilos/front/img/muticlinicaslogo.png').'" class="img-responsive" style="width: 450px;">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">¡El cuidado de tu salud a tu alcance!</h1>
              <p>La mejor institución de salud de la región norte, reconocidos por nuestros servicios de alta calidad.</p>
              <a href="#contact" class="btn btn-appoint">Haga su cita aquí</a>
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Nuestros Servicios</h2>
          <hr class="botm-line">
          <p>Otorgamos a nuestros pacientes la más alta calidad de atención, no sólo desde el punto de vista asistencial, sino también a través de un original concepto de clínica ambulatoria. Ofrecemos tratamientos avanzados.</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <div class="icon-info">
              <h4>Atención 24 horas</h4>
              <p>Ofrecemos atención de emergencias las 24 horas con calidad y rapidez.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-ambulance"></i>
            </div>
            <div class="icon-info">
              <h4>Servicio de Ambulancia</h4>
              <p>Contamos con ambulancias y personal capacitado para atenderle inmediatamente.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <div class="icon-info">
              <h4>Asesoría Médica</h4>
              <p>Atención médica personalizada para la detección temprana de enfermedades y su pronto tratamiento.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="icon-info">
              <h4>Cuidado de su salud</h4>
              <p>Excelencia médica, contamos con un servicio médico especializado de alto nivel.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ service-->
  <!--cta-->
  <section id="cta-1" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="schedule-tab">
          <div class="col-md-4 col-sm-4 bor-left">
            <div class="mt-boxy-color"></div>
            <div class="medi-info">
              <h3>Medicina General</h3>
              <p>Consultas generales, Laboratorio clínico, examenes de sangre, farmacia, etc.</p>
              <a href="#" class="medi-info-btn">Más información</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="medi-info">
              <h3>Especialidades</h3>
              <p>Fisioterapia, Urología, Cardiología, Cirugía, Medicina interna, etc.</p>
              <a href="'.base_url('Inicio/grafh').'" class="medi-info-btn" target="_blank">Más información</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 mt-boxy-3">
            <div class="mt-boxy-color"></div>
            <div class="time-info">
              <h3>Horario de Atención</h3>
              <table style="margin: 8px 0px 0px;" border="1">
                <tbody>
                  <tr>
                    <td>Lunes - Viernes</td>
                    <td>8:00am - 7:00pm</td>
                  </tr>
                  <tr>
                    <td>Sábados</td>
                    <td>9:00am - 5:30pm</td>
                  </tr>
                  <tr>
                    <td>Domingos</td>
                    <td>9:00am - 3:00pm</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--about-->

  <!--/ about-->
  <section id="doctor-team" class="section-padding">
     <!-- en esta parte se imprimiran los doctores-->
     <div class="container" id="mostrardocs">
          
     </div>
  </section>
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
            <a href="#"><img src="'.base_url('estilos/front/img/thumb.png').'" alt="" class="img-responsive"></a>
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
            <a href="#"><img src="'.base_url('estilos/front/img/thumb.png').'" alt="" class="img-responsive"></a>
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
            <a href="#"><img src="'.base_url('estilos/front/img/thumb.png').'" alt="" class="img-responsive"></a>
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
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typek
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



            <!--form action="'.base_url('Inicio/cita').'" method="post" role="form" class="contactForm">
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

              <div class="form-action">
                <button type="submit" class="btn btn-form">Enviar</button>
              </div>
            </form-->

            <div role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Ingrese al menos 4 caracteres" required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Correo electrónico" data-rule="email" data-msg="Ingrese un correo electrónico válido" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="asunto" id="asunto" placeholder="Asunto" data-rule="minlen:4" data-msg="Ingrese un asunto de al menos 8 caracteres" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="telefono" id="telefono" placeholder="Telefono" data-rule="minlen:4" data-msg="" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="fecha" id="fecha" placeholder="Fecha de nacimiento" data-rule="minlen:4" data-msg="" required=""/>
                <div class="validation"></div>
              </div>
               <div class="form-group">
                <textarea class="form-control br-radius-zero" name="comentario" id="comentario" rows="5" data-rule="required" data-msg="Porfavor escribe algo para nosotros" placeholder="Comentario" required=""></textarea>
                <div class="validation"></div>
              </div> 

              <input type="hidden" name="lenguage" id="lenguage" value="1" />

              <div class="form-action">
                <button class="btn btn-form" id="enviar">Enviar</button>
              </div>
              <br/>
              <div class="form-action" >
                <div id="inforesults" class="alert alert-info"></div>
              </div>
            </div>




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
    ';
   }




   function inicioIngles(){

    
    return '
    <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="'.base_url('estilos/front/img/logoc.png').'" class="img-responsive" style="margin-top: -28px; width: 80px; height: 80px "></a>
              
              <!-- Example single danger button -->
                <div class="btn-group">
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Language
                  </button>
                  
                  <ul class="dropdown-menu" id="">
                    <li>
                        <a href="'.base_url().'Inicio/espa">Spanish</a>
                    </li>
                    <li>
                        <a href="'.base_url().'Inicio/ingles">English</a>
                    </li>                       
                </ul>
                
                </div>


            </div>
            
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class=""><a href="#">'.$_SESSION['visitas'].'</a></li>
                <li class="active"><a href="#banner">Index</a></li>
                <li class=""><a href="#service">Services</a></li>
                <!--<li class=""><a href="#about">Nosotros</a></li>-->
                <li class=""><a href="#testimonial">Testimonies</a></li>
                <li class=""><a href="#contact">Contact us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="'.base_url('estilos/front/img/muticlinicaslogo.png').'" class="img-responsive" style="width: 450px;">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">¡Taking care of your health at your fingertips!</h1>
              <p>The best health institution in the northern region, recognized for our high quality services.</p>
              <a href="#contact" class="btn btn-appoint">Make your appointment here</a>
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Our services</h2>
          <hr class="botm-line">
          <p>We provide our patients with the highest quality of care, not only from the point of view of care, but also through an original concept of an outpatient clinic. We offer advanced treatments.</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <div class="icon-info">
              <h4>24 hour service</h4>
              <p>We offer 24-hour emergency care with quality and speed.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-ambulance"></i>
            </div>
            <div class="icon-info">
              <h4>Ambulance service</h4>
              <p>We have ambulances and trained personnel to attend you immediately.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <div class="icon-info">
              <h4>Medical Advice</h4>
              <p>Personalized medical attention for the early detection of diseases and their prompt treatment.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="icon-info">
              <h4>Taking care of your health</h4>
              <p>Medical excellence, we have a high-level specialized medical service.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ service-->
  <!--cta-->
  <section id="cta-1" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="schedule-tab">
          <div class="col-md-4 col-sm-4 bor-left">
            <div class="mt-boxy-color"></div>
            <div class="medi-info">
              <h3>General medicine</h3>
              <p>General consultations, Clinical laboratory, blood tests, pharmacy, etc.</p>
              <a href="#" class="medi-info-btn">More information</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="medi-info">
              <h3>Specialties</h3>
              <p>Physiotherapy, Urology, Cardiology, Surgery, Internal medicine, etc.</p>
              <a href="'.base_url('Inicio/grafh').'" class="medi-info-btn" target="_blank">More information</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 mt-boxy-3">
            <div class="mt-boxy-color"></div>
            <div class="time-info">
              <h3>Attention Hours</h3>
              <table style="margin: 8px 0px 0px;" border="1">
                <tbody>
                  <tr>
                    <td>Monday-Friday</td>
                    <td>8:00am - 7:00pm</td>
                  </tr>
                  <tr>
                    <td>Saturdays</td>
                    <td>9:00am - 5:30pm</td>
                  </tr>
                  <tr>
                    <td>Sundays</td>
                    <td>9:00am - 3:00pm</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--about-->

  <!--/ about-->
  <div class="container">
  <div id="mostrardocs">

  </div>
  </div>
  <!--testimonial-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Opinions of our patients</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Good care, efficient, fast and with human quality.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="'.base_url('estilos/front/img/thumb.png').'" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Samuel<span>Tobías</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Personalized attention, good cleaning of the facilities, excellent service.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="'.base_url('estilos/front/img/thumb.png').'" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Carlos<span>Funes</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>10/10 excellent service.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="'.base_url('estilos/front/img/thumb.png').'" alt="" class="img-responsive"></a>
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
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typek
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
          <h2 class="ser-title">Contact us</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <h3>Contact information</h3>
          <div class="space"></div>
          <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Km 33 1/2 Highway Troncal del Norte, Building Plaza Xenthia<br> Aguilares, San Salvador.</p>
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
            <h3 class="cnt-ttl">Schedule appointment</h3>
            <div class="space"></div>
            <div id="sendmessage">Su mensaje ha sido enviado. ¡Gracias!</div>
            <div id="errormessage"></div>



            <!--form action="'.base_url('Inicio/cita').'" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Name" data-rule="minlen:4" data-msg="Ingrese al menos 4 caracteres" required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Ingrese un correo electrónico válido" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="asunto" id="subject" placeholder="Affair" data-rule="minlen:4" data-msg="Ingrese un asunto de al menos 8 caracteres" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="telefono" id="subject" placeholder="Fhone" data-rule="minlen:4" data-msg="" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="fecha" id="subject" placeholder="Birthdate" data-rule="minlen:4" data-msg="" required=""/>
                <div class="validation"></div>
              </div>
              </div>
               <div class="form-group">
                <textarea class="form-control br-radius-zero" name="comentario" rows="5" data-rule="required" data-msg="Porfavor escribe algo para nosotros" placeholder="Commentary" required=""></textarea>
                <div class="validation"></div>
              </div> 

              <div class="form-action">
                <button type="submit" class="btn btn-form">Send</button>
              </div>
            </form-->

            <div role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Name" data-rule="minlen:4" data-msg="Ingrese al menos 4 caracteres" required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Ingrese un correo electrónico válido" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="asunto" id="asunto" placeholder="Affair" data-rule="minlen:4" data-msg="Ingrese un asunto de al menos 8 caracteres" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="telefono" id="telefono" placeholder="Fhone" data-rule="minlen:4" data-msg="" required=""/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="fecha" id="fecha" placeholder="Birthdate" data-rule="minlen:4" data-msg="" required=""/>
                <div class="validation"></div>
              </div>
               <div class="form-group">
                <textarea class="form-control br-radius-zero" name="comentario" id="comentario" rows="5" data-rule="required" data-msg="Porfavor escribe algo para nosotros" placeholder="Commentary" required=""></textarea>
                <div class="validation"></div>
              </div> 

              <input type="hidden" name="lenguage" id="lenguage" value="2" />

              <div class="form-action">
                <button class="btn btn-form" id="enviar">Enviar</button>
              </div>
              <br/>
              <div class="form-action">
                <div id="inforesults" class="alert alert-info"></div>
              </div>
            </div>




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
              <h4 class="white no-padding">About us</h4>
            </div>
            <div class="info-sec">
              <p>We take care of your health 24 hours, 7 days, with highly trained specialist doctors.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Enlaces</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.html"><i class="fa fa-circle"></i>Index</a></li>
                <li><a href="#service"><i class="fa fa-circle"></i>Services</a></li>
                <li><a href="#contact"><i class="fa fa-circle"></i>Query</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Follow us</h4>
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
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright MECCA. All rights reserved
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
              -->
              Designed to LIS-2020</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->
    ';
   }




?>