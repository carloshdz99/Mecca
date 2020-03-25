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

function verPaci($pacs){
   $pacientes='<table class="table table-striped" id="lista">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Nombre</th>
       <th scope="col">Apellido</th>
       <th scope="col">Especialidad</th>
       <th scope="col">Estado</th>
       <th scope="col">Fecha de nacimiento</th>
       <th scope="col">Acciones</th>
     </tr>
   </thead>
   <tbody>';
   //recorriendo los datos de los doctores
   foreach($pacs as $p){
     $pacientes.= '<tr>
     <td>'.$p->IDEXPEDIENTE.'</td>
     <td>'.$p->NOMBRE_PACIENTE.'</td>
     <td>'.$p->APELLIDO_PACIENTE.'</td>
     <td>'.$p->TELEFONO.'</td>
     <td>'.$p->SEXO.'</td>
     <td>'.$p->FECHA_NACIEMIENTO.'</td>
     <td><a href="'.base_url().'Doctores/editarDocs/" class="btn btn-dark"><i class="fas fa-edit"></i></a> / <a href="'.base_url().'Doctores/editarDocs/" class="btn btn-dark"><i class="fas fa-trash-alt"></i></a></td>
   </tr>';
   }
   $pacientes.='</tbody>
   </table>';
    return $pacientes;
}

function verCit(){
    return '<table class="table table-sm table-dark" id="lista">
    <thead>
      <tr class="bg-primary text-white">
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Especialidad</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>Activo</td>
        <td><i class="fas fa-edit"></i>     <i class="fas fa-trash-alt"></i></td>
      </tr>
      <tr class="table-info">
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>@mdo</td>
        <td>Activo</td>
        <td><i class="fas fa-edit"></i>     <i class="fas fa-trash-alt"></i></td>
      </tr>
      <tr>
        <td>Larry the Bird</td>
        <td>John Doe</td>
        <td>@twitter</td>
        <td>@mdo</td>
        <td>Activo</td>
        <td><i class="fas fa-edit"></i>     <i class="fas fa-trash-alt"></i></td>
      </tr>
    </tbody>
  </table>';
}
?>