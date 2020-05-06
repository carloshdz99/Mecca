<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('MenuArchivo');
        $this->load->helper('forms/forms');
        $this->load->helper('forms/formsac');
        $this->load->helper('list/listas');
        $this->load->helper('alertas/alertas');
        $this->load->model('Mostrar');
        $this->load->model('actualizar');
        $this->load->model('Insertando');
        $this->load->model('validaciones');
        $this->load->model('Eliminar');
        // cargando base de datos
        $this->load->database();
        
         /*aqui evaluamos si no existe una variable de sesion definida en el parametro login no tendra asignado nada
    entonces devolvera false si esto sucede quiere decir que mientras no se haya iniciado sesion no existira una variable de sesion
    asi que si cualquier usuario intenta copiar el link de uno de los formularios para ingresar saltandose el login no podra porque con esta condicion
    lo redireccionara siempre al login*/
        if(!$this->session->userdata('login')){
            redirect(base_url());

        }
    }



    //cargando la vista citas
    public function Citas(){
        //tomando la estructura de la pagina 
        //tomando los doctores existentes en la base de datos
        $doctores = $this->Mostrar->Docs();
        $pacientes=$this->Mostrar->pacientes();
        //tomando el formulario correspondiete a la vista
        $form = citas($doctores,$pacientes);

            /*Se evalua si por variable de sesion desde la base si el usuario es administrador entonces
            imprimira el helper del menu completo*/
            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($form,'','Citas');
            }
            /*Si el tipo de usuario es de arhivo imprimira el menu helper de archivo donde solo no trae el formulario
            de ingresar usuarios ni el de personalizar el sitio web*/
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($form,'','Citas');
            }

        $this->load->view('administrador/cita.php',$data);
    }



    //funcion registrar cistas
    public function Registrar(){
        $doctores = $this->Mostrar->Docs();
        $pacientes=$this->Mostrar->pacientes();
        //tomando los valores de las variables
        $hora = $this->input->post('horario');
        $doctor = $this->input->post('doctor');
        $paciente = $this->input->post('paciente');
        $comentario=$this->input->post('des');
        $fecha=$this->input->post('fecha');

        $form = citas($doctores,$pacientes);

        $msg= $this->validaciones->citasval($hora, $fecha, $doctor, $paciente, $comentario);

        if($this->session->userdata('tipo')=='admin'){
            $data['estructura'] = menu($form,$msg,'Citas');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura'] = menuarchivo($form,$msg,'Citas');
        }

        $this->load->view('administrador/cita.php',$data);
    }



    //cargando la lista de cistas registradas
    public function verCitas($pagina=1){
        $inicio = ($pagina-1)*6;
        $fin = $inicio+6;
        $pacientes = $this->Mostrar->citas();
        $pacientesp= $this->Mostrar->citasp($inicio,$fin);
        $lista = verCit($pacientes,$pacientesp);
        //tomando la estructura de la pagina 

            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($lista,'','Lista de Citas');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($lista,'','Lista de Citas');
            }

        $this->load->view('administrador/verCitas',$data);
    }

    //tomando las citas para actualizacion
    public function tomarcitas($id){
        $doctores = $this->Mostrar->Docs();
        $cita= $this->Mostrar->tomarcits($id);
        //obteniendo la fecha de la cita
        $fecha=$this->Mostrar->obtenerfecha($cita["ID_HORARIO"]);
        //obteniendo nombre de paciente
        $nombrep=$this->Mostrar->nombrepac($cita["IDEXPEDIENTE"]);

        $form = citasa($doctores,$nombrep["NOMBRE_PACIENTE"],$fecha["FECHA"],$cita["COMENTARIO"], $cita["ID_CITA"]);

        //cargando la vista de citas con la cita seleccionada dependiendo el tipo de usuario
        if($this->session->userdata('tipo')=='admin'){
            $data['estructura'] = menu($form,'','Actualizar Cita');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura'] = menuarchivo($form,'','Actualizar Cita');
        }

        $this->load->view('administrador/cita.php',$data);
    }

    //funcion que actualiza los datos de las citas
    public function Actualizar($pagina=1){
        $hora = $this->input->post('horario');
        $doctor = $this->input->post('doctor');
        $paciente = $this->input->post('paciente');
        $comentario=$this->input->post('des');
        $fechaingre=$this->input->post('fecha');
        $id=$this->input->post('id');
        //tomando los datos para imprimir el formulario en la vista
        $doctores = $this->Mostrar->Docs();
        $cita= $this->Mostrar->tomarcits($id);
        //obteniendo la fecha de la cita
        $fecha=$this->Mostrar->obtenerfecha($cita["ID_HORARIO"]);
        //obteniendo nombre de paciente
        $nombrep=$this->Mostrar->nombrepac($cita["IDEXPEDIENTE"]);
        $form = citasa($doctores,$nombrep["NOMBRE_PACIENTE"],$fecha["FECHA"],$cita["COMENTARIO"], $cita["ID_CITA"]);

        $msg=$this->validaciones->actualizarcitas($hora, $fechaingre, $doctor, $paciente, $comentario, $cita["ID_HORARIO"],$cita["ID_CITA"],$cita["IDEXPEDIENTE"]);
    
        // validando que no halla error, si lo hay volvera a cargar el formulario con los datos
        if($msg==noactualizado() || $msg==Campos() || $msg==existente() || $msg==hora() || $msg==fecha()){
            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($form,$msg,'Actualizar Cita');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($form,$msg,'Actualizar Cita');
            }
        }else{
            $inicio = ($pagina-1)*6;
            $fin = $inicio+6;

            $pacientes = $this->Mostrar->citas();
            $pacientesp= $this->Mostrar->citasp($inicio,$fin);
            $lista = verCit($pacientes,$pacientesp);

            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($lista,$msg,'Lista de Citas');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($lista,$msg,'Lista de Citas');
            }
        }
        $this->load->view('administrador/cita.php',$data);
    }

    //funcion para borrar citas 
    function eliminarci($id,$pagina=1){
        if(!$this->Eliminar->eliminarcitas($id)){
            $msg= noeliminar();
        }else{
            $msg= eliminar();
        }
            $inicio = ($pagina-1)*6;
            $fin = $inicio+6;

            $pacientes = $this->Mostrar->citas();
            $pacientesp= $this->Mostrar->citasp($inicio,$fin);
            $lista = verCit($pacientes,$pacientesp);

            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($lista,$msg,'Lista de Citas');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($lista,$msg,'Lista de Citas');
            }
            $this->load->view('administrador/cita.php',$data);
    }

}