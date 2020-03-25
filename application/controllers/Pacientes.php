<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        $this->load->helper('list/listas');
        // cargando base de datos
        $this->load->database();
        $this->load->model('Insertando');
        $this->load->model('Generador');
        $this->load->model('Mostrar');
        $this->load->library(array('form_validation'));

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
        $data['estructura'] = menu($form,'','Pacientes');
        $this->load->view('administrador/personal.php',$data);
    }

    //cargando lista de pacientes registrados en la base
    public function verPacie(){
        //tomando los datos de la base
        $pacientes = $this->Mostrar->pacientes();
        //toma la estructura de la vista para imprimirla
        //tomando la lista correspondiente a la vista
        $lista = verPaci($pacientes);
        $data['estructura'] = menu($lista,'','Pacientes');
        $this->load->view('administrador/verPac.php',$data);
    }


    public function Registrar(){
        $nombre = $this->input->post('nom');   
        $apellido = $this->input->post('ape');
        $fecha=$this->input->post('fecha');
        $sexo=$this->input->post('sexo');
        $telefono=$this->input->post('telefono');

        $id=$this->Generador->id_doctor($nombre,$apellido);

        $datos = array(
            'IDEXPEDIENTE'=>$id,
            'NOMBRE_PACIENTE'=>$nombre,
            'APELLIDO_PACIENTE'=>$apellido,
            'TELEFONO'=>$telefono,
            'SEXO'=>$sexo,
            'FECHA_NACIEMIENTO'=>$fecha
            );
        

            $form=pacientes();
            // comprobando que se haya recibido datos
      if(!$this->Insertando->InsertandoPacientes($datos)){
        //recargando la pagina con mensaje de guardado
        $msg='<div class="alert alert-danger"> Error en el llenado</div>';
        $data['estructura'] = menu($form,$msg,'Ingresando Usuarios');
        $this->load->view('administrador/paciente.php',$data);
      }else{
         //recargando la pagina con mensaje de guardado
         $msg='<div class="alert alert-success"> Guardado correctamente</div>';
         $data['estructura'] = menu($form,$msg,'Ingresando Usuarios');
         $this->load->view('administrador/paciente.php',$data);
        } 
    }
}