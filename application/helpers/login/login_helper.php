<?php

function logcontra($msg){

    return '<div id="login-page">
    <div class="container">
    
        <form class="form-login" action="'.base_url('Login/enviarcontra').'" method="post">

          <h2 class="form-login-heading">Recuperar contraseña</h2>
          <div class="login-wrap">
              '.$msg.'
              <p>Se le enviara su contraseña al correo si usted se encuentra registrado como usuario en el sistema.</p>
              <input type="text" class="form-control" placeholder="Ingrese correo" name="email" autofocus>
              <br>		            
              <input type="submit" class="btn btn-theme btn-block" name="envio" value="ENVIAR CONTRASEÑA" />
              <br>
              <label class="checkbox">
                  <span class="pull-right">
                      <a data-toggle="modal" href="'.base_url().'">Regresar</a>
                  </span>
              </label>
              <hr>		            
          </div>		
        </form>	  		  	
   </div>
</div>';
}

?>