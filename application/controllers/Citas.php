<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        // cargando base de datos
        $this->load->database();
    }

    public function Citas(){
        $form = citas();
        $data['estructura'] = menu($form,'','Citas');
        $this->load->view('administrador/cita.php',$data);
    }

}