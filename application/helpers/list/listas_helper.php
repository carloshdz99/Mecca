<?php
function verDocs($doctores){
  //variable que concatena los valores tomados
  $mos='<table class="table table-striped" id="lista">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Especialidad</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>';
  //recorriendo los datos de los doctores
    foreach($doctores as $d){
      if($d->ESTADO == 0){
        $est = 'Inactivo';
      }else{
        $est = 'Activo';
      }
      $mos .= '<tr>
      <td>'.$d->ID_DOCTOR.'</td>
      <td>'.$d->NOMBRE_DOCTOR.'</td>
      <td>'.$d->APELLIDO_DOCTOR.'</td>
      <td>'.$d->ESPECIALIDAD.'</td>
      <td>'.$est.'</td>
      <td><a href="'.base_url().'Doctores/editarDocs/'.$d->ID_DOCTOR.'" class="btn btn-dark"><i class="fas fa-edit"></i></a></td>
    </tr>';
    }
    $mos.='</tbody>
    </table>';   
    //imprimiendo los doctores seleccionados
    return $mos;
}
function doctoresActivos($doctores){
    $mos= '<div class="row mb-3">';
    foreach($doctores as $d){
      if($d->ESTADO==0){
        $mos.= '';
      }else{
      $mos.= '<div class="col-lg-4 py-1"><div class="card bg-light">
        <div class="card-header">ID: '.$d->ID_DOCTOR.'</div>
        <div class="card-body">
          <h5 class="card-title">Nombre: '.$d->NOMBRE_DOCTOR.'</h5>
          <h5 class="card-title">Apellido: '.$d->APELLIDO_DOCTOR.'</h5>
          <hr>
          <p class="card-text">Especialidad: '.$d->ESPECIALIDAD.'</p>
        </div>
      </div></div>';
      }
    }
    $mos.= '</div><br>';
    return $mos;
}

function verPaci($pacs){
   $pacientes='<table class="table table-striped" id="lista">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Nombre</th>
       <th scope="col">Apellido</th>
       <th scope="col">Telefono</th>
       <th scope="col">Estado</th>
       <th scope="col">Fecha de nacimiento</th>
       <th scope="col">Acciones</th>
     </tr>
   </thead>
   <tbody>';
   //recorriendo los datos de los doctores
   $i=0;
   foreach($pacs as $p){
     $i++;
     $pacientes.= '<tr>
     <td>'.$p->IDEXPEDIENTE.'</td>
     <td>'.$p->NOMBRE_PACIENTE.'</td>
     <td>'.$p->APELLIDO_PACIENTE.'</td>
     <td>'.$p->TELEFONO.'</td>
     <td>'.$p->SEXO.'</td>
     <td>'.$p->FECHA_NACIEMIENTO.'</td>
     <td><a href="'.base_url().'Pacientes/tomarP/'.$p->IDEXPEDIENTE.'" class="btn btn-dark"><i class="fas fa-edit"></i></a> / <a class="btn btn-dark-outline" data-toggle="modal" data-target="#eliminar'.$i.'"><i class="fas fa-trash-alt"></i></a></td>
   </tr>
   <div class="modal fade" id="eliminar'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Eliminando Registro</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           Esta seguro?
         </div>
         <div class="modal-footer">
           <a href="'.base_url().'Pacientes/eliminarPacs/'.$p->IDEXPEDIENTE.'" class="btn btn-primary">Aceptar</a>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         </div>
       </div>
     </div>
   </div>';
   }
   $pacientes.='</tbody>
   </table>';
    return $pacientes;
}
//funcion que devuelve las citas
function verCit($citas){
   $ci = '<table class="table table-striped" id="lista">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Id Horario</th>
       <th scope="col">Id Expediente</th>
       <th scope="col">Doctor</th>
       <th scope="col">Comentario</th>
       <th scope="col">Acciones</th>
     </tr>
   </thead>
   <tbody>';
   foreach($citas as $cis){
     $ci.= '<tr>
     <td>'.$cis->ID_CITA.'</td>
     <td>'.$cis->ID_HORARIO.'</td>
     <td>'.$cis->IDEXPEDIENTE.'</td>
     <td>'.$cis->DOCTOR.'</td>
     <td>'.$cis->COMENTARIO.'</td>
     <td><a href="#" class="btn btn-dark"><i class="fas fa-edit"></i></a> / <a href="#" class="btn btn-dark"><i class="fas fa-trash-alt"></i></a></td>
     </tr>';
   }
   $ci.='</tbody>
   </table>';
   return $ci;
}


?>