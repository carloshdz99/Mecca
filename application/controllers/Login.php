<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        //cargo la el archivo de conexion con la base para el login
        parent:: __construct();
        $this->load->model("login_model");
        $this->load->library("session");
        
    }
    public function index()
	{
        /*si esta definida el identificador login  de la sesion abrira la pagina de backkend
        es decir si encontro en la base los datos que pide*/
        if($this->session->userdata('login')){
            redirect(base_url()."Dashboard/Dashboard");

        }
        //sino significa que no hay sesiones activas y regresara al login
        else{
            $this->load->view('login/login.php');

        }
        
		
    }
    /*capturamos dichos parametros y los enviamos al modelo del login para evaluar si existen*/
    public function login(){
        $correo=$this->input->post('email');
        $clave=$this->input->post('password');
        $result=$this->login_model->login($correo,$clave);

        //si no encontro datos de la tabla usuarios imprime el controlador por defecto que es login y este llamara la vista de login
        if(!$result){
            redirect(base_url());
        }
        /* Si encuentra datos en la base en la tabla usuario entonces en una variable de sesion guardamos
        un array con datos obtenidos del usuario y redireccionamos al dashboard de la pagina de administracion*/
        else{
            $data=array(
                'id'=>$result->ID_USUARIO,
                'nombre'=>$result->NOMBRE_USUARIO,
                'email'=>$result->CORREO,
                'tipo'=>$result->TIPO_USUARIO,
                'login'=>TRUE

            );
            $this->session->set_userdata($data);
            redirect(base_url()."Dashboard/Dashboard");
        }
    }

    /*aqui se eliminan los datos en la variable de sesion cuando el usuario cierre sesion luego redirecciona al login de nuevo*/
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    

	
}