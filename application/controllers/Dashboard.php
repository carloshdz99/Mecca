<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Dashboard extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        // cargando base de datos
        $this->load->database();
    }

    public function Dashboard(){
        $form = consulta();
        $data['estructura'] = menu($form,'','Consultas');
        $this->load->view('administrador/dashboard.php',$data);
    }

}