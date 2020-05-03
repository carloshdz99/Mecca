<?php
  //funcion que imprime el formulario de los doctores
  function docs($especialidad){
      //retornando el formulario de los doctores
      $docs= '<form action="'.base_url('Doctores/Registrar').'" method="post" id="form">
      <div class="form-group">
       <label for="nom">Nombres: </label>
       <input type="text" class="form-control" id="nom" name="nom" placeholder="Ingrese nombres">
      </div>
      <div class="form-group">
       <label for="ape">Apellidos: </label>
       <input type="text" class="form-control" id="ape" name="ape" placeholder="Ingrese apellidos">
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
      <select class="form-control col-sm-6" id="espe" name="espe">';
      foreach($especialidad as $esp){
        $docs .='<option>'.$esp->NOMBRE_ESPECIALIDAD.'</option>';
      }
     $docs.=' </select>
    </div>
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
            <option value="7:30">8:30 am</option>
            <option value="7:30">9:30 am</option>
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
?>