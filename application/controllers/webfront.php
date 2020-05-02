<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webfront extends CI_Controller {

    public function __construct(){
        parent:: __construct(); 
        $this->load->model('Mostrar');
    }

    public function doctores(){
        $doctores = $this->Mostrar->Docs();

        echo json_encode($doctores);
        echo json_last_error();
    }
}
