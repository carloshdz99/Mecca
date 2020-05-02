<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctores extends CI_Controller {
//holi uwu
  public function __construct(){
    parent:: __construct(); 
    // cargando los helpers 
    $this->load->helper('Menu');
    $this->load->helper('forms/forms');
    $this->load->helper('forms/formsac');
    $this->load->helper('list/listas');
    $this->load->helper('alertas/alertas');
    $this->load->helper('MenuArchivo');
    // cargando base de datos
    $this->load->database();
    // llamando modelo Insertando
    $this->load->model('Insertando');
    //llamando modelo generador de id
    $this->load->model('Generador');
    //modelo mostrar
    $this->load->model('Mostrar');
    $this->load->model('validaciones');


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
    //tomando los valores de las cajas de texto
    $nom = $this->input->post('nom');   
    $ape = $this->input->post('ape');
    $especialidad = $this->input->post('espe');
    $estado = $this->input->post('est');
    if($estado=='Activo'){$numE=1;}else{$numE=0;}
    $espe=$this->Mostrar->especialidades();
    $form = docs($espe);
    $doctores=$this->Mostrar->Docs();

    $msg = $this->validaciones->doctoresVal($nom,$ape,$especialidad,$estado,'','registro');
    if($this->session->userdata('tipo')=='admin'){
      $data['estructura'] = menu($form,$msg,'Ingresando doctores');
    }
    elseif($this->session->userdata('tipo')=='archivo'){
      $data['estructura'] = menuarchivo($form,$msg,'Ingresando doctores');
    }
    $this->load->view('administrador/doctores.php',$data);
}


//funcion que muestra los doctores registrados en la base de datos
  public function mostrarD($pagina=1){
    $inicio = ($pagina-1)*6;
    $fin = $inicio+6;

    $doctores = $this->Mostrar->Docs();
    $pdoctores= $this->Mostrar->pdocs($inicio,$fin);
  $lista = verDocs($doctores,$pdoctores);
      if($this->session->userdata('tipo')=='admin'){
        $data['estructura'] = menu($lista,'','Lista de Doctores');
      }
      elseif($this->session->userdata('tipo')=='archivo'){
        $data['estructura'] = menuarchivo($lista,'','Lista de Doctores');
      }
  //cargando la vista con los doctores registrados en la base
  $this->load->view('administrador/doctores.php',$data);
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
  public function ActualizarDocs($pagina=1){
    //tomando los valores de las cajas de texto
    $nom = $this->input->post('nom');   
    $ape = $this->input->post('ape');
    $especialidad = $this->input->post('espe');
    $estado = $this->input->post('est');
    $id=$this->input->post('id');

    //validando que ocurra un error de datos mal ingresados
    $msg= $this->validaciones->doctoresVal($nom,$ape,$especialidad,$estado,$id,'actualizar');
    if($msg==noactualizado()||$msg==numeros()||$msg==Campos()||$msg==existente()||$msg==llenadoE()){
      $espe=$this->Mostrar->especialidades();
      $datos= $this->Actualizar->tomarDocs($id);
      //tomando el formulario que devuelve la funcion
      $form = docsA($datos,$espe);
  
          if($this->session->userdata('tipo')=='admin'){
            $data['estructura'] = menu($form,$msg,'Actualizar Doctor');
          }
          elseif($this->session->userdata('tipo')=='archivo'){
            $data['estructura'] = menuarchivo($form,$msg,'Actualizar Doctor');
          }
    }else if($msg==actualizado()){
      $inicio = ($pagina-1)*6;
    $fin = $inicio+6;

    $doctores = $this->Mostrar->Docs();
    $pdoctores= $this->Mostrar->pdocs($inicio,$fin);
    $lista = verDocs($doctores,$pdoctores);
            if($this->session->userdata('tipo')=='admin'){
                $data['estructura'] = menu($lista,$msg,'Doctores');
            }
            elseif($this->session->userdata('tipo')=='archivo'){
                $data['estructura'] = menuarchivo($form,$msg,'Doctores');
            }
    }
        $this->load->view('administrador/doctores',$data);
  }
}
?>