<?php
function verDocs(){
    return '<table class="table table-sm table-dark" id="lista">
    <thead>
      <tr class="text-white">
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Especialidad</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-dark text-dark">
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>Activo</td>
        <td><i class="fas fa-edit"></i></td>
      </tr>
      <tr class="bg-white text-dark">
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>@mdo</td>
        <td>Activo</td>
        <td><i class="fas fa-edit"></i></td>
      </tr>
      <tr class="table-dark text-dark">
        <td>Larry the Bird</td>
        <td>John Doe</td>
        <td>@twitter</td>
        <td>@mdo</td>
        <td>Activo</td>
        <td><i class="fas fa-edit"></i></td>
      </tr>
    </tbody>
  </table>';
}

function verPaci(){
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
        <td><i class="fas fa-edit"></i><i class="fas fa-trash-alt"></i></td>
      </tr>
      <tr class="table-info">
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>@mdo</td>
        <td>Activo</td>
        <td><i class="fas fa-edit"></i><i class="fas fa-trash-alt"></i></td>
      </tr>
      <tr>
        <td>Larry the Bird</td>
        <td>John Doe</td>
        <td>@twitter</td>
        <td>@mdo</td>
        <td>Activo</td>
        <td><i class="fas fa-edit"></i><i class="fas fa-trash-alt"></i></td>
      </tr>
    </tbody>
  </table>';
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