<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personalizacion extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        // cargando base de datos
        $this->load->database();
    }

    public function Personalizacion(){
        $form = personalizar();
        $data['estructura'] = menu($form,'','Colores');
        $this->load->view('administrador/personalizar.php',$data);
    }

}