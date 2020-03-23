<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        // cargando base de datos
        $this->load->database();
    }

    public function Pacientes(){
        $form = pacientes();
        $data['estructura'] = menu($form,'','Pacientes');
        $this->load->view('administrador/personal.php',$data);
    }

}