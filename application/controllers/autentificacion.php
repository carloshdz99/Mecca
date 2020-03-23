<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class autentificacion extends CI_Controller {

	public function __construct()
    {
        parent:: __construct();
        $this->load->model("login_model");
        $this->load->library("session");
    }
    public function index()
	{
        if($this->session->userdata('login/login.php')){
            redirect($this->load->view('frontpage/index'));

        }
        else{
            $this->load->view('login/login.php');

        }
        
		
    }
    
    public function login(){
        $nombre=$this->input->post('username');
        $clave=$this->input->post('password');
        $result=$this->login_model->login($nombre,$clave);

        if(!$result){
            redirect($this->load->view('welcome_message'));
        }
        else{
            $data=array(
                'id'=>$result->id,
                'nombre'=>$result->nombre,
                'email'=>$result->email,
                'login'=>TRUE

            );
            $this->session->set_userdata($data);
            redirect($this->load->view('frontpage/index.php'));
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect($this->load->view('login/login.php'));
    }
    

	
}