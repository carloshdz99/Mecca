<?php
//funcion que imprime toda la estrutura de la pagina
//<span class="hidden-sx">'; echo $this->session->userdata("nombre");    echo '</span> para inprimir usuario

//los parametros de la funcion menu son para lo siguiente
/* $form imprime el fomulario recibido desde el helper forms
   $msg imprime un mensaje de confirmacion 
   $nom imprime en nombre de la vista que se esta cargando */



//<span class="hidden-sx">'; echo $this->session->userdata("nombre");    echo '</span> para inprimir usuario

//
function menu($form,$msg,$nom){
    echo '
    <div class="wrapper">
    <!-- menu lateral de la pagina -->
    <nav id="sidebar">
        <div class="sidebar-header ">
            <a href="'.base_url().'Dashboard/Dashboard" rel="noopener noreferrer">
                <img src="'.base_url('estilos/admin/img/logo2.jpg').'" alt="" class="rounded-circle rounded mx-auto d-block" width="155">
            </a>
        </div>

        <ul class="list-unstyled components">
            <hr>
            <li>
                <a href="'.base_url().'Dashboard/Dashboard">
                    <i class="fas fa-users"></i>
                    <span></span>Consultar Doctores</span>
                </a>
            </li>
            <li>
                <a href="#usuarioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users"></i>
                    Personal</a>
                <ul class="collapse list-unstyled" id="usuarioSubmenu">
                    <li>
                        <a href="'.base_url().'Usuarios/Usuarios">Agregar Personal</a>
                    </li>
                    <li>
                        <a href="'.base_url().'Usuarios/verusers">Ver Personal</a>
                    </li>                       
                </ul>
            </li>

            <li>
                <a href="#doctorSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user-md"></i>
                    Doctores</a>
                <ul class="collapse list-unstyled" id="doctorSubmenu">
                    <li>
                        <a href="'.base_url().'Doctores/mostrarD">Ver doctores</a>
                    </li>
                    <li>
                        <a href="'.base_url().'Doctores/Doctores">Agregar doctores</a>
                    </li>                       
                </ul>
            </li>
            <li >
                <a href="#pacienteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user"></i>
                    Paciente</a>
                <ul class="collapse list-unstyled" id="pacienteSubmenu">
                    <li>
                        <a href="'.base_url().'Pacientes/verPacie">Ver pacientes</a>
                    </li>
                    <li>
                        <a href="'.base_url().'Pacientes/Pacientes">Agregar pacientes</a>
                    </li>                       
                </ul>
            </li> 
            <li>
                <a href="#horarioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-calendar-alt"></i>
                    Citas</a>
                <ul class="collapse list-unstyled" id="horarioSubmenu">
                    <li>
                        <a href="'.base_url().'Citas/verCitas">Ver Citas</a>
                    </li>
                    <li>
                        <a href="'.base_url().'Citas/Citas">Agregar Citas</a>
                    </li>                       
                </ul>
            </li>               
            <li>                   
                <a href="'.base_url().'Personalizacion/Personalizacion">
                    <i class="fas fa-cog"></i>
                    Personalizar sitio web</a>
            </li>
        </ul>           
    </nav>
    <!-- fin del menu lateral -->
    <div id="content">
    
    <!--menu horizontal incluido en todas las vistas-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
                    <div class="container-fluid">
    
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span></span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>
    
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item mr-3">
                                    <a class="btn btn-primary " href="'.base_url().'index/sitioPublico" target="_blank" role="button">Ir al sitio público</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="'.base_url().'Login/logout" role="button">Cerrar sesión</a>
                                </li>                            
                            </ul>
                        </div>
                    </div>
                </nav>
                '.$msg.'

                <!--fin del menu horizontal-->
                
                <section class="main-content">
                    <div class="row mt">
                        <div class="col-lg-12">
                            <h1>'.$nom.'</h1>
                            <hr>
                      '.$form.'

                            <!-- footer que ira incluido en todas las vistas de administrador-->
<footer id="sticky-footer" class="py-3 bg-dark text-white-50">
    <div class="container text-center">
        <small>Copyright &copy; Multiclinica de Especialidades y Cirugia</small>
    </div>
</footer>
</div> 
    </div>'
                ;
}
?>