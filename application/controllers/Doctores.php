<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctores extends CI_Controller {
//holi uwu
  public function __construct(){
    parent:: __construct(); 
    // cargando los helpers 
    $this->load->helper('Menu');
    $this->load->helper('forms/forms');
    $this->load->helper('forms/validarF');
    $this->load->helper('list/listas');
    // cargando base de datos
    $this->load->database();
    // llamando modelo Insertando
    $this->load->model('Insertando');
    //llamando modelo generador de id
    $this->load->model('Generador');
    //modelo mostrar
    $this->load->model('Mostrar');
    //cargando libreria de errores
    $this->load->library(array('form_validation'));

    /*aqui evaluamos si no existe una variable de sesion definida en el parametro login no tendra asignado nada
    entonces devolvera false si esto sucede quiere decir que mientras no se haya iniciado sesion no existira una variable de sesion
    asi que si cualquier usuario intenta copiar el link de uno de los formularios para ingresar saltandose el login no podra porque con esta condicion
    lo redireccionara siempre al login*/
    if(!$this->session->userdata('login')){
      redirect(base_url());

  }
    }

// funcion que carga la vistas
public function doctores(){
    //tomando el formulario que devuelve la funcion
    $form = docs();
    //tomando la estructura de la pagina
    $data['estructura']= menu($form,'','Ingresando Doctores');
    $this->load->view('administrador/doctores.php',$data);
}
///////////////////////////////////////////////////////////

// funcion para el registro de doctores en la base de datos
public function Registrar(){
    //variable que posee el formulario de la pagina
    //tomando el formulario que devuelve la funcion
    $form = docs();
    //obteniendo los datos igresados en cada input
    $nombre = $this->input->post('nom');   
    $apellido = $this->input->post('ape');
    $especialidad = $this->input->post('espe');
    $estado = $this->input->post('est');
    if($estado=='Activo'){$numE=1;}else{$numE=0;}
    //obteniendo id del doctor
    $id= $this->Generador->id_doctor($nombre,$apellido);
    // comprobando si se selecciono activo o inactivo
    $campos = doctoresVal();
    $this->form_validation->set_rules($campos);
    if($this->form_validation->run($campos) ==FALSE){
        $msg='<div class="alert alert-danger">Error en los datos del llenado</div>';
        $data['estructura'] = menu($form,$msg,'Ingresando doctores');
        $this->load->view('administrador/doctores.php',$data);
    }else{
    //guardando los valores en un arreglo para su llenado
        $datos = array(
       'NOMBRE_DOCTOR' => strtolower($nombre),
       'APELLIDO_DOCTOR' => strtolower($apellido),
       'ESTADO' => $numE,
       'ESPECIALIDAD' => $especialidad,
       'ID_DOCTOR' => $id
       );
      // comprobando que se haya enviado datos a la base
      if(!$this->Insertando->Insertando($datos)){
        //recargando la pagina con mensaje de guardado
        $msg='<div class="alert alert-danger"> Error en el llenado</div>';
        $data['estructura'] = menu($form,$msg,'Ingresando Doctores');
        $this->load->view('administrador/doctores.php',$data);
      }else{
         //recargando la pagina con mensaje de guardado
         $msg='<div class="alert alert-success"> guardado correctamente</div>';
         $data['estructura'] = menu($form,$msg,'Ingresando Doctores');
         $this->load->view('administrador/doctores.php',$data);
        }
      }
}

//funcion que muestra los doctores registrados en la base de datos
function mostrarD(){
  $doctores = $this->Mostrar->Docs();
  $lista = verDocs($doctores);
  $data['estructura'] = menu($lista,'','Lista de Doctores');
  //cargando la vista con los doctores registrados en la base
  $this->load->view('administrador/verDocs.php',$data);
}
}
?>