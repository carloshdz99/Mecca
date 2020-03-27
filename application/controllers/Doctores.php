<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctores extends CI_Controller {
//holi uwu
  public function __construct(){
    parent:: __construct(); 
    // cargando los helpers 
    $this->load->helper('Menu');
    $this->load->helper('MenuArchivo');
    $this->load->helper('forms/forms');
    $this->load->helper('forms/validarF');
    $this->load->helper('forms/formsac');
    $this->load->helper('list/listas');
    $this->load->helper('MenuArchivo');
    // cargando base de datos
    $this->load->database();
    // llamando modelo Insertando
    $this->load->model('Insertando');
    //llamando modelo generador de id
    $this->load->model('Generador');
    //modelo mostrar
    $this->load->model('Mostrar');
    //modelo de actualizar
    $this->load->model('Actualizar');
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
      $espe=$this->Mostrar->especialidades();
      //tomando el formulario que devuelve la funcion
      $form = docs($espe);
      //tomando la estructura de la pagina
      /*Se evalua si por variable de sesion desde la base si el usuario es administrador entonces
        imprimira el helper del menu completo*/
          if($this->session->userdata('tipo')=='admin'){
            $data['estructura']= menu($form,'','Ingresando Doctores');
          }
          /*Si el tipo de usuario es de arhivo imprimira el menu helper de archivo donde solo no trae el formulario
          de ingresar usuarios ni el de personalizar el sitio web*/
          elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura']= menuarchivo($form,'','Ingresando Doctores');
          }
      $this->load->view('administrador/doctores.php',$data);
}
///////////////////////////////////////////////////////////

// funcion para el registro de doctores en la base de datos
public function Registrar(){
  $espe=$this->Mostrar->especialidades();
    //variable que posee el formulario de la pagina
    //tomando el formulario que devuelve la funcion
    $form = docs($espe);
    //obteniendo los datos igresados en cada input
    $nombre = $this->input->post('nom');   
    $apellido = $this->input->post('ape');
    $especialidad = $this->input->post('espe');
    $estado = $this->input->post('est');
    if($estado=='Activo'){$numE=1;}else{$numE=0;}
    //obteniendo id del doctor
    $doctores = $this->Mostrar->Docs();
    $id= $this->Generador->id_doctor($nombre,$apellido,$doctores);
    // comprobando si se selecciono activo o inactivo
    $campos = doctoresVal();
    $this->form_validation->set_rules($campos);
    if($this->form_validation->run($campos) ==FALSE){
        $msg='<div class="alert alert-danger">Error en los campos</div>';
        if($this->session->userdata('tipo')=='admin'){
          $data['estructura'] = menu($form,$msg,'Ingresando doctores');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
          $data['estructura'] = menuarchivo($form,$msg,'Ingresando doctores');
        }
        
        $this->load->view('administrador/doctores.php',$data);

    }
    else{
    //guardando los valores en un arreglo para su llenado
        $datos = array(
       'NOMBRE_DOCTOR' => strtolower($nombre),
       'APELLIDO_DOCTOR' => strtolower($apellido),
       'ESTADO' => $numE,
       'ESPECIALIDAD' => $especialidad,
       'ID_DOCTOR' => $id
       );
      // comprobando que se haya enviado datos a la base
      if(!$this->Insertando->InsertandoDocs($datos)){
        //recargando la pagina con mensaje de guardado
        $msg='<div class="alert alert-danger"> Error en el llenado</div>';

            if($this->session->userdata('tipo')=='admin'){
              $data['estructura'] = menu($form,$msg,'Ingresando Doctores');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
              $data['estructura'] = menuarchivo($form,$msg,'Ingresando Doctores');
            }
        $this->load->view('administrador/doctores.php',$data);

      }else{
         //recargando la pagina con mensaje de guardado
         $msg='<div class="alert alert-success"> Guardado correctamente</div>';

            if($this->session->userdata('tipo')=='admin'){
              $data['estructura'] = menu($form,$msg,'Ingresando Doctores');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
              $data['estructura'] = menuarchivo($form,$msg,'Ingresando Doctores');
            }

         $this->load->view('administrador/doctores.php',$data);
        }
      }
}


//funcion que muestra los doctores registrados en la base de datos
  public function mostrarD(){
    $doctores = $this->Mostrar->Docs();
  $lista = verDocs($doctores);
      if($this->session->userdata('tipo')=='admin'){
        $data['estructura'] = menu($lista,'','Lista de Doctores');
      }
      elseif($this->session->userdata('tipo')=='archivo'){
        $data['estructura'] = menuarchivo($lista,'','Lista de Doctores');
      }
  //cargando la vista con los doctores registrados en la base
  $this->load->view('administrador/verDocs.php',$data);
}
/////////////////////////////////////////////////////////////////////////  

  //funcion que toma los valores del docto a actualizar
  public function editarDocs($id){
    $espe=$this->Mostrar->especialidades();
    $datos= $this->Actualizar->tomarDocs($id);
    //tomando el formulario que devuelve la funcion
    $form = docsA($datos,$espe);

        if($this->session->userdata('tipo')=='admin'){
          $data['estructura'] = menu($form,'','Actualizar Doctor');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
          $data['estructura'] = menuarchivo($form,'','Actualizar Doctor');
        }

    $this->load->view('administrador/doctores',$data);
  }



  //funcion que actualizar los datos
  public function ActualizarDocs(){
    //tomando los valores de las cajas de texto
    $id_doctor = $this->input->post('id');
    $nombre = $this->input->post('nom');   
    $apellido = $this->input->post('ape');
    $especialidad = $this->input->post('espe');
    $estado = $this->input->post('est');
    if($estado=='Activo'){$numE=1;}else{$numE=0;}

    //validando los datos que se estan mandando
    $campos = doctoresVal();
    $this->form_validation->set_rules($campos);

    
    if($this->form_validation->run($campos)==FALSE){
      $datos= $this->actualizar->tomarDocs($id);
        //tomando el formulario que devuelve la funcion
        $form = docsA($datos);

        if($this->session->userdata('tipo')=='admin'){
          $data['estructura'] = menu($form,'<div class="alert alert-danger">Datos mal ingresados</div>','Actualizar datos del Doctor');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
          $data['estructura'] = menuarchivo($form,'<div class="alert alert-danger">Datos mal ingresados</div>','Actualizar datos del Doctor');
        }

        $this->load->view('administrador/doctores',$data);


    }else{
      //guardando los valores en un arreglo para su llenado
    $datos = array(
      'NOMBRE_DOCTOR' => strtolower($nombre),
      'APELLIDO_DOCTOR' => strtolower($apellido),
      'ESTADO' => $numE,
      'ESPECIALIDAD' => $especialidad,
      'ID_DOCTOR' => $id_doctor
      );


      //llamando metodo para actualizar los datos
      if(!$this->Actualizar->actualizarDocs($datos)){
        $datos= $this->Actualizar->tomarDocs($id);
        //tomando el formulario que devuelve la funcion
        $form = docsA($datos);

        if($this->session->userdata('tipo')=='admin'){
          $data['estructura'] = menu($form,'<div class="alert alert-danger">No se ha actualizado</div>','Actualizar datos del Doctor');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
          $data['estructura'] = menuarchivo($form,'<div class="alert alert-danger">No se ha actualizado</div>','Actualizar datos del Doctor');
        }

        $this->load->view('administrador/doctores',$data);


      }
      
      else{
      $doctores = $this->Mostrar->Docs();
      $lista = verDocs($doctores);
      
        if($this->session->userdata('tipo')=='admin'){
          $data['estructura'] = menu($lista,'<div class="alert alert-success">Actualizado Correctamente</div>','Lista de Doctores');
        }
        elseif($this->session->userdata('tipo')=='archivo'){
          $data['estructura'] = menuarchivo($lista,'<div class="alert alert-success">Actualizado Correctamente</div>','Lista de Doctores');
        }

      //cargando la vista con los doctores registrados en la base
      $this->load->view('administrador/verDocs.php',$data);
      //cargando la vista de los datos de la base


      }
    }

    ///////////////////////////////////////////

    

  }
}
?>