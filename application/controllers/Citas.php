<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        $this->load->helper('list/listas');
        // cargando base de datos
        $this->load->database();
    }

    //cargando la vista citas
    public function Citas(){
        //tomando la estructura de la pagina 
        //tomando el formulario correspondiete a la vista
        $form = citas();
        $data['estructura'] = menu($form,'','Citas');
        $this->load->view('administrador/cita.php',$data);
    }

    //cargando la lista de cistas registradas
    public function verCitas(){
        //tomando la lista de citas
        $lista= verCit();
        $data['estructura'] = menu($lista,'','Lista de Citas');
        $this->load->view('administrador/verCitas',$data);
    }

}