<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../mecca/estilos/login/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../../mecca/estilos/login/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../../../mecca/estilos/login/css/style.css" rel="stylesheet">
    <link href="../../../mecca/estilos/login/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="<?php echo base_url();?>autentificacion/login" method="post">

		        <h2 class="form-login-heading">Inicio de sesión</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Usuario" name="username" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Contraseña" name="password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal">¿Olvidaste tu contraseña?</a>
		
		                </span>
                    </label>
                    <input type="submit" class="btn btn-theme btn-block" name="ingreso" value="INGRESAR" />
		            <hr>
		            
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">¿Olvidaste tu contraseña?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Comunicate con tu proveedor de servicio MECCA: Multiclinica de Especialidades y Centro de Cirugia Ambulatoria para restablecer tu contraseña ó envía un correo ha mecca@gmail.com para solucionar el problema.</p>
		
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
      </div>

       <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../../mecca/estilos/login/js/jquery.js"></script>
    <script src="../../../mecca/estilos/login/js/bootstrap.min.js"></script>
      
       <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../../../mecca/estilos/login/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../../../mecca/estilos/login/img/salud2.jpg", {speed: 500});
    </script>


</body>
</html>