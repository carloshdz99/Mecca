<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        // cargando base de datos
        $this->load->database();
    }

    public function Usuarios(){
        $form = personas();
        $data['estructura'] = menu($form,'','Usuarios');
        $this->load->view('administrador/personal.php',$data);
    }

}