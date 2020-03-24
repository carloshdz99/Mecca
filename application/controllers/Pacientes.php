<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        $this->load->helper('list/listas');
        // cargando base de datos
        $this->load->database();
    }

    //carga la vista de pacientes 
    public function Pacientes(){
        //toma la estructura de la vista para imprimirla
        //tomando el formulario correspondiente a la vista
        $form = pacientes();
        $data['estructura'] = menu($form,'','Pacientes');
        $this->load->view('administrador/personal.php',$data);
    }

    //cargando lista de pacientes registrados en la base
    public function verPacie(){
        //toma la estructura de la vista para imprimirla
        //tomando la lista correspondiente a la vista
        $lista = verPaci();
        $data['estructura'] = menu($lista,'','Pacientes');
        $this->load->view('administrador/verPac.php',$data);
    }

}