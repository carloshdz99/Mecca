<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Dashboard extends CI_Controller {
    public function __construct(){
        parent:: __construct(); 
        // cargando los helpers 
        $this->load->helper('Menu');
        $this->load->helper('forms/forms');
        $this->load->helper('list/listas');
        $this->load->model('Mostrar');
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
    //muestra los doctores que esten activos en la base de datos
    public function Dashboard(){
        //toma todos los doctores de la base
        $doctores = $this->Mostrar->Docs();
        //y los manda como parametro al helper para que los imprima
        $docsA = doctoresActivos($doctores);
        //enviando estructura a la vista
        $data['estructura'] = menu($docsA,'','Doctores Activos');
        $this->load->view('administrador/dashboard.php',$data);
    }

}