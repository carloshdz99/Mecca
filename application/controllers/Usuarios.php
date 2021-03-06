<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        $this->load->helper('forms/formsac');
        $this->load->helper('list/listas');
        // cargando base de datos
        $this->load->database();
        $this->load->model('Insertando');
        $this->load->model('Generador');
        $this->load->model('Mostrar');
        $this->load->model('Eliminar');
        $this->load->model('Validaciones');

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
        $nombre = $this->input->post('nom');   
        $apellido = $this->input->post('ape');
        $email=$this->input->post('email');
        $tipo_usuario=$this->input->post('tipo');
        $contraseña=$this->input->post('password');

        //recargando la pagina con mensaje de guardado
        

        //cargando formulario de la pagina
        $form = personas();
        $msg= $this->Validaciones->usuariosval($nombre,$apellido,$email,$tipo_usuario,$contraseña);
        //cargando la pagina despues del registro

        $data['estructura'] = menu($form,$msg,'Ingresando Usuarios');
        $this->load->view('administrador/personal.php',$data);
        
    }

    
    //mostrando usuarios del sistema
    function verusers($paginacion=1){
        $inicio = ($paginacion-1)*6;
        $fin = ($paginacion-1)+6;
        $usuarios = $this->Mostrar->users();
        $usuariosp= $this->Mostrar->usersp($inicio, $fin);
        $lista = usuarios($usuarios,$usuariosp);
        
        $data['estructura'] = menu($lista,'','Personal');


        $this->load->view('administrador/personal.php',$data);
        
     

        
        $this->load->view('administrador/personal.php',$data);

    }  

        
    
    //funcion que elimina los usuarios
    function eliminar($id,$paginacion=1){
        $inicio = ($paginacion-1)*6;
        $fin = ($paginacion-1)+6;
        $msg=$this->Eliminar->eliminarus($id);
        $usuarios = $this->Mostrar->users();
        $usuariosp= $this->Mostrar->usersp($inicio, $fin);
        $lista = usuarios($usuarios,$usuariosp);
        if($this->session->userdata('tipo')=='admin'){
            $data['estructura'] = menu($lista,$msg,'Personal');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura'] = menuarchivo($lista,$msg,'Personal');
        }
        $this->load->view('administrador/personal.php',$data);
    }
    function selecuser($id){
        $users = $this->Mostrar->userac($id);
        $form=usuariosa($users);
        if($this->session->userdata('tipo')=='admin'){
            $data['estructura'] = menu($form,'','Actualizar Persona');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura'] = menuarchivo($form,'','Actualizar Persona');
        }
        $this->load->view('administrador/personal.php',$data);
    }
    //funcion que actualiza datos de usuarios
    function actualizar($pagina=1){
        $inicio = ($pagina-1)*6;
        $fin = ($pagina-1)+6;

        $nombre = $this->input->post('nom');   
        $apellido = $this->input->post('ape');
        $email=$this->input->post('email');
        $tipo_usuario=$this->input->post('tipo');
        $contraseña=$this->input->post('password');
        $id=$this->input->post('id');

        $msg= $this->Validaciones->actualizarusuarios($nombre,$apellido,$email,$tipo_usuario,$contraseña,$id);
        if($msg==noactualizado()||$msg==numeros()||$msg==Campos()||$msg==existente()||$msg==malcorreo()){
            $users = $this->Mostrar->userac($id);
            $form=usuariosa($users);
            $data['estructura'] = menu($form,$msg,'Personal');
        }else{
            $usuarios = $this->Mostrar->users();
            $usuariosp= $this->Mostrar->usersp($inicio, $fin);
            $lista = usuarios($usuarios,$usuariosp);
            $data['estructura'] = menu($lista,$msg,'Personal');
        }
        $this->load->view('administrador/personal.php',$data);
    }

}