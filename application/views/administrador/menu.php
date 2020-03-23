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
                                <a class="btn btn-primary " href="<?php echo base_url();?>index/sitioPublico" target="_blank" role="button">Ir al sitio público</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary" href="#" role="button">Cerrar sesión</a>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!--fin del menu horizontal-->