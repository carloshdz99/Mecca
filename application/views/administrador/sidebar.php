        <!-- menu lateral de la pagina -->
        <nav id="sidebar">
            <div class="sidebar-header ">
                <a href="<?php echo base_url();?>index/index" rel="noopener noreferrer">
                    <img src="../../../mecca/estilos/admin/img/logo2.jpg" alt="" class="rounded-circle rounded mx-auto d-block" width="155">
                </a>
            </div>

            <ul class="list-unstyled components">
                <hr>
                <li>
                    <a href="<?php echo base_url();?>index/personal">
                        <i class="fas fa-users"></i>
                        <span></span>Personal</span>
                    </a>
                </li>
                <li >
                    <a href="#pacienteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user"></i>
                        Paciente</a>
                    <ul class="collapse list-unstyled" id="pacienteSubmenu">
                        <li>
                            <a href="<?php echo base_url();?>index/verPac">Ver pacientes</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index/paciente">Agregar pacientes</a>
                        </li>                       
                    </ul>
                </li>                
                <li>
                    <a href="#doctorSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user-md"></i>
                        Doctores</a>
                    <ul class="collapse list-unstyled" id="doctorSubmenu">
                        <li>
                            <a href="<?php echo base_url();?>index/verDocs">Ver doctores</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index/doctores">Agregar doctores</a>
                        </li>                       
                    </ul>
                </li>
                <li>
                    <a href="#horarioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-calendar-alt"></i>
                        Horarios</a>
                    <ul class="collapse list-unstyled" id="horarioSubmenu">
                        <li>
                            <a href="#">Ver horarios</a>
                        </li>
                        <li>
                            <a href="#">Agregar horarios</a>
                        </li>                       
                    </ul>
                </li>
                <li>                   
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        Personalizar sitio web</a>
                </li>
            </ul>           
        </nav>
        <!-- fin del menu lateral --> 