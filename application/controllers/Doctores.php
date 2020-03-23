<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctores extends CI_Controller {

  public function __construct(){
    parent:: __construct(); 
    // cargando los helpers 
    $this->load->helper('Menu');
    $this->load->helper('forms/forms');
    $this->load->helper('forms/validarF');
    // cargando base de datos
    $this->load->database();
    // llamando modelo Insertando
    $this->load->model('Insertando');
    //cargando libreria de errores
    $this->load->library(array('form_validation'));
    }

// funcion que carga la vistas
public function doctores(){
    //tomando el formulario que devuelve la funcion
    $form = docs();
    //tomando la estructura de la pagina
    $data['estructura']= menu($form,'','Doctores');
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
    $estado=0;
    $id_doctor='';
    // comprobando si se selecciono activo o inactivo
    if($this->input->post('activo')){
        $estado = 1;
    }else if($this->input->post('inactivo')){
        $estado = 0;
    }
    $pL=substr($nombre,1);
    $pF=substr($apellido,1);
    $id_doctor.="$pL";
    $id_doctor.="$pF";
    $id_doctor.="2";
    $id_doctor.="3";

      //tomando las reglas de la validacion
      $campos = doctoresVal();
      //pasando las validaciones
      $this->form_validation->set_rules($campos);
      //comprobando si se ha incumplido alguna regla
      if($this->form_validation->run() == FALSE){
        //tomando la estructura de la pagina
        $data['estructura']= menu($form,'');
        $this->load->view('administrador/doctores.php',$data);
      }else{
        // mandando los datos al modulo en forma de arreglo
        $datos = array(
       'NOMBRE_DOCTOR' => $nombre,
       'APELLIDO_DOCTOR' => $apellido,
       'ESTADO' => $estado,
       'ESPECIALIDAD' => $especialidad,
       'ID_DOCTOR' => $id_doctor
       );
      // comprobando que se haya recibido datos
      if(!$this->Insertando->Insertando($datos)){
        //recargando la pagina con mensaje de guardado
        $msg='<div class="alert alert-danger"> Error en el llenado</div>';
        $data['estructura'] = menu($form,$msg);
        $this->load->view('administrador/doctores.php',$data);
      }else{
         //recargando la pagina con mensaje de guardado
         $msg='<div class="alert alert-success"> guardado correctamente</div>';
         $data['estructura'] = menu($form,$msg);
         $this->load->view('administrador/doctores.php',$data);
        }
      }
      ///////////////////////////////////////////////////
      }

//funcion que muestra los doctores registrados en la base de datos
function mostrarD(){

  $this->load->view('administrador/verDocs.php',$data);
}

}

?>