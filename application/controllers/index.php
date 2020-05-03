<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class index extends CI_Controller {


public function __construct()
{
    parent:: __construct();
    $this->load->helper('forms/forms');
    
    
}
public function index()
{
    $this->load->view('administrador/index2.php');
}

public function personal(){
    $this->load->view('administrador/personal.php');
}

public function doctores(){
    $this->load->view('administrador/doctores.php');
}

public function paciente(){
    $this->load->view('administrador/paciente.php');
}

public function sitioPublico(){
    
    $data['estructura']=inicioEspañol();
    $this->load->view('frontpage/index',$data);
}

public function verDocs(){
    $this->load->view('administrador/verDocs.php');
}

public function verPac(){
    $this->load->view('administrador/verPac.php');
}

}