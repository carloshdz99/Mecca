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

         /*aqui evaluamos si no existe una variable de sesion definida en el parametro login no tendra asignado nada
    entonces devolvera false si esto sucede quiere decir que mientras no se haya iniciado sesion no existira una variable de sesion
    asi que si cualquier usuario intenta copiar el link de uno de los formularios para ingresar saltandose el login no podra porque con esta condicion
    lo redireccionara siempre al login*/
        if(!$this->session->userdata('login')){
            redirect(base_url());

        }
    }

    public function Dashboard(){
        $form = consulta();
        $data['estructura'] = menu($form,'','Consultas');
        $this->load->view('administrador/dashboard.php',$data);
    }

}