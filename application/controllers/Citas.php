<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        $this->load->helper('list/listas');
        $this->load->model('Mostrar');
        $this->load->model('actualizar');
        $this->load->model('Insertando');
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
        $hora = $this->Mostrar->horario();
        $pacientes=$this->Mostrar->pacientes();
        //tomando el formulario correspondiete a la vista
        $form = citas($doctores,$hora,$pacientes);
        $data['estructura'] = menu($form,'','Citas');
        $this->load->view('administrador/cita.php',$data);
    }
    //funcion registrar cistas
    public function Registrar(){
        //tomando los valores de las variables
        $id=rand(0,200);
        $horario = $this->input->post('horario');
        $doctor = $this->input->post('doctor');
        $paciente = $this->input->post('paciente');
        $descripcion=$this->input->post('des');
        //obteniendo id del expediente
        $idExp = $this->Mostrar->idEx($paciente);
        //obteniendo id del horario
        $idHor= $this->Mostrar->idHor($horario);
        $datos = array(
            "ID_CITA" => $id,
            "ID_HORARIO"=> $idHor["ID_HORARIO"],
            "IDEXPEDIENTE"=> $idExp["IDEXPEDIENTE"],
            "DOCTOR"=> $doctor,
            "COMENTARIO" => $descripcion
        );
        if(!$this->Insertando->InsertandoCitas($datos)){
            $doctores = $this->Mostrar->Docs();
            $hora = $this->Mostrar->horario();
            $pacientes=$this->Mostrar->pacientes();
            //tomando el formulario correspondiete a la vista
            $form = citas($doctores,$hora,$pacientes);
            $data['estructura'] = menu($form,'<div class="alert alert-danger">Error en el registro</div>','Citas');
            $this->load->view('administrador/cita.php',$data);
        }else{
            $doctores = $this->Mostrar->Docs();
            $hora = $this->Mostrar->horario();
            $pacientes=$this->Mostrar->pacientes();
            //tomando el formulario correspondiete a la vista
            $form = citas($doctores,$hora,$pacientes);
            $data['estructura'] = menu($form,'<div class="alert alert-success">Guardado Correctamente</div>','Citas');
            $this->load->view('administrador/cita.php',$data);
        }
    }
    //cargando la lista de cistas registradas
    public function verCitas(){
        $pacientes = $this->Mostrar->citas();
        $lista = verCit($pacientes);
        //tomando la estructura de la pagina 
        $data['estructura'] = menu($lista,'','Lista de Citas');
        $this->load->view('administrador/verCitas',$data);
    }

}