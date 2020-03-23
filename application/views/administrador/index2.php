<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Menu</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../../mecca/estilos/admin/css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">

    <!--incluyendo sidebar con include-->
    <?php  include("sidebar.php") ?>
    <!---->

        <div id="content">
        <!--incluyendo menu horizontal-->
        <?php include("menu.php") ?>
        <!---->

             <!-- mostrando los doctores disponibles en el horario actual -->
             <section class="main-content">
                 <div class="ce">
                 <img class="ig" src="../../../mecca/estilos/admin/img/logo1.jpg" alt="">
                 </div>
                 <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        
                        <hr class="botm-line">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                          <img src="../../../mecca/estilos/admin/img/anonimo.jpg" alt="..." class="team-img">
                          <div class="caption">
                            <h3>Dr. Aldo Erick Flores</h3>
                            <p>Urología/Medicina General</p>
                            <ul class="list-inline">
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                          <img src="../../../mecca/estilos/admin/img/anonimo.jpg" alt="..." class="team-img">
                          <div class="caption">
                            <h3>Licda. Carmen Elena Fernández</h3>
                            <p>Fisioterapia</p>
                            <ul class="list-inline">
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                          <img src="../../../mecca/estilos/admin/img/anonimo.jpg" alt="..." class="team-img">
                          <div class="caption">
                            <h3>Dr. Mario Montoya</h3>
                            <p>Cirugía/Medicina Interna</p>
                            <ul class="list-inline">
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                          <img src="../../../mecca/estilos/admin/img/anonimo.jpg" alt="..." class="team-img">
                          <div class="caption">
                            <h3>Dra. Silvia Hernández</h3>
                            <p>Cardiología</p>
                            <ul class="list-inline">
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
             </section>         
             <br>   
        <!-- incluyendo footer a la pagina-->
        <?php include("footer.php") ?>    
        <!---->
        </div>
    </div>

    

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>




    <!--permite desplegar el menu-->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    
</body>


</html>