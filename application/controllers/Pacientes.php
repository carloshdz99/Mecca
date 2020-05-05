<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('MenuArchivo');
        $this->load->helper('forms/forms');
        $this->load->helper('forms/formsac');
        $this->load->helper('list/listas');
        $this->load->helper('alertas/alertas');
        // cargando base de datos
        $this->load->database();
        //cargando todos los modelos
        $this->load->model('Generador');
        $this->load->model('Mostrar');
        $this->load->model('eliminar');
        $this->load->model('Validaciones');

         /*aqui evaluamos si no existe una variable de sesion definida en el parametro login no tendra asignado nada
    entonces devolvera false si esto sucede quiere decir que mientras no se haya iniciado sesion no existira una variable de sesion
    asi que si cualquier usuario intenta copiar el link de uno de los formularios para ingresar saltandose el login no podra porque con esta condicion
    lo redireccionara siempre al login*/
        if(!$this->session->userdata('login')){
            redirect(base_url());
        }
    }


    //carga la vista de pacientes 
    public function Pacientes(){
        //toma la estructura de la vista para imprimirla
        //tomando el formulario correspondiente a la vista
        $form = pacientes();

        /*Se evalua si por variable de sesion desde la base si el usuario es administrador entonces
        imprimira el helper del menu completo*/
        if($this->session->userdata('tipo')=='admin'){
            $data['estructura'] = menu($form,'','Pacientes');
        }
        /*Si el tipo de usuario es de arhivo imprimira el menu helper de archivo donde solo no trae el formulario
          de ingresar usuarios ni el de personalizar el sitio web*/
        elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura'] = menuarchivo($form,'','Pacientes');
        }

        $this->load->view('administrador/personal.php',$data);
    }



    //cargando lista de pacientes registrados en la base
    public function verPacie($paginacion=1){
        $inicio= ($paginacion-1)*6;
        $fin= ($paginacion-1)+6;
                $pacientes = $this->Mostrar->pacientes();
                $pacientesp= $this->Mostrar->pacientesp($inicio, $fin);
                //toma la estructura de la vista para imprimirla
                //tomando la lista correspondiente a la vista
                $lista = verPaci($pacientes,$pacientesp);
            if($this->session->userdata('tipo')=='admin'){
                //tomando los datos de la base
                $data['estructura'] = menu($lista,'','Pacientes');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($lista,'','Pacientes');
            }
            $this->load->view('administrador/paciente.php',$data);
    }



    //funcion que se usa para registrar pacientes
    public function Registrar(){
        //tomando los valores de los campos
        $nombre = $this->input->post('nom');   
        $apellido = $this->input->post('ape');
        $fecha=$this->input->post('fecha');
        $sexo=$this->input->post('sexo');
        $telefono=$this->input->post('telefono');
        $form=pacientes();
        $msg= $this->Validaciones->pacientesval($nombre,$apellido,$fecha,$sexo,$telefono);
            // comprobando que se haya recibido datos
            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($form,$msg,'Ingresando Pacientes');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($form,$msg,'Ingresando Pacientes');
            }
        $this->load->view('administrador/paciente.php',$data);
    }



    //funcion que toma los pacientes en el formulario
    public function tomarP($id){
        //tomando el paciente seleccionado
        $paci=$this->Actualizar->tomarPacs($id);
        //tomando el formulario correspondiente a la vista
        $form = paciA($paci);

            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($form,'','Actualizar Paciente');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($form,'','Actualizar Paciente');
            }

        $this->load->view('administrador/personal.php',$data);
    }



    //funcion que actualiza los datos
    public function actualizar($paginacion=1){
        //tomando los valores de los campos
        $nombre = $this->input->post('nom');   
        $apellido = $this->input->post('ape');
        $fecha=$this->input->post('fecha');
        $sexo=$this->input->post('sexo');
        $telefono=$this->input->post('telefono');
        $id=$this->input->post('id');

        $paci=$this->Actualizar->tomarPacs($id);
        $form= paciA($paci);

        $msg= $this->Validaciones->actualizarpacientes($nombre, $apellido, $fecha, $sexo, $telefono, $id);

        if($msg==fecha() || $msg==Campos() || $msg==numeros() || $msg==noactualizado() || $msg==existente() || $msg==telefono()){
            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($form,$msg,'Actualizar Paciente');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($form,$msg,'Actualizar Paciente');
            }
        }else{
            $inicio= ($paginacion-1)*6;
            $fin= ($paginacion-1)+6;
                $pacientes = $this->Mostrar->pacientes();
                $pacientesp= $this->Mostrar->pacientesp($inicio, $fin);
                //toma la estructura de la vista para imprimirla
                //tomando la lista correspondiente a la vista
                $lista = verPaci($pacientes,$pacientesp);
                if($this->session->userdata('tipo')=='admin'){
                    $data['estructura'] = menu($lista,$msg,'Lista de Pacientes');
                }
                elseif($this->session->userdata('tipo')=='archivo'){
                    $data['estructura'] = menuarchivo($lista,$msg,'Lista de Pacientes');
                }
        }

       

    $this->load->view('administrador/personal.php',$data);
    
    }



    //funcion para eliminar datos de pacientes
    function eliminarPacs($id){
        //tomando los datos de la base
        $pacientes = $this->Mostrar->pacientes();

        if(!$this->eliminar->eliminarP($id)){
            $pacientes = $this->Mostrar->pacientes();
            //tomando la lista correspondiente a la vista
            $lista = verPaci($pacientes);

                if($this->session->userdata('tipo')=='admin'){
                    $data['estructura'] = menu($lista,'<div class="alert alert-danger">No se Elimino</div>','Pacientes');
                }
                elseif($this->session->userdata('tipo')=='archivo'){
                    $data['estructura'] = menuarchivo($lista,'<div class="alert alert-danger">No se Elimino</div>','Pacientes');
                }

            $this->load->view('administrador/verPac.php',$data);


        }        
        else{
            $pacientes = $this->Mostrar->pacientes();
            //toma la estructura de la vista para imprimirla
            //tomando la lista correspondiente a la vista
            $lista = verPaci($pacientes);

                if($this->session->userdata('tipo')=='admin'){
                    $data['estructura'] = menu($lista,'<div class="alert alert-warning">Registro Eliminado</div>','Pacientes');
                }
                elseif($this->session->userdata('tipo')=='archivo'){
                    $data['estructura'] = menuarchivo($lista,'<div class="alert alert-warning">Registro Eliminado</div>','Pacientes');
                }

            $this->load->view('administrador/verPac.php',$data);

        }
    }
}