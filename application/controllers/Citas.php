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
        $this->load->model('Mostrar');
        $this->load->model('actualizar');
        $this->load->model('Insertando');
        $this->load->model('validaciones');
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

        $msg= $this->validaciones->citasingreval($hora, $doctor, $paciente, $comentario, $fecha, '', 'registro');

        if($this->session->userdata('tipo')=='admin'){
            $data['estructura'] = menu($form,$msg,'Citas');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura'] = menuarchivo($form,$msg,'Citas');
        }

        $this->load->view('administrador/cita.php',$data);
    }



    //cargando la lista de cistas registradas
    public function verCitas(){
        $pacientes = $this->Mostrar->citas();
        $lista = verCit($pacientes);
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
    public function Actualizar($paginacion=1){
        $hora = $this->input->post('horario');
        $doctor = $this->input->post('doctor');
        $paciente = $this->input->post('paciente');
        $comentario=$this->input->post('des');
        $fecha=$this->input->post('fecha');
        $id=$this->input->post('id');

        $msg=$this->Validaciones->citasingreval($hora, $doctor, $paciente, $comentario, $fecha, '', 'registro');

    
        /*
=======
        
        /*if($msg==){

        }
>>>>>>> dda04c5b52e2fb4c9381bf81b2d11ca5b0dce049
        if($this->session->userdata('tipo')=='admin'){
            $data['estructura'] = menu($form,'','Actualizar Cita');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura'] = menuarchivo($form,'','Actualizar Cita');
        }

*/
       // $this->load->view('administrador/cita.php',$data);


        //$this->load->view('administrador/cita.php',$data);

    }

}