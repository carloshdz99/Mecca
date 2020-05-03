<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        $this->load->helper('forms/validarF');
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

    public function Usuarios(){
        $form = personas();
        $data['estructura'] = menu($form,'','Usuarios');
        $this->load->view('administrador/personal.php',$data);
    }

    public function Registrar(){
        //tomando los valores de los campos 
        $nombre = $this->input->post('nom');   
        $apellido = $this->input->post('ape');
        $email=$this->input->post('email');
        $tipo_usuario=$this->input->post('tipo');
        $contraseña=$this->input->post('password');

        $db=$this->Mostrar->users();
        $id=$this->Generador->id_usuarios($tipo_usuario,$nombre,$db);

        $datos = array(
            'ID_USUARIO'=>$id,
            'NOMBRE_USUARIO'=>$nombre,
            'APELLIDO_USUARIO'=>$apellido,
            'TIPO_USUARIO'=>$tipo_usuario,
            'CONTRASENA'=>$contraseña,
            'CORREO'=>$email
            );
        

            $form=personas();
            // comprobando que se haya recibido datos
      if(!$this->Insertando->InsertandoUsuarios($datos)){
        //recargando la pagina con mensaje de guardado
        $msg='<div class="alert alert-danger"> Error en el llenado</div>';
        $data['estructura'] = menu($form,$msg,'Ingresando Usuarios');
        $this->load->view('administrador/personal.php',$data);
      }else{
         //recargando la pagina con mensaje de guardado
         $msg='<div class="alert alert-success"> Guardado correctamente</div>';
         $data['estructura'] = menu($form,$msg,'Ingresando Usuarios');
         $this->load->view('administrador/personal.php',$data);
        }
        
    }  
}