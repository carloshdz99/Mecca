<?php
function verDocs($doctores,$pdoctores){
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
    foreach($pdoctores as $d){
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
    </table><nav aria-label="Page navigation example"><ul class="pagination">';
    $cantidad = count($doctores)/6;  
    $cantidad= ceil($cantidad);
    for($i=1;$i<=$cantidad;$i+1){  
      $mos.='<li class="page-item"><a class="page-link" href="'.base_url().'Doctores/mostrarD/'.$i.'">'.$i++.'</a></li>';
    }
    $mos.='</ul></nav>';
    //imprimiendo los doctores seleccionados
    return $mos;
}
function doctoresActivos($doctores,$docsa){
    $mos= '
    <div class="row mb-3">';
    foreach($doctores as $d){
      $mos.= '<div class="col-lg-4 py-1"><div class="card bg-light">
        <div class="card-header">ID: '.$d->ID_DOCTOR.'</div>
        <div class="card-body">
          <h5 class="card-title">Nombre: '.$d->NOMBRE_DOCTOR.'</h5>
          <h5 class="card-title">Apellido: '.$d->APELLIDO_DOCTOR.'</h5>
          <hr>
          <p class="card-text">Especialidad: '.$d->ESPECIALIDAD.'</p>
        </div>
      </div></div>
      ';
    }
    $mos.='</div><nav aria-label="Page navigation example"><ul class="pagination">';
    $cantidad = count($docsa)/6;
    $cantidad= ceil($cantidad);
    for($i=1; $i<=$cantidad; $i+1){
      $mos.='<li class="page-item"><a class="page-link" href="'.base_url().'/Dashboard/Dashboard/'.$i.'">'.$i++.'</a></li>';
    }
    $mos.= '</ul></nav><br>';
    return $mos;
}

function verPaci($pacs, $pacsp){
   $pacientes='<table class="table table-striped" id="lista">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Nombre</th>
       <th scope="col">Apellido</th>
       <th scope="col">Telefono</th>
       <th scope="col">Sexo</th>
       <th scope="col">Fecha de nacimiento</th>
       <th scope="col">Acciones</th>
     </tr>
   </thead>
   <tbody>';
   //recorriendo los datos de los doctores
   $i=0;
   foreach($pacsp as $p){
     $i++;
     $pacientes.= '<tr>
     <td>'.$p->IDEXPEDIENTE.'</td>
     <td>'.$p->NOMBRE_PACIENTE.'</td>
     <td>'.$p->APELLIDO_PACIENTE.'</td>
     <td>'.$p->TELEFONO.'</td>
     <td>'.$p->SEXO.'</td>
     <td>'.$p->FECHA_NACIEMIENTO.'</td>
     <td><a href="'.base_url().'Pacientes/tomarP/'.$p->IDEXPEDIENTE.'" class="btn btn-warning"><i class="fas fa-edit"></i></a> / <a class="btn btn-danger" data-toggle="modal" data-target="#eliminar'.$i.'"><i class="fas fa-trash-alt"></i></a>/
     <a href="#" class="btn btn-info"><i class="fas fa-download"></i></a></td>
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
   </table><nav aria-label="Page navigation example">
   <ul class="pagination">';
   $cantidad= count($pacs)/6;
   $cantidad= ceil($cantidad);
   for($i=1; $i<=$cantidad; $i+1){
     $pacientes.= '<li class="page-item"><a class="page-link" href="'.base_url().'Pacientes/verPacie/'.$i.'">'.$i++.'</a></li>';
   }
   $pacientes.='</ul>
   </nav>';
    return $pacientes;
}
//funcion que devuelve las citas
function verCit($citas, $citasp){
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
   foreach($citasp as $cis){
     $ci.= '<tr>
     <td>'.$cis->ID_CITA.'</td>
     <td>'.$cis->ID_HORARIO.'</td>
     <td>'.$cis->IDEXPEDIENTE.'</td>
     <td>'.$cis->DOCTOR.'</td>
     <td>'.$cis->COMENTARIO.'</td>
     <td><a href="'.base_url().'/Citas/tomarcitas/'.$cis->ID_CITA.'" class="btn btn-warning"><i class="fas fa-edit"></i></a> / <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
     </tr>';
   }
   $ci.='</tbody>
   </table><nav aria-label="Page navigation example">
   <ul class="pagination">';
   $cantidad= count($citas)/6;
   $cantidad= ceil($cantidad);
   for($i=1; $i<=$cantidad; $i+1){
     $ci.= '<li class="page-item"><a class="page-link" href="'.base_url().'Citas/verCitas/'.$i.'">'.$i++.'</a></li>';
   }
   $ci.='</ul>
   </nav>';
   return $ci;
}
// funcion para mostrar los usuarios
function usuarios($users, $usersp){
  $us = '<table class="table table-striped" id="lista">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Tipo</th>
      <th scope="col">Correo</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>';
  $i=0;
  foreach($usersp as $u){
    $i++;
    $us.= '<tr>
    <td>'.$u->ID_USUARIO.'</td>
    <td>'.$u->NOMBRE_USUARIO.'</td>
    <td>'.$u->APELLIDO_USUARIO.'</td>
    <td>'.$u->TIPO_USUARIO.'</td>
    <td>'.$u->CORREO.'</td>
    <td><a href="'.base_url().'Usuarios/selecuser/'.$u->ID_USUARIO.'" class="btn btn-warning"><i class="fas fa-edit"></i></a> / <a class="btn btn-danger" data-toggle="modal" data-target="#eliminar'.$i.'"><i class="fas fa-trash-alt"></i></a></td>
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
          <a href="'.base_url().'Usuarios/eliminar/'.$u->ID_USUARIO.'" class="btn btn-primary">Aceptar</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>';
  }
  $us.='</tbody></table>
  <nav aria-label="Page navigation example">
  <ul class="pagination">';
  $cantidad= count($users)/6;
  $cantidad= ceil($cantidad);
  for($i=1; $i<=$cantidad;$i+1){
    $us.='<li class="page-item"><a class="page-link" href="'.base_url().'/Usuarios/verusers/'.$i.'">'.$i++.'</a></li>';
  }
  $us.='</ul></nav>';
  return $us;
}
?>