<?php
  //funcion que imprime el formulario de los doctores
  function docs(){
      //retornando el formulario de los doctores
      return '<form action="'.base_url('Doctores/Registrar').'" method="post" id="form">
      <div class="form-group">
       <label for="nom">Nombres: </label>
       <input type="text" class="form-control" id="nom" name="nom" placeholder="Ingrese nombres">
        <!-- mensaje de validacion -->
        <div class="invalid-feedback">
          Ingrese los dos nombres 
        </div>
      </div>
    
      <div class="form-group">
       <label for="ape">Apellidos: </label>
       <input type="text" class="form-control" id="ape" name="ape" placeholder="Ingrese apellidos">
        <!-- mensaje de validacion -->
        <div class="invalid-feedback">
          Ingrese los dos apellidos
        </div>
      </div>
      <div class="row">
      <div class="form-group col">
      <label for="est">Estado</label>
      <select name="est" id="est" class="form-control col-sm-4">
        <option>Activo</option>
        <option>Inactivo</option>
      </select>
    </div>
  
    <div class="form-group col">
      <label for="espe">Especialidad</label>
      <select class="form-control col-sm-6" id="espe" name="espe">
        <option>Cirugia</option>
        <option>Medicina General</option>
      </select>
    </div>
    </div>
    <br>
    
      <input type="submit" class="btn btn-primary" id="boton" name="enviar" Value="Guardar Cambios">
      <input type="button" class="btn btn-primary" id="cancelar" name="cancelar" Value="Cancelar">
      </form>
      <br>
      <p class="text-danger">* Todos los campos son requeridos</p>'
      ;
  }

  //funcion que devuelve el formulario de personas
  function personas(){
      return '<!-- formulario para ingreso de personal -->
      <form action="'.base_url('Usuarios/Registrar').'" method="post" id="form">
        <div class="form-group">
            <label for="nom">Nombres: </label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Ingrese nombres">
            <!-- mensaje de validacion -->
            <div class="invalid-feedback">
                Ingrese minimo un nombre
            </div>
          </div>
        <div class="form-group">
            <label for="ape">Apellidos: </label>
            <input type="text" class="form-control" name="ape" id="ape" placeholder="Ingrese apellidos">
            <!-- mensaje de validacion -->
            <div class="invalid-feedback">
                Ingrese minimo un apellido
            </div>
        </div>  
        <div class="form-group">
          <label for="email">Correo electronico</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese el correo">
          <small id="emailHelp" class="form-text text-muted">No compartiremos tu correo con nadie mas.</small>
          <!-- mensaje de validacion -->
          <div class="invalid-feedback">
            Ingrese un corredo valido
        </div>
        <div class="form-group">
            <label>Tipo de usuario</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="admin">Admin</option>
                <option value="doctor">Doctor</option>
            </select>
        </div>
        </div>
        <div class="form-group">
          <label for="contra">Contraseña</label>
          <input type="password" class="form-control" name="password" id="contra" placeholder="Ingrese contraseña">
          <!-- mensaje de validacion -->
          <div class="invalid-feedback">
             Debe contener minimo 8 digitos y maximo 10
        </div>
        </div> 
        <input type="submit" class="btn btn-primary" id="boton" name="enviar" Value="Guardar Cambios">
        <input type="button" class="btn btn-primary" id="boton" name="cancelar" Value="Cancelar">                  
      </form>';
  }

  // retorna el formulario de los pacientes
  function pacientes(){
      return '<form action="'.base_url('Pacientes/Registrar').'" method="post" id="form">
      <div class="form-group">
          <label for="nom">Nombres:</label>
          <input type="text" name="nom" id="nom" class="form-control" placeholder="Ingrese Nombres">
      </div>
      <div class="form-group">
          <label for="nom">Apellidos:</label>
          <input type="text" name="ape" id="ape" class="form-control" placeholder="Ingrese Apellidos">
      </div>
      <div class="row">
          <div class="col">
              <label for="fech">Fecha de naciemiento:</label>
              <input type="datetime" name="fecha" class="form-control" id="fech" placeholder="yyyy/mm/dd">
          </div>
          <div class="col">
            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo" class="form-control">
                <option value="man">Hombre</option>
                <option value="woman">Mujer</option>
            </select>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <label for="fech">Numero de telefono:</label>
              <input type="text" class="form-control" name="telefono" id="fech" placeholder="####-####">
          </div>
      </div>
      <br>
      <input type="submit" class="btn btn-primary" id="boton" name="enviar" Value="Guardar Cambios">
      <input type="button" class="btn btn-primary" id="boton" name="cancelar" Value="Cancelar">   
     </form>';
   }

   function citas(){
   //formulario de citas
    return '<form>
      <div class="form-group">
          <label for="horario">Horario</label>
          <select class="form-control" id="horario" name="horario">
            <option>07:00 - 08:00 am</option>
            <option>08:00 - 09:00 am</option>
          </select>
      </div>
      <div class="form-group">
        <label for="docto">Doctor</label>
        <select class="form-control" id="docto" name="docto">
          <option>Carlos Josue Hernandez Funes</option>
          <option>Josue Samuel Rodriguez Tobias</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pac">Paciente: </label>
        <input type="text" class="form-control" id="pac" name="pac" placeholder="Ingrese paciente">
          <!-- mensaje de validacion -->
          <div class="invalid-feedback">
            Ingrese los dos nombres 
          </div>
      </div>
      <div class="form-group">
        <label for="des">Ingrese una descripción: </label>
        <textarea class="form-control" id="des" name="des"></textarea>
      </div>
      <br>
      <button type="submit" class="btn btn-primary mb-4">Guardar datos</button>
      <button type="submit" class="btn btn-primary mb-4">Cancelar</button>
      </form>';

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
?>