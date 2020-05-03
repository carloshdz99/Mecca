<?php
  //este formulario va a imprimir la informacion a actualizar
  function docsA($en,$especialidad){
    //retornando el formulario de los doctores
    $docs= '<form action="'.base_url('Doctores/ActualizarDocs').'" method="post" id="form">
    <div class="form-group">
       <input type="text" readonly class="form-control col-sm-2" name="id" value="'.$en["ID_DOCTOR"].'">
    </div>
    <div class="form-group">
     <label for="nom">Nombres: </label>
     <input type="text" class="form-control" id="nom" value="'.$en["NOMBRE_DOCTOR"].'" name="nom" placeholder="Ingrese nombres">
      <!-- mensaje de validacion -->
      <div class="invalid-feedback">
        Ingrese los dos nombres 
      </div>
    </div>
  
    <div class="form-group">
     <label for="ape">Apellidos: </label>
     <input type="text" class="form-control" id="ape" value="'.$en["APELLIDO_DOCTOR"].'" name="ape" placeholder="Ingrese apellidos">
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
    <select class="form-control col-sm-6" id="espe" name="espe">';
    foreach($especialidad as $esp){
      $docs .='<option>'.$esp->NOMBRE_ESPECIALIDAD.'</option>';
    }
   $docs.=' </select>
  </div>
  </div>
  <br>
    <input type="submit" class="btn btn-primary" id="boton" name="enviar" Value="Actualizar">
    <a href="'.base_url().'Doctores/mostrarD" class="btn btn-primary" id="cancelar" name="cancelar" Value="Cancelar">Cancelar</a>
    </form>
    <br>
    <p class="text-danger">* Todos los campos son requeridos</p>'
    ;
    return $docs;
}

function usuariosa($user){
  $u='<form action="'.base_url('Usuarios/actualizar').'" method="post" id="form">
  <div class="form-group">
  <input type="text" readonly class="form-control col-sm-2" name="id" value="'.$user["ID_USUARIO"].'">
</div>
  <div class="row">
    <div class="form-group col">
        <label for="nom">Nombres: </label>
        <input type="text" class="form-control col-sm-8" value="'.$user['NOMBRE_USUARIO'].'" name="nom" id="nom" placeholder="Ingrese nombres">
      </div>
    <div class="form-group col">
        <label for="ape">Apellidos: </label>
        <input type="text" class="form-control col-sm-8" value="'.$user['APELLIDO_USUARIO'].'" name="ape" id="ape" placeholder="Ingrese apellidos">
    </div>  
  </div>

    <div class="form-group">
      <label for="email">Correo electronico</label>
      <input type="email" class="form-control col-sm-4" value="'.$user['CORREO'].'" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese el correo">
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
    <a href="'.base_url('Usuarios/verusers').'" class="btn btn-primary" id="boton" name="cancelar">Cancelar</a>                  
  </form>
  <p class="text-danger">* Todos los campos son requeridos</p>';

  return $u;
}

  function paciA($pa){
    return '<form action="'.base_url('Pacientes/actualizar').'" method="post" id="form">
      <div class="form-group">
         <input type="text" class="form-control col-sm-2" name="id" value="'.$pa['IDEXPEDIENTE'].'" readonly>
      </div>
      <div class="row">
      <div class="form-group col">
          <label for="nom">Nombres:</label>
          <input type="text" name="nom" id="nom" value="'.$pa['NOMBRE_PACIENTE'].'" class="form-control col-sm-8" placeholder="Ingrese Nombres">
      </div>
      <div class="form-group col">
          <label for="nom">Apellidos:</label>
          <input type="text" name="ape" id="ape" value="'.$pa['APELLIDO_PACIENTE'].'" class="form-control col-sm-8" placeholder="Ingrese Apellidos">
      </div>
      </div>
          <div class="form-group">
              <label for="fech">Fecha de naciemiento:</label>
              <input type="datetime" name="fecha" class="form-control col-sm-2" value="'.$pa['FECHA_NACIEMIENTO'].'" id="fech" placeholder="yyyy/mm/dd">
          </div>
          <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo" class="form-control col-sm-2">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
          </div>
          <div class="form-group">
              <label for="fech">Numero de telefono:</label>
              <input type="text" class="form-control col-sm-2" value="'.$pa['TELEFONO'].'" name="telefono" id="fech" placeholder="####-####">
          </div>
      <br>
      <input type="submit" class="btn btn-primary" id="boton" name="enviar" Value="Guardar Cambios">
      <a href="'.base_url().'Pacientes/verPacie" class="btn btn-primary" id="boton" name="cancelar">Cancelar</a>   
     </form>';
  }



 

  function citasa($doctores, $paciente, $fecha ,$comentario,$ID){
      $form='<form action="'.base_url('Citas/Actualizar').'" method="post">
      <input type="text" value="'.$ID.'" name="id" style="display:none;">
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
                <input type="datetime" name="fecha" class="form-control col-sm-4" value="'.$fecha.'" id="fech" placeholder="Año - Mes - Dia">
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
        <select class="form-control col-sm-8" name="paciente" id="pac">
        <option>'.$paciente.'</option>';
       $form.=' </select>
      </div>
      </div>
      <br>
      <div class="form-group">
        <label for="des">Ingrese una descripción: </label>
        <textarea class="form-control col-sm-8" id="des" name="des" readonly>'.$comentario.'</textarea>
      </div>
      <br>
      <button type="submit" class="btn btn-primary mb-4">Guardar datos</button>
      <button type="submit" class="btn btn-primary mb-4">Cancelar</button>
      </form>
      <p class="text-danger">* Todos los campos son requeridos</p>';
     //formulario de citas
      return $form;
  }

?>